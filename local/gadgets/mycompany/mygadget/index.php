<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//Обработка входящих параметров
$arGadgetParams['IBLOCK_ID'] = intval($arGadgetParams['IBLOCK_ID']);
if ($arGadgetParams['IBLOCK_ID'] == 0) {
	return false;
};

$arGadgetParams['ELEMENT_COUNT'] = intval($arGadgetParams['ELEMENT_COUNT']);
if ($arGadgetParams['ELEMENT_COUNT'] == 0) {
	$arGadgetParams['ELEMENT_COUNT'] = 5;
};

$arGadgetParams['SHOW_UNACTIVE_ELEMENTS'] = $arGadgetParams['SHOW_UNACTIVE_ELEMENTS']!="N";

$arNavParams = array(
	"nPageSize" => $arGadgetParams['ELEMENT_COUNT']
);
//Конец обработки

//Кэш
$ObCache = new CPageCache;
$cacheTime = 3600;
$cacheID = $arGadgetParams['IBLOCK_ID'] . $arGadgetParams['ELEMENT_COUNT'] . $arGadgetParams['SHOW_UNACTIVE_ELEMENTS'];

if ($ObCache -> StartDataCache($cacheTime, $cacheID, "/")) {

	if (!CModule::IncludeModule('iblock')) {
		ShowError(GetMessage('NO_IBLOCK_MODULE'));
		return; 
	};

	$arSelect = array(
		"ID",
		"ACTIVE",
		"DATE_CREATE",
		"IBLOCK_ID",
		"DETAIL_PAGE_URL",
		"NAME",
		"PREVIEW_PICTURE"
	);

	$arFilter = array(
		"IBLOCK_ID" => $arGadgetParams['IBLOCK_ID'],
		"CHECK_PERMISSIONS" => "Y"
	);

	if (!$arGadgetParams['SHOW_UNACTIVE_ELEMENTS']) {
		$arFilter['ACTIVE'] = "Y";
	};

	$arSort = array("DATE_CREATE" => "DESC");

	$obElement = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams, $arSelect);

	while($arElement = $obElement -> GetNext()) {?>
		<div style="margin-bottom: 10px;">
			<div style="width: 50px; float: left; margin-right: 10px;">
				<?=CFile::ShowImage($arElement["PREVIEW_PICTURE"], 50, 50)?>				
			</div>
			<a href="<?=$arElement['DETAIL_PAGE_URL']?>"><?=$arElement['NAME']?></a>
			<small><?=$arElement['DATE_CREATE']?></small>
			<div style="clear: both;"></div>
		</div>
	<?};

	$ObCache -> EndDataCache();

};
?>