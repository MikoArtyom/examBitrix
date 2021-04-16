<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?

use Bitrix\Main\Loader;
use Bitrix\Iblock;

if (!Loader::includeModule("iblock")) {
	ShowError(GetMessage("SIMPLECOMP_IBLOCK_MODULE_NON"));
	return;
}

if ($this->StartResultCache()) {

	if (!$iblockPoduct = (int)$arParams["PRODUCTS_IBLOCK_ID"]) return false;
	if (!$iblockNews = (int)$arParams["NEWS_IBLOCK_ID"]) return false;
	if (!$propertyCode = trim($arParams["PROPERTY_CODE"])) return false;
//		{
//			return false;
//		}

	$arSelect = array(
		"ID",
		"NAME",
		$propertyCode,
	);

	$arFilter = array(
		"IBLOCK_ID" => $iblockPoduct,
		"ACTIVE" => "Y",
		"!" . $propertyCode => false,
	);
	$arIdNews = array();
	$arSectionAll = array();
	$resultSection = CIBlockSection::GetList(
		array(),
		$arFilter,
		true,
		$arSelect,
		false
	);
	?>
	<?
	while ($arItem = $resultSection->GetNext()) {
//			echo "<pre>".htmlspecialchars(print_r($arItem))."</pre>";
		if ($arItem["ELEMENT_CNT"] > 0) {
			$arSectionAll[$arItem["ID"]] = array(
				"NAME" => $arItem["NAME"],
				"NEWS" => $arItem[$propertyCode]
			);
			foreach ($arItem[$propertyCode] as $idNews) {
				if (!in_array($idNews, $arIdNews))
					$arIdNews[] = $idNews;
			}
		}
	}

	$arNewsAll = array();
	$arFilter = array(
		"IBLOCK_ID" => $iblockNews,
		"ACTIVE" => "Y",
		"ID" => $arResult["ID"]
	);
	$arSelect = array(
		"ID",
		"NAME",
		"ACTIVE_FROM"
	);
	$resultNews = CIBlockElement::GetList(
		array(),
		$arFilter,
		false,
		false,
		$arSelect
	);
	while ($arItemNews = $resultNews->GetNext()) {
		$arNewsAll[$arItemNews["ID"]] = array(
			"NAME" => $arItemNews["NAME"],
			"ACTIVE_FROM" => $arItemNews["ACTIVE_FROM"],
			"SECTIONS" => array(),
			"PRODUCTS" => array()
		);
	}

	$arProductAll = array();

	$arSelect = array(
		"ID",
		"NAME",
		"IBLOCK_SECTION_ID",
		"PROPERTY_PRICE",
		"PROPERTY_MATERIAL",
		"PROPERTY_ARTNUMBER",
	);

	$arFilter = array(
		"IBLOCK_ID" => $iblockPoduct,
		"ACTIVE" => "Y",
		"SECTION_ID" => array_keys($arSectionAll)
	);
	$resultProducts = CIBlockElement::GetList(
		false,
		$arFilter,
		false,
		false,
		$arSelect
	);

	while ($arItemProd = $resultProducts->GetNext())
	{
		$arProductAll[$arItemProd["ID"]] = array(
			"NAME" => $arItemProd["NAME"],
			"PRICE" => $arItemProd["PROPERTY_PRICE_VALUE"],
			"MATERIAL" => $arItemProd["PROPERTY_MATERIAL_VALUE"],
			"ARTNUMBER" => $arItemProd["PROPERTY_ARTNUMBER_VALUE"],
			""
		);
		foreach ($arSectionAll[$arItemProd["IBLOCK_SECTION_ID"]]["NEWS"] as $arNewsId){
			$arNewsAll[$arNewsId]["PRODUCTS"][] = $arItemProd["ID"];
			if (!in_array($arItemProd["IBLOCK_SECTION_ID"], $arNewsAll[$arNewsId]["SECTIONS"]))
			{
				$arNewsAll[$arNewsId]["SECTIONS"][] = $arItemProd["IBLOCK_SECTION_ID"];
			}
		}



	}


	$arResult["ITEMS"] = $arNewsAll;
	$arResult["ALL_PRODUCTS"] = $arProductAll;
	$arResult["ALL_SECTIONS"] = $arSectionAll;
	$arResult["COUNT_PRODUCTS"] = count($arProductAll);

	$this->setResultCacheKeys(array("COUNT_PRODUCTS"));

	$this->includeComponentTemplate();
}
$APPLICATION->SetTitle(GetMessage("SET_TITLE") . $arResult["COUNT_PRODUCTS"] );
?>
