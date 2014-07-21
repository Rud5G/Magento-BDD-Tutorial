<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$installer->addAttribute(
    "catalog_product",
    "highest_online_price",
    array(
        "type" => 'text',
        "group" => 'General',
        "backend" => '',
        "frontend" => '',
        "label" => 'Highest online price',
        "input" => 'text',
        "class" => '',
        "source" => 'eav/entity_attribute_source_text',
        "global" => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_WEBSITE,
        "visible" => true,
        "required" => false,
        "user_defined" => false,
        "default" => 0,
        "searchable" => false,
        "filterable" => false,
        "comparable" => false,
        "visible_on_front" => true,
        "used_in_product_listing" => true,
        "unique" => false,
        "note" => 'Highest price this product is sold for on other sites',
    )
);

$installer->endSetup();