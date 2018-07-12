<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!CModule::IncludeModule('iblock')) {
	return false;
}

$arIBlocks = array(" " => GetMessage("GD_PRODUCTS_EMTY"));
$dbIBlocks = CIBlock::GetList(
	array("SORT" => "ASC", "NAME" => "ASC"),
	array("CHECK_PERMISSIONS" => "Y")
);
while ($arIBlock = $dbIBlocks -> GetNext()) {
	$arIBlocks[$arIBlock['ID']] = "[" . $arIBlock['ID'] . "] " . $arIBlock["NAME"];
};

$arParameters = array(
	"PARAMETERS" => array(
		"IBLOCK_ID" => array(
			"NAME" => GetMessage("GD_PRODUCTS_IBLOCK_ID"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlocks,
			"MULTIPLE" => "N",
			"DEFAULT" => "",
			"REFRESH" => "Y"
		),
	),
	"USER_PARAMETERS" => array(
		"ELEMENT_COUNT" => array(
			"NAME" => GetMessage("GD_PRODUCTS_ELEMENT_COUNT"),
			"TYPE" => "STRING",
			"DEFAULT" => "5"
		),
		"SHOW_UNACTIVE_ELEMENTS" => array(
			"NAME" => GetMessage("GD_PRODUCTS_SHOW_UNACTIVE_ELEMENTS"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N"
		)
	)
);

?>