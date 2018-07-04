<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test2");
?><?$APPLICATION->IncludeComponent(
	"mycomponents:afisha2",
	"",
	Array(
		"ADD_GROUP_PERMISSIONS" => array("1"),
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DATE_FORMAT" => "d.m.Y",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "news",
		"SEF_MODE" => "N",
		"SET_TITLE" => "Y",
		"USE_REVIEW" => "N",
		"VARIABLE_ALIASES" => Array("ELEMENT_ID"=>"ELEMENT_ID")
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>