<?php
$APPLICATION->SetPageProperty("HEADING", GetMessage("HEADING"). $arResult["COUNT_PRODUCTS"]);

$APPLICATION->SetPageProperty("EXTREMUM_PRICE", GetMessage("MAX_PRICE").$arResult["MAX_PRICE"]."<br>".GetMessage("MIN_PRICE").$arResult["MIN_PRICE"]);

