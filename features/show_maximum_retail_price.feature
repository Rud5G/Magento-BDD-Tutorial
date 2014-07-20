Feature: A visitor can see the highest price this product is sold for
  In order to see how cheap the websites products are
  As a visitor
  I need to see a price comparison on a product page.

  Scenario: See a price comparison on a page
    Given Product sku "VGN-TXN27N/B" has a highest price of "99999" configured
    When I am on page "sony-vaio-vgn-txn27n-b-11-1-notebook-pc.html"
    Then I should see "Saving you"
    And I should see "99999" as the highest price
