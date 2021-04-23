<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"SPECIALDATE" => Array(
		"NAME" => GetMessage("T_SPECIAL_DATE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "N",
	),
	"CANONICAL" => Array(
		"NAME" => GetMessage("CANONICAL"),
		"TYPE" => "STRING",
	),
);