<?php
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", array("EX2", "EX2_50"));
AddEventHandler("main", "OnEpilog", array("EX2", "EX2_93"));
AddEventHandler("main", "OnBeforeEventAdd", array("EX2", "EX2_51"));
AddEventHandler("main", "OnBuildGlobalMenu", array("EX2", "EX2_95"));

IncludeModuleLangFile(__FILE__);

class EX2
{
	function EX2_50(&$arFields)
	{
		if ($arFields["IBLOCK_ID"] == ID_IBLOCK_PROD) {
			if ($arFields["ACTIVE"] == "N") {
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
				$result = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

				$arItems = $result->Fetch();

				if ($arItems["SHOW_COUNTER"] > MAX_COUNT) {
					global $APPLICATION;
					$APPLICATION->ThrowException(GetMessage("ERROR_MSG") . $arItems["SHOW_COUNTER"]);
					return false;

				}
			}
		}
	}

	function EX2_93()
	{
		if (defined("ERROR_404") && ERROR_404 == "Y") {
			global $APPLICATION;
			CEventLog::Add(
				array(
					"SEVERITY" => "INFO",
					"AUDIT_TYPE_ID" => ERROR_404,
					"MODULE_ID" => "main",
					"DESCRIPTION" => $APPLICATION->GetCurDir()
				)
			);
			$APPLICATION->RestartBuffer();
			include $_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/header.php";
			include $_SERVER["DOCUMENT_ROOT"] . "/404.php";
			include $_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/footer.php";

		}
	}


	function EX2_51(&$event, &$lid, &$arFields)
	{
		if ($event == "FEEDBACK_FORM") {
			global $USER;
			if ($USER->isAuthorized()) {
				$arFields["AUTHOR"] = GetMessage("AUTH",
					[
						"#ID#" => $USER->GetID(),
						"#LOGIN#" => $USER->GetLogin(),
						"#NAME#" => $USER->GetFullName(),
						"#FORM_NAME#" => $arFields["AUTHOR"]
					]
				);
			} else {
				$arFields["AUTHOR"] = GetMessage("NOT_AUTH",
					[
						"#FORM_NAME#" => $arFields["AUTHOR"]
					]
				);
			}
			CEventLog::Add(
				array(
					"SEVERITY" => "INFO",
					"AUDIT_TYPE_ID" => "REPLACEMENT",
					"MODULE_ID" => "main",
					"ITEM_ID" => $event,
					"DESCRIPTION" => GetMessage("REPLACEMENT", ["AUTHOR" => $arFields["AUTHOR"]])
				)
			);
		}
	}

	function EX2_95(&$aGlobalMenu, &$aModuleMenu)
	{
		global $USER;
		if (in_array(MANAGED_GROUP, $USER->GetUserGroupArray())) {
			foreach ($aGlobalMenu as $key => $value) {
				if ($key != "global_menu_content") {
					unset($aGlobalMenu[$key]);
				}
			}
			foreach ($aModuleMenu as $key => $value) {
				if ($value["items_id"] != "menu_iblock_/news") {
					unset($aModuleMenu[$key]);
				}
			}
		}
	}


}