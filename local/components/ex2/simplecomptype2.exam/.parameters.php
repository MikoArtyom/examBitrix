<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
$arComponentParameters = array(
	"PARAMETERS" => array(
		"PRODUCTS_IBLOCK_ID" => array(
			"NAME" => GetMessage("SIMPLCOMP_CATALOG_IBLOCK_ID"),
			"TYPE" => "STRING"
		),
		"CLASSIFIER_IBLOCK_ID" => array(
			"NAME" => GetMessage("CLASSIFIER_IBLOCK_ID"),
			"TYPE" => "STRING"
		),
		"DETAIL_TEMPLATE" =>array(
			"NAME" => GetMessage("TEMPLATE_LINK_FOR_DETAIL_VIEW_PROD"),
			"TYPE" => "STRING"
		),
		"PROPERTY_CODE" => array(
			"NAME" => GetMessage("PROPERTY_CODE_PRODUCT"),
			"TYPE" => "STRING"
		),
		"CACHE_TIME" => array("DEFAULT" => 3600),

	)
);

