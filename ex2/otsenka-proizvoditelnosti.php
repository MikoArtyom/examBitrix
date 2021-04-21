<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оценка производительности");
?>
<!--	ex2-88-->
	<br>
	Самая ресурсоемкая страница –&nbsp;<a href="http://exambitrix/bitrix/admin/perfmon_hit_list.php?lang=ru&set_filter=Y&find_script_name=/bitrix/urlrewrite.php">/products/index.php</a><br>
	Нагрузка 10.67%, среднее "Страница-Время" –&nbsp;1.1860&nbsp;с.<br>
	Размер кэша в компоненте&nbsp;simplecomp.exam: 13 КБ. После того, как убрал из занесения в кэш данные, размер кэша не изменился.<br>

	<!--ex2-10-->
<br>
	<br>
	Самая ресурсоемкая страница –&nbsp;&nbsp;<a href="http://exambitrix/bitrix/admin/perfmon_hit_list.php?lang=ru&set_filter=Y&find_script_name=/bitrix/urlrewrite.php">/products/index.php</a><br>
	Нагрузка 10.37%, среднее "Страница-Время" –&nbsp;&nbsp;1.3901 с.<br>
	Проблемный компонент:<br>
	bitrix:catalog:&nbsp;0.4438 с;&nbsp; Запросов 0.<br>
	bitrix:catalog.section:&nbsp;0.2965 с;&nbsp;Запросов: 8 (0.0066 с).<br>
	+ включаемая область /include/random.php:&nbsp;0.1576 с.<br>
	<br>

<!--ex2-11-->
	<br>
	Самая ресурсоемкая страница –&nbsp;&nbsp;<a href="http://exambitrix/bitrix/admin/perfmon_hit_list.php?lang=ru&set_filter=Y&find_script_name=/bitrix/urlrewrite.php">/products/index.php</a><br>
	Нагрузка 16.45%, среднее "Страница-Время" – 4.3039 с.<br>
	Проблемный компонент:&nbsp;bitrix:menu.<br>
	Занимает&nbsp;0.1024 с и делает запросов: 1<br>
	<br>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>