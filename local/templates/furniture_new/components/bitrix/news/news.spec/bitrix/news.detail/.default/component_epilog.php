<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
const IBLOCK_COMPLAIN = 8;
?>
<?php
if (!empty($arResult["CANONICAL_LINK"])){
	$APPLICATION->SetPageProperty("canonical", $arResult["CANONICAL_LINK"]);
}

if ($_REQUEST["complain"] == true && ($newsId  = (int)$_REQUEST["id"])){

	$name = session_id() . "_". $newsId;
	$arFilter = array(
		"IBLOCK_ID" => IBLOCK_COMPLAIN,
		"ACTIVE" => "Y",
		"NAME" => $name,
	);
	$arSelect = array(
		"ID"
	);
	$result = CIBlockElement::GetList(
		false,
		$arFilter,
		false,
		array("nTopCount" => 1),
		$arSelect
	);

	if ($result->SelectedRowsCount()) {
		$resMessage = GetMessage("HAS_ALREADY_COMPLAIN");
	}
	else{
		if ($USER->IsAuthorized()){
			$userId = $USER->GetID();
			$rsUser = CUser::GetByID($userId);
			$arUser = $rsUser->Fetch();
			$userProp = $userId .", ". $arUser["LOGIN"] .", ".$arUser["LAST_NAME"]." ".$arUser["NAME"]." ".$arUser["SECOND_NAME"];
		}
		else{
			$userProp = GetMessage("NOT_AUTHORIZATION");
			?>
			<pre>
				1 else
				<?=$USER->IsAuthorized()?>
				<?=$userProp?>
			</pre>
			<?
		}

		$element = new CIBlockElement;
		if ($addComplain = $element->Add(
			array(
				"IBLOCK_ID" => IBLOCK_COMPLAIN,
				"NAME" => $name,
				"ACTIVE_FROM" => date("d.m.Y H:i:s", time()),
				"PROPERTY_VALUES" => array(
					"USER_WR" => $userProp,
					"LINK_NEWS" => $newsId
				)
			)
		)){
			$resMessage = GetMessage("SUCCESS").$addComplain;
		}
		else{
			$resMessage = GetMessage("ERROR");
		}


	}
	if (isset($_REQUEST["ajax"])){
		$APPLICATION->RestartBuffer();
		die($resMessage);
	}
	else
	{

		?>
		<script>
			$(function(){
				$("#result_complain").html(
					"<?=$resMessage?>"
				).show();
			});
		</script>
		<?
	}
}


