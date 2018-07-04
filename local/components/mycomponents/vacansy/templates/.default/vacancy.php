<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"",
	Array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => $arParams['CACHE_TIME'],
		"CACHE_TYPE" => $arParams['CACHE_TIME'],
		"DETAIL_URL" => "",
		"DISPLAY_NAME" => "Y",
		"ELEMENT_ID" => $arResult['VARIABLES']['ELEMENT_ID'],
		"FIELD_CODE" => array("",""),
		"IBLOCK_ID" => $arParams['IBLOCK_ID'],
		"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
		"REZUME_URL" =>	$arParams['SEF_FOLDER'] . $arResult['URL_TEMPLATES']['rezume']
	),
$component
);
?>