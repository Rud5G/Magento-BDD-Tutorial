<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use MageTest\MagentoExtension\Context\MagentoContext;
use \Mage;

class FeatureContext extends MagentoContext
{
    /**
     * @Given /^Product sku "([^"]*)" has a highest price of "([^"]*)" configured$/
     */
    public function productSkuHasAHighestPriceOfConfigured($sku, $highestPrice)
    {
        $model = \Mage::getModel('catalog/product')->loadByAttribute('sku', $sku);

        if ($model->offsetExists('highest_online_price') == false) {
            throw new RuntimeException('Attribute does not exist against the product');
        }

        $model->setHighestOnlinePrice($highestPrice);
        $model->save();
    }

    /**
     * @When /^I am on page "([^"]*)"$/
     */
    public function iAmOnPage($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see "([^"]*)"$/
     */
    public function iShouldSee($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I should see "([^"]*)" as the highest price$/
     */
    public function iShouldSeeAsTheHighestPrice($arg1)
    {
        throw new PendingException();
    }
}
