<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test2");
?><?$APPLICATION->IncludeComponent(
	"mycomponents:vacansy", 
	".default", 
	array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "vacancies",
		"SEF_FOLDER" => "test2.php",
		"SEF_MODE" => "Y",
		"USE_REVIEW" => "N",
		"WEB_FORM_ID" => "1",
		"COMPONENT_TEMPLATE" => ".default",
		"SEF_URL_TEMPLATES" => array(
			"vacancies" => "",
			"vacancy" => "#ELEMENT_ID#/",
			"rezume" => "#ELEMENT_ID#/rezume",
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>