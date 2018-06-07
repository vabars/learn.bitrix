<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock=array();
$rsIBlock = CIBlock::GetList(Array("sort" => "asc"), Array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE"=>"Y"));
while($arr=$rsIBlock->Fetch())
{
	$arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
}

$arComponentParameters = array(
	"PARAMETERS" => array(
		"VARIABLE_ALIASES" => Array(
			"ELEMENT_ID" => Array("NAME" => GetMessage("NEWS_ELEMENT_ID_DESC")),
		),
		"SEF_MODE" => Array(
			"vacancies" => array(
				"NAME" => GetMessage("T_IBLOCK_SEF_PAGE_NEWS"),
				"DEFAULT" => "",
				"VARIABLES" => array(),
			),
			"vacancy" => array(
				"NAME" => GetMessage("T_IBLOCK_SEF_PAGE_NEWS_DETAIL"),
				"DEFAULT" => "#ELEMENT_ID#/",
				"VARIABLES" => array("ELEMENT_ID"),
			),
			"rezume" => array(
				"NAME" => GetMessage("T_IBLOCK_SEF_PAGE_RSS"),
				"DEFAULT" => "rezume/",
				"VARIABLES" => array(),
			),
		),
		"IBLOCK_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("BN_P_IBLOCK_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y",
		),
		"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("BN_P_IBLOCK"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlock,
			"REFRESH" => "Y",
		),
		"WEB_FORM_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("T_IBLOCK_WEB_FORM_ID"),
			"TYPE" => "STRING",
			"DEFAULT" => "",
		),
		"CACHE_TIME"  =>  Array("DEFAULT"=>36000000),
	),
);