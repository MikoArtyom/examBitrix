<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
if (!CModule::IncludeModule("iblock"))
	return;

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
		"DETAIL_TEMPLATE_LINK" =>array(
			"NAME" => GetMessage("NAME_TEMPLATE_LINK_FOR_DETAIL_VIEW"),
			"DEFAULT" => "catalog_exam/#SECTION_ID#/#ELEMENT_CODE#",
		),
		"NEWS_COUNT" =>array(
			"NAME" => GetMessage("NAME_NEWS_COUNT_ON_PAGE"),
			"TYPE" => "STRING",
			"DEFAULT" => "2"
		),
	)
);

CIBlockParameters::AddPagerSettings(
	$arComponentParameters,
	GetMessage("T_IBLOCK_DESC_PAGES_NEWS"),
	true,
	true,
	true,
	$arCurrentValues["PAGER_BASE_LINK_ENABLE"] === "Y"
);
