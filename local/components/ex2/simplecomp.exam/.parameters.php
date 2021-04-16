<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
$arComponentParameters = array(
	"PARAMETERS" => array(
		"PRODUCTS_IBLOCK_ID" => array(
			"NAME" => GetMessage("SIMPLCOMP_CATALOG_IBLOCK_ID"),
			"TYPE" => "STRING"
		),
		"NEWS_IBLOCK_ID" => array(
			"NAME" => GetMessage("NEWS_IBLOCK_ID"),
			"TYPE" => "STRING"
		),
		"PROPERTY_CODE" => array(
			"NAME" => GetMessage("LINK_USER_FIELD_REFERENCES_IBLOCK_NEWS"),
			"TYPE" => "STRING"
		),
		"CACHE_TIME" => array("DEFAULT" => 3600),

	)
);

