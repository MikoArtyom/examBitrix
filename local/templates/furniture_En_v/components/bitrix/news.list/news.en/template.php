<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?if (!empty($arResult["ITEMS"])):?>
	<div>
		<?foreach ($arResult["ITEMS"] as $arItem):?>
			<p><?=$arItem["ACTIVE_FROM"]?></p>
			<p><b><?= $arItem["PROPERTIES"]["EN_NAME"]["VALUE"]?></b></p>
			<p><?= $arItem["DISPLAY_PROPERTIES"]["EN_PREVIEW_TEXT"]["VALUE"]["TEXT"]?></p>
		<?endforeach;?>
	</div>
<?endif;?>
