<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("тест");
?><?$APPLICATION->IncludeComponent(
	"mycomponents:vacansies.list",
	"",
	Array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"IBLOCKS" => array("4"),
		"IBLOCK_TYPE" => "vacancies"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>