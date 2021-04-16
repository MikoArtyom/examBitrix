<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<p><b><?=GetMessage("SIMPLECOMP_EXAM2_CAT_TITLE")?></b></p>
<div>
	<ul>
		<?foreach ($arResult["CLASSIFIER"] as $key=>$value):?>
			<?foreach ($value as $arSection):?>
				<?if (!empty($arSection["NAME"])):?>
					<li>
						<?= $arSection["NAME"]?>
							<ul>
								<?foreach ($value["ELEMENTS"] as $arElem):?>
									<li>
										<?=$arElem["NAME"]?>-
										<?=$arElem["PROPERTY"]["PRICE"]["VALUE"]?>-
										<?=$arElem["PROPERTY"]["MATERIAL"]["VALUE"]?>
									</li>
								<?endforeach;?>
							</ul>
					</li>
				<?endif;?>
			<?endforeach;?>

		<?endforeach;?>
	</ul>
</div>
