<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?if (isset($arResult["FILTER_LINK"])):?>
	<p><?=GetMessage("SIMPLECOMP_EXAM2_FILTER_TITLE")?><a href="<?=$arResult["FILTER_LINK"]?>"><?=$arResult["FILTER_LINK"]?></a></p>
<?endif;?>

---

<p><b><?=GetMessage("SIMPLECOMP_EXAM2_CAT_TITLE")?></b></p>
<ul>
<?foreach ($arResult["ITEMS"] as $arItem):?>
	<li>
		<b>
			<?=$arItem["NAME"]?>
		</b>
		 - <?= $arItem["ACTIVE_FROM"]?>
		(
		<?foreach ($arItem["SECTIONS"] as $sectionId):?>
			<?= $arResult["ALL_SECTIONS"][$sectionId]["NAME"]?>,
		<?endforeach;?>
		)
	</li>
	<ul>
		<?foreach ($arItem["PRODUCTS"] as $arProd):?>
			<li>
				<?=$arResult["ALL_PRODUCTS"][$arProd]["NAME"]?> -
				<?=$arResult["ALL_PRODUCTS"][$arProd]["PRICE"]?> -
				<?=$arResult["ALL_PRODUCTS"][$arProd]["MATERIAL"]?> -
				<?=$arResult["ALL_PRODUCTS"][$arProd]["ARTNUMBER"]?>
				(<?=$arResult["ALL_PRODUCTS"][$arProd]["LINK"]?>)
			</li>
		<?endforeach;?>
	</ul>
<?endforeach;?>

</ul>
