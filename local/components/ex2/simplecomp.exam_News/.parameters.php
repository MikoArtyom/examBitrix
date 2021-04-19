<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
$arComponentParameters = array(
	"PARAMETERS" => array(
		"NEWS_IBLOCK_ID" => array(
			"NAME" => GetMessage("SIMPLCOMP_NEWS_IBLOCK_ID"),
			"PARENT" => "BASE",
			"TYPE" => "STRING"
		),
		"PROPERTY_AUTHOR" => array(
			"NAME" => GetMessage("NAME_AUTHOR_PROPERTY"),
			"PARENT" => "BASE",
			"TYPE" => "STRING",
		),
		"PROPERTY_AUTHOR_TYPE" => array(
			"NAME" => GetMessage("NAME_AUTHOR_TYPE_PROPERTY"),
			"PARENT" => "BASE",
			"TYPE" => "STRING",
		),
		"CACHE_TIME" => array("DEFAULT" => 3600),

	)
);

