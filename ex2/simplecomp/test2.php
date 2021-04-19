<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test2");
?><?$APPLICATION->IncludeComponent(
	"ex2:simplecomp.exam_News",
	"",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"NEWS_IBLOCK_ID" => "1",
		"PROPERTY_AUTHOR" => "AUTHOR",
		"PROPERTY_AUTHOR_TYPE" => "UF_AUTHOR_TYPE"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>