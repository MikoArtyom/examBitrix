<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>


<?if ($arParams["SPECIALDATE"][""] === "Y" && !empty($arResult["ITEMS"][0]["ACTIVE_FROM"]))
{
	$arResult["SPECIALDATE"]["VALUE"] = $arResult["ITEMS"][0]["ACTIVE_FROM"];
}
$this->getComponent()->setResultCacheKeys("SPECIALDATE");
$cp = $this->__component;
$cp->SetResultCacheKeys(array("SPECIALDATE"));