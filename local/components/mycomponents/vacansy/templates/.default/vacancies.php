<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->IncludeComponent(
	"mycomponents:vacansies.list",
	"",
	Array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => $arParams['CACHE_TIME'],
		"CACHE_TYPE" => $arParams['CACHE_TIME'],
		"IBLOCKS" => $arParams['IBLOCK_ID'],
		"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE']
	),
$component
);
?>