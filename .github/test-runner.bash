#!/usr/bin/env bash
readonly DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )/../" && pwd )";
cd ${DIR};
set -eE # We need the big `E` for this to apply to functions https://stackoverflow.com/a/35800451
set -u
set -o pipefail
standardIFS="$IFS"
IFS=$'\n\t'

# Just Static check the EC directory
directoryToTest="app/code/EdmondsCommerce"

action=${1:-all}

case ${action} in
"Backend Copy Paste Detector")
    php ${DIR}/vendor/bin/phpcpd \
        --exclude "${directoryToTest}/*/Setup/Patch" \
        --exclude "${directoryToTest}/*/Test/Integration" \
        ${directoryToTest}
    ;;
"Backend Mess Detector")
    php ${DIR}/vendor/bin/phpmd \
        ${DIR}/${directoryToTest} \
        text \
        ${DIR}/dev/tests/static/testsuite/Magento/Test/Php/_files/phpmd/ruleset.xml
    ;;
"Backend Code Sniffer")
    php ${DIR}/vendor/bin/phpcs \
        --standard=${DIR}/vendor/magento/magento-coding-standard/Magento2/ruleset.xml \
        ${directoryToTest}
    ;;
"Unit Tests")
    php ${DIR}/vendor/bin/phpunit \
    -c ${DIR}/dev/tests/unit/phpunit.edmondscommerce.xml \
    --testsuite "Local Unit Tests"
    ;;
*)
    echo "Unknown Test"
    exit 5
      ;;
esac
