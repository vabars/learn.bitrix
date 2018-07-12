<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!CModule::IncludeModule('form')) {
	return false;
};

$arParameters = array(
	"PARAMETERS" => array(
		"FORM_ID" => array(
			"NAME" => GetMessage("GD_VACANSY_FORM_ID"),
			"TYPE" => "string",
			"VALUES" => $arIBlocks,
			"MULTIPLE" => "N",
			"DEFAULT" => "",
		),
	),
	"USER_PARAMETERS" => array(
		"URL_TYPE" => array(
			"NAME" => GetMessage("GD_VACANSY_URL_TYPE"),
			"TYPE" => "STRING",
			"DEFAULT" => ""
		)
	)
);
?>