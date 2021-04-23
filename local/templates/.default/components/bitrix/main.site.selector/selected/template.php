<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<select name="" id="" onchange="location.href=this.value">
	<? foreach ($arResult["SITES"] as $arSite): ?>
		<option value="<?= $arSite["DIR"]?>" <?=$arSite["CURRENT"] == "Y" ? "selected" : "" ?>><?= $arSite["LANG"] ?></option>
	<? endforeach; ?>
</select>
