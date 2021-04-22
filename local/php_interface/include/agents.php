<?php

function CheckUserCount()
{
	$last_user_id = COption::GetOptionInt("main", "last_user_id", 0);
	$arFilter = array(
		">ID" => $last_user_id,
	);
	$arSelect = array(
		"FIELDS" => array(
			"ID"
		)
	);
	$rsUser = CUser::GetList(
		$by="id",
		$order="desc",
		$arFilter,
		$arSelect
	);
	if  ($count_user = $rsUser->SelectedRowsCount()){
		$arUser = $rsUser->Fetch();
		$new_last_id = $arUser["ID"];

		if ($time_check_user = COption::GetOptionInt("main", "time_check_user", 0)){
			$days = round((time()-$time_check_user) / (3600*24));
			if (!$days){
				$days = 1;
			}
		}
		else{
			$days = 1;
		}
		$arFields = array(
			"COUNT" => $count_user,
			"DAYS" => $days
		);
		$arFilter = array(
			"GROUPS_ID" => GROUP_ADMIN,
		);
		$arSelect = array(
			"FIELDS" => array(
				"ID",
				"EMAIL",
			),
		);
		$rsUserAdmin = CUser::GetList(
			$by = "id",
			$by = "desc",
			$arFilter,
			$arSelect
		);

		while($arUserAdmin = $rsUserAdmin->Fetch()){
			$arFields["EMAIL"] = $arUserAdmin["EMAIL"];
			CEvent::SendImmediate(
				"NEW_REGISTR_USER",
				"s1",
				$arFields,
				"N",
				MAIL_TEMPLATE
			);
		}
	}
	COption::SetOptionInt("main", "time_check_user", time());
	return "CheckUserCount();";
}
