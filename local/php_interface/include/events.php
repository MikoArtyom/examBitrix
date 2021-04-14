<?php
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("EX2", "EX2_50"));

IncludeModuleLangFile(__FILE__);

class EX2
{
	function EX2_50(&$arFields){
		if ($arFields["IBLOCK_ID"] == ID_IBLOCK_PROD){
			if ($arFields["ACTIVE"] == "N"){
				$arSelect = array(
					"ID",
					"IBLOCK_ID",
					"NAME",
					"SHOW_COUNTER"
				);
				$arFilter = array(
					"IBLOCK_ID" => ID_IBLOCK_PROD,
					"ID" => $arFields["ID"]
				);
				$result = CIBlockElement::GetList(array(), $arFilter,false, false, $arSelect);

				$arItems = $result->Fetch();

				if ($arItems["SHOW_COUNTER"] > MAX_COUNT){
					global $APPLICATION;
					$APPLICATION->ThrowException(GetMessage("ERROR_MSG", ["COUNT" => $arItems["SHOW_COUNTER"]]));
					return false;

				}
			}
		}
	}
}