<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?

use Bitrix\Main\Loader;
use Bitrix\Iblock;

if (!Loader::includeModule("iblock")) {
	ShowError(GetMessage("SIMPLECOMP_IBLOCK_MODULE_NON"));
	return;
}

if (empty($arParams["CLASSIFIER_IBLOCK_ID"])) {
	$arParams["CLASSIFIER_IBLOCK_ID"] = 0;
}
if (empty($arParams["PRODUCTS_IBLOCK_ID"])) {
	$arParams["PRODUCTS_IBLOCK_ID"] = 0;
}
$arParams["PROPERTY_CODE"] = trim($arParams["PROPERTY_CODE"]);


if ($this->StartResultCache(false, array($USER->GetGroups()))) {

	$arClassifier = array();
	$arClassifierId = array();

	$arSelect = array(
		"ID",
		"NAME",
		"IBLOCK_ID"
	);

	$arFilter = array(
		"IBLOCK_ID" => $arParams["CLASSIFIER_IBLOCK_ID"],
		"ACTIVE" => "Y",
		"CHECK_PERMISSION" => "Y"
	);

	$resElem = CIBlockElement::GetList(
		array(),
		$arFilter,
		false,
		false,
		$arSelect
	);

//	?>
<!--	<pre>-->
<!--		--><?//
//		print_r($resElem) ?>
<!--	</pre>-->
<!--	<hr>-->
<!--	--><?//
	while ($arItem = $resElem->GetNext()) {
		$arClassifier[$arItem["ID"]][] = $arItem;
		$arClassifierId[] = $arItem["ID"];
	}
	$arResult["COUNT"] = count($arClassifierId);
//	?>
<!--	<pre>-->
<!--		--><?//
//		print_r($arItem) ?>
<!--	</pre>-->
<!--	--><?//
	$arSelElemCatlg = array(
		"ID",
		"IBLOCK_ID",
		"IBLOCK_SECTION_ID",
		"NAME",
		"DETAIL_PAGE_URL"
	);


	$arFilter = array(
		"IBLOCK_ID" => $arParams["PRODUCTS_IBLOCK_ID"],
		"CHECK_PERMISSION" => "Y",
		"PROPERTY_" . $arParams["PROPERTY_CODE"] => $arClassifierId,
		"ACTIVE" => "Y"
	);

	$resElemCatlg = CIBlockElement::GetList(
		array(),
		$arFilter,
		false,
		false,
		$arSelElemCatlg
	);

	while ($arItem = $resElemCatlg->GetNextElement()){
		$arFields = $arItem->GetFields();
		$arFields["PROPERTY"] = $arItem->GetProperties();
		foreach ($arFields["PROPERTY"]["FIRMS"]["VALUE"] as $firm){
			$arClassifier[$firm]["ELEMENTS"][$arFields["ID"]] = $arFields;
		}

	}
	$arResult["CLASSIFIER"] = $arClassifier;
	$this->SetResultCacheKeys(["COUNT"]);
	$this->includeComponentTemplate();
}
else
{
	$this->abortResultCache();
}
$APPLICATION->SetTitle(GetMessage("SET_TITLE") . $arResult["COUNT"]);
?>
