<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (isset($arResult["FILTER_LINK"])): ?>
	<p><?= GetMessage("SIMPLECOMP_EXAM2_FILTER_TITLE") ?><a
				href="<?= $arResult["FILTER_LINK"] ?>"><?= $arResult["FILTER_LINK"] ?></a></p>
<? endif; ?>

---

<p><b><?= GetMessage("SIMPLECOMP_EXAM2_CAT_TITLE") ?></b></p>
<? $this->AddEditAction('iblock_' . $arResult["IBLOCK_ID"], $arResult['ADD_ELEMENT_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_ADD")); ?>
<ul>
	<? foreach ($arResult["ITEMS"] as $newsId => $arItem): ?>
		<li>
			<b>
				<?= $arItem["NAME"] ?>
			</b>
			- <?= $arItem["ACTIVE_FROM"] ?>
			(
			<? foreach ($arItem["SECTIONS"] as $sectionId): ?>
				<?= $arResult["ALL_SECTIONS"][$sectionId]["NAME"] ?>,
			<? endforeach; ?>
			)
		</li>

		<ul id="<?=$this->GetEditAreaId('iblock_'.$arResult["IBLOCK_ID"]);?>">
			<? foreach ($arItem["PRODUCTS"] as $arProd): ?>
				<? $arProduct = $arResult["ALL_PRODUCTS"][$arProd] ?>
				<?

				$this->AddEditAction($newsId . "_" . $arProd, $arProduct['EDIT_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($newsId . "_" . $arProd, $arProduct['DELETE_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<li id="<?= $this->GetEditAreaId($newsId . "_" . $arProd); ?>">
					<?= $arProduct["NAME"] ?> -
					<?= $arProduct["PRICE"] ?> -
					<?= $arProduct["MATERIAL"] ?> -
					<?= $arProduct["ARTNUMBER"] ?>
					(<?= $arProduct["LINK"] ?>)
				</li>
			<? endforeach; ?>
		</ul>
	<? endforeach; ?>

</ul>
