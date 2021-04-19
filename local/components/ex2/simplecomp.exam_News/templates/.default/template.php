<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
	<b><p><?= GetMessage("SIMPLECOMP_EXAM2_TITLE") ?></p></b>
<? global $USER; ?>
	<!--	<pre>-->
	<!--						--><? //print_r($arResult)?>
	<!--					</pre>-->
<? if (!empty($arResult)): ?>
	<ul>
		<? foreach ($arResult["AUTHORS"] as $key => $arAuthor): ?>
<!--			--><?// if ($arAuthor["LOGIN"] != $USER->GetLogin()): ?>
				<li>
					[<?= $key ?>] - <?= $arAuthor["LOGIN"] ?>
					<? if (count($arAuthor["NEWS"]) > 0): ?>
						<ul>
							<? foreach ($arAuthor["NEWS"] as $arNewsItem): ?>
								<li>
									- <?= $arNewsItem["NAME"] ?>
								</li>
							<? endforeach; ?>
						</ul>
					<? endif; ?>
				</li>
<!--			--><?// endif; ?>
		<? endforeach; ?>
	</ul>
<? endif; ?>