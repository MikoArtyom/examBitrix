<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тестовая");
?><?$APPLICATION->IncludeComponent(
	"ex2:simplecomptype2.exam",
	"",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CLASSIFIER_IBLOCK_ID" => "7",
		"DETAIL_TEMPLATE" => "/product/#SECTION_ID#/#ELEMENT_ID#/",
		"PRODUCTS_IBLOCK_ID" => "2",
		"PROPERTY_CODE" => "FIRMS"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>