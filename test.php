<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("тест");
?><?$APPLICATION->IncludeComponent(
	"mycomponents:vacansies.list", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "vacancies",
		"IBLOCKS" => array(
			0 => "4",
		),
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "300",
		"CACHE_GROUPS" => "Y"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>