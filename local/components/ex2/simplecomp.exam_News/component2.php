<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?

use Bitrix\Main\Loader;
use CUser;


if (!Loader::includeModule("iblock")) {
	ShowError(GetMessage("SIMPLECOMP_IBLOCK_MODULE_NON"));
	return;
}
//global $USER;
//if (empty($arParams["NEWS_IBLOCK_ID"])) {
//	$arParams["NEWS_IBLOCK_ID"] = 0;
//}
//$arParams["PROPERTY_AUTHOR"] = trim($arParams["PROPERTY_AUTHOR"]);
//$arParams["PROPERTY_AUTHOR_TYPE"] = trim($arParams["PROPERTY_AUTHOR_TYPE"]);
//
//
//if ($USER->IsAuthorized()) {
//	$arResult["COUNT"] = 0;
//	$currentUserId = $USER->GetID();
//	$arFilter = array(
//		"ID" => $currentUserId,
//	);
//	$arSelect = array(
//		"SELECT" => array($arParams["PROPERTY_AUTHOR_TYPE"]),
//	);
//
//	$currentUserType = CUser::GetList(
//		$by = "id",
//		$order = "asc",
//		$arFilter,
//		$arSelect
//	)->Fetch()[$arParams["PROPERTY_AUTHOR_TYPE"]];
//
//}
//
//
//if ($this->StartResultCache(false, $currentUserType, $currentUserId)) {
//
//	$listUser = array();
//	$listUserId = array();
//
//	$arFilter = array(
//		$arParams["PROPERTY_AUTHOR_TYPE"] => $currentUserType,
//	);
//	$arSelect = array(
//		"SELECT" => array(
//			"ID",
//			"LOGIN"
//		)
//	);
//
//	$resUser = CUser::GetList(
//		$by = "id",
//		$order = "asc",
//		$arFilter,
//		$arSelect
//	);
//
//
//	while ($arUser = $resUser->Fetch()) {
//		$listUser[$arUser["ID"]] = ["LOGIN" => $arUser["LOGIN"]];
//		$listUserId[] = $arUser["ID"];
//
//	}
//	//	?>
<!--	<!--			<pre>-->-->
<!--	<!--			-->--><?////
////		print_r($listUser) ?>
<!--	<!--		</pre>-->-->
<!--	<!--	-->--><?////
//
//	$arNewsAuthor = array();
//	$arListNews = array();
//	$arNewsId = array();
//
//	$arFilter = array(
//		"IBLOCK_ID" => $arParams["NEWS_IBLOCK_ID"],
//		"PROPERTY_" . $arParams["PROPERTY_AUTHOR"] => $listUserId,
//	);
//
//	$arSelect = array(
//		"ID",
//		"IBLOCK_ID",
//		"NAME",
//		"ACTIVE_FROM",
//		"PROPERTY_" . $arParams["PROPERTY_AUTHOR"],
//	);
//
//	$resNewsElements = CIBlockElement::GetList(
//		array(),
//		$arFilter,
//		false,
//		false,
//		$arSelect
//	);
//
//	while ($arNewsItem = $resNewsElements->GetNext()) {
//		$arNewsAuthor[$arNewsItem["ID"]][] = $arNewsItem["PROPERTY_AUTHOR_VALUE"];
//
//		if (empty($arListNews[$arNewsItem["ID"]])) {
//			$arListNews[$arNewsItem["ID"]] = $arNewsItem;
//		}
//		if ($arNewsItem["PROPERTY_AUTHOR_VALUE"] !== $currentUserId) {
//			$arListNews[$arNewsItem["ID"]]["AUTHORS"][] = $arNewsItem["PROPERTY_AUTHOR_VALUE"];
//
//		}
//	}
//
//	foreach ($arListNews as $key => $arItem) {
//		if (in_array($currentUserId, $arNewsAuthor[$arItem["ID"]])){
//			continue 1;
//		}
//		else
//		{
//			foreach ($arItem["AUTHORS"] as $idAuthor){
//				$listUser[$idAuthor]["NEWS"][] = $arItem;
//				$arNewsId[$arItem["ID"]] = $arItem["ID"];
//			}
//		}
//		?>
<!--	<pre>-->
<!--		--><?//print_r($arItem["AUTHORS"])?>
<!--	</pre>-->
<!---->
<?//
//
////
////		if (in_array($currentUserId, $arItem["AUTHORS"])) {
////			unset($arListNews[$key]);
////		}
////
////			foreach ($arItem["AUTHORS"] as  $idAuthor) {
////				if (in_array($currentUserId, $idAuthor)){
////					unset()
////				}
////				else{
////
////					$arNewsId[$arItem["ID"]] = $arItem["ID"];
////				}
////
////			}
//
//
//
//	}
//
//	$arResult["AUTHORS"] = $listUser;
//	$arResult["COUNT"] = count($arNewsId);
//	$this->SetResultCacheKeys(["COUNT"]);
//
//	$this->includeComponentTemplate();
//	$APPLICATION->SetTitle(GetMessage("SET_TITLE") . $arResult["COUNT"]);
//} else {
//	$this->abortResultCache();
//}
//
//?>
<?php
if (empty($arParams["NEWS_IBLOCK_ID"]))
{
$arParams["NEWS_IBLOCK_ID"] = 0;
}
$arParams["PROPERTY_AUTHOR"] = trim($arParams["PROPERTY_AUTHOR"]);
$arParams["PROPERTY_AUTHOR_TYPE"] = trim($arParams["PROPERTY_AUTHOR_TYPE"]);

