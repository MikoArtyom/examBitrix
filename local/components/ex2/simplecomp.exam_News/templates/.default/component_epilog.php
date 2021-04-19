<?php
if ($USER->IsAuthorized())
$APPLICATION->SetPageProperty("HEADING", GetMessage("HEADING"). $arResult["COUNT"]);



