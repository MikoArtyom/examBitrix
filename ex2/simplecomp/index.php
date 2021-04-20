<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("simplecomp");
?><?$APPLICATION->IncludeComponent(
	"ex2:simplecomp.exam",
	"",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"DETAIL_TEMPLATE_LINK" => "catalog_exam/#SECTION_ID#/#ELEMENT_CODE#",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"NEWS_COUNT" => "2",
		"NEWS_IBLOCK_ID" => "1",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Странички",
		"PRODUCTS_IBLOCK_ID" => "2",
		"PROPERTY_CODE" => "UF_NEWS_LINK"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>