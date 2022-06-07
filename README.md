Edmonds Commerce Magento 2 Challenge Template
=============================================

This is a template repository that you can use to help complete the [Edmonds Commerce Magento
Challenge](https://www.edmondscommerce.co.uk/handbook/Platforms/Magento-2/Challenge/Magento-2-Challenge/).

It is setup to allow various tests and checks to run each time you push a commit.

Setting up the repo
-------------------

To use the template - click the green `Use this template` button at the top of the page.

Fill in the details and a copy of the repository will be created.

In order to get the tests to run, we need to be able to clone code down from the Magento repositories. To do this we
need a username and password to use with composer.

To handle this you need to do the following:

* Get your authentication keys, [Magento provides instructions
  here](https://devdocs.magento.com/guides/v2.4/install-gde/prereq/connect-auth.html)
* Create new secrets for the repository, [Github provides instructions
  here](https://docs.github.com/en/actions/security-guides/encrypted-secrets#creating-encrypted-secrets-for-a-repository)
* You need to create two secrets:
    - `MAGENTO_USERNAME` should be the Public key from Magento
    - `MAGENTO_PASSWORD` should be the Private key from Magento

Once this is done you should be able the see the tests run in the Actions tab of the repo.
