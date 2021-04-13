<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>


<?if ($arParams["SPECIALDATE"] === "Y" && !empty($arResult["ITEMS"][0]["ACTIVE_FROM"]))
{
	$arResult["SPECIALDATE"] = $arResult["ITEMS"][0]["ACTIVE_FROM"];
}
else
{
	$arResult["SPECIALDATE"] = 100;
}
$this->getComponent()->setResultCacheKeys("SPECIALDATE");
