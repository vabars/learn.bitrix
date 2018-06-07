rezume
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"",
	Array(
		"CACHE_TIME" => $arParams['CACHE_TIME'],
		"CACHE_TYPE" => $arParams['CACHE_TIME'],
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "result_edit.php",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "result_list.php",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => Array(
			"RESULT_ID" => "RESULT_ID",
			"WEB_FORM_ID" => "WEB_FORM_ID"
		),
		"WEB_FORM_ID" => $arParams['WEB_FORM_ID']
	),
$component
);?>