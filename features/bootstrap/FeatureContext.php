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
        \Mage::app()->setCurrentStore(\Mage_Core_Model_App::ADMIN_STORE_ID);
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
    public function iAmOnPage($url)
    {
        $this->getSession()->visit($this->locatePath($url));
    }

    /**
     * @Then /^I should see "([^"]*)"$/
     */
    public function iShouldSee($text)
    {
        $page = $this->getSession()->getPage();

        $el = $page->find('css', '.highest-online-price-title');
        if ($el) {
            expect($el->getText())->toBe($text);
        }
        throw new RuntimeException('Element not found on the page');
    }

    /**
     * @Given /^I should see "([^"]*)" as the highest price$/
     */
    public function iShouldSeeAsTheHighestPrice($arg1)
    {
        throw new PendingException();
    }
}
