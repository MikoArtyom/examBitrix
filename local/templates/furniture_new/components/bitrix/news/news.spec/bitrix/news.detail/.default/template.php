<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="news-detail">
	<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])): ?>
		<img class="detail_picture" src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>"
			 width="<?= $arResult["DETAIL_PICTURE"]["WIDTH"] ?>" height="<?= $arResult["DETAIL_PICTURE"]["HEIGHT"] ?>"
			 alt="<?= $arResult["NAME"] ?>" title="<?= $arResult["NAME"] ?>"/>
	<? endif ?>
	<? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]): ?>
		<div class="news-date"><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></div>
	<? endif; ?>
	<? if ($arParams["DISPLAY_NAME"] != "N" && $arResult["NAME"]): ?>
		<h3><?= $arResult["NAME"] ?></h3>
		<a href="./?complain=true&id=<?=$arResult["ID"]?>" id="complain"><?= GetMessage("COMPLAIN") ?></a>
		<div id="result_complain" style="color: red; margin: 10px 0 10px 0; display: none;"></div>
	<? endif; ?>
	<div class="news-detail">
		<? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arResult["FIELDS"]["PREVIEW_TEXT"]): ?>
			<p><?= $arResult["FIELDS"]["PREVIEW_TEXT"];
				unset($arResult["FIELDS"]["PREVIEW_TEXT"]); ?></p>
		<? endif; ?>
		<? if ($arResult["NAV_RESULT"]): ?>
			<? if ($arParams["DISPLAY_TOP_PAGER"]): ?><?= $arResult["NAV_STRING"] ?><br/><? endif; ?>
			<? echo $arResult["NAV_TEXT"]; ?>
			<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?><br/><?= $arResult["NAV_STRING"] ?><? endif; ?>
		<? elseif ($arResult["DETAIL_TEXT"] <> ''): ?>
			<? echo $arResult["DETAIL_TEXT"]; ?>
		<? else: ?>
			<? echo $arResult["PREVIEW_TEXT"]; ?>
		<? endif ?>
		<div style="clear:both"></div>
		<br/>
		<? foreach ($arResult["FIELDS"] as $code => $value): ?>
			<?= GetMessage("IBLOCK_FIELD_" . $code) ?>:&nbsp;<?= $value; ?>
			<br/>
		<? endforeach; ?>
		<? foreach ($arResult["DISPLAY_PROPERTIES"] as $pid => $arProperty): ?>

			<?= $arProperty["NAME"] ?>:&nbsp;
			<? if (is_array($arProperty["DISPLAY_VALUE"])): ?>
				<?= implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]); ?>
			<? else: ?>
				<?= $arProperty["DISPLAY_VALUE"]; ?>
			<? endif ?>
			<br/>
		<? endforeach; ?>
	</div>
</div>

<script src="<?= $this->GetFolder() ?>/js/jquery-1.8.3.js"></script>
<? if ($arParams["SET_AJAX_COMPLAINT"] === "Y"): ?>
	<script>
		var oneClick = 1;
		$("#complain").click(function () {
			if (oneClick) {
				oneClick = 0;
				$.post(
					".",
					"ajax=1&complain=true&id=<?=$arResult["ID"]?>",
					function (data) {
						$("#result_complain").html(
							data
						).show();
						oneClick = 1;
					}
				);
			}
			return false;

		});
	</script>
<? endif; ?>
