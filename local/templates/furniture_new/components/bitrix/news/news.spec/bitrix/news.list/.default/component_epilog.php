<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<?
if (isset($arParams["SPECIALDATE"]))
{
	$APPLICATION->SetPageProperty("SPECIALDATE", $arResult["SPECIALDATE"]);
}
?>
