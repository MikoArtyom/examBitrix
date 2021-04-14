<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();


if (!empty($arParams["CANONICAL"]))
{
	$arSelect = Array(
		"ID",
		"IBLOCK_ID",
		"NAME",
		"PROPERTY_NEW"
	);
	$arFilter = Array(
		"IBLOCK_ID"=>$arParams["CANONICAL"],
		"PROPERTY_NEW" => $arResult["ID"],
		"ACTIVE"=>"Y"
	);
	?>
	<?
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	if ($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$arResult["CANONICAL_LINK"] = $arFields["NAME"];
		$this->__component->SetResultCacheKeys(["CANONICAL_LINK"]);
	}
}?>

<pre>
	<?
	print_r($arResult["CANONICAL_LINK"]);
	?>
</pre>