global $USER;
if($USER->isAuthorized())
{
	$arResult["COUNT"] = 0;
	$currentUserID = $USER->GetID();
	$currentUserType = CUser::GetList(
		$by = "id",
		$order = "asc",
		array("ID" => $currentUserID),
		array("SELECT" => array($arParams["PROPERTY_AUTHOR_TYPE"]))

	)->Fetch()[$arParams["PROPERTY_AUTHOR_TYPE"]];
}

if ($this->StartResultCache(false, $currentUserType, $currentUserID))
{
	$userList = [];
	$userListID = [];
	$rsUsers = CUser::GetList(
		$by = "id",
		$order = 'asc',
		[
			$arParams["PROPERTY_AUTHOR_TYPE"] => $currentUserType,
		],
		[
			"SELECT" => ["LOGIN", "ID"]
		]
	);
	while($arUser = $rsUsers->Fetch())
	{
		$userList[$arUser["ID"]] = ["LOGIN" => $arUser["LOGIN"]];
		$userListID[] = $arUser["ID"];
	}

	$arNewsAuthor = [];
	$arNewsList = [];
	$arNewsID = [];
	$rsElements = CIBlockElement::GetList(
		[],
		[
			"IBLOCK_ID" => $arParams["NEWS_IBLOCK_ID"],
			"PROPERTY_" . $arParams["PROPERTY_AUTHOR"] => $userListID,
		],
		false,
		false,
		[
			"NAME",
			"ACTIVE_FROM",
			"ID",
			"IBLOCK_ID",
			"PROPERTY_" . $arParams["PROPERTY_AUTHOR"]
		]
	);
	while($arElement = $rsElements->GetNext())
	{
		$arNewsAuthor[$arElement["ID"]][] = $arElement["PROPERTY_" . $arParams["PROPERTY_AUTHOR"] . "_VALUE"];

		if (empty($arNewsList[$arElement["ID"]]))
		{
			$arNewsList[$arElement["ID"]] = $arElement;
		}

		if ($arElement["PROPERTY_" . $arParams["PROPERTY_AUTHOR"] . "_VALUE"] != $currentUserID)
		{
			$arNewsList[$arElement["ID"]]["AUTHORS"][] = $arElement["PROPERTY_" . $arParams["PROPERTY_AUTHOR"] . "_VALUE"];
		}
	}
	foreach ($arNewsList as $key => $value)
	{
		if (in_array($currentUserID, $arNewsAuthor[$value["ID"]]))
		{
			continue;
		}

		foreach ($value["AUTHORS"] as $authorID)
		{
			$userList[$authorID]["NEWS"][] = $value;
			$arNewsID[$value["ID"]] = $value["ID"];
		}
	}
	unset($userList[$currentUserID]);

	$arResult["AUTHORS"] = $userList;
	$arResult["COUNT"] = count($arNewsID);
	$this->SetResultCacheKeys(["COUNT"]);
	$this->includeComponentTemplate();
}
else
{
	$this->AbortResultCache();
}
$APPLICATION->SetTitle(GetMessage("SET_TITLE") . $arResult["COUNT"]);
?>