<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

if(!CModule::IncludeModule("iblock"))
    return;
if(!isset($arParams["CACHE_TIME"]))
    $arParams["CACHE_TIME"] = 360000;

//Включаем кеширование
$this->StartResultCache(false, ($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups()));

//Собираем Имя и ID разделов инфоблока
$rs_Section = CIBlockSection::GetList(array(), array('IBLOCK_ID' => intval($arParams['IBLOCKS']['0'])), false, array('NAME', 'ID'));
while ($ar_Section = $rs_Section->GetNext()) {
    $arResult["SECTIONS_STUFF"][] = array(  
        'MY_SECTION_ID' => $ar_Section['ID'], 
        'MY_SECTION_NAME' => $ar_Section['NAME'],
    ); 
};

//Собираем нужные параметры элементов инфоблока
$arSelect = Array("ID", "NAME", "DETAIL_TEXT", "PROPERTY_VAC_STAZH", "PROPERTY_VAC_GRAPH", "PROPERTY_VAC_EDU", "IBLOCK_SECTION_ID");
$arFilter = Array("IBLOCK_ID"=> intval($arParams['IBLOCKS']['0']), "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($arFields = $res->GetNext()) {
	$arResult["ITEMS_STUFF"][] = array(
		'MY_ELEMENT_ID' => $arFields['ID'],
		'MY_ELEMENT_NAME' => $arFields['NAME'],
		'MY_ELEMENT_DETAIL_TEXT' => $arFields['DETAIL_TEXT'],
		'MY_ELEMENT_PROPERTY_VAC_STAZH' => $arFields['PROPERTY_VAC_STAZH_VALUE'],
		'MY_ELEMENT_PROPERTY_VAC_GRAPH' => $arFields['PROPERTY_VAC_GRAPH_VALUE'],
		'MY_ELEMENT_PROPERTY_VAC_EDU' => $arFields['PROPERTY_VAC_EDU_VALUE'],
		'MY_ELEMENT_SECTION_ID' => $arFields['IBLOCK_SECTION_ID']
	);
};

// формируем дерево
$arResult["TREE"] = array();
foreach ($arResult["SECTIONS_STUFF"] as $keySect) {
	$arResult["TREE"][$keySect['MY_SECTION_NAME']] = array();
	foreach ($arResult["ITEMS_STUFF"] as $keyItem) {
		if ($keySect["MY_SECTION_ID"] == $keyItem["MY_ELEMENT_SECTION_ID"]) {
			$arResult["TREE"][$keySect['MY_SECTION_NAME']][] = array(
				'MY_ELEMENT_ID' => $keyItem['MY_ELEMENT_ID'],
				'MY_ELEMENT_NAME' => $keyItem['MY_ELEMENT_NAME'],
				'MY_ELEMENT_DETAIL_TEXT' => $keyItem['MY_ELEMENT_DETAIL_TEXT'],
				'MY_ELEMENT_PROPERTY_VAC_STAZH' => $keyItem['MY_ELEMENT_PROPERTY_VAC_STAZH'],
				'MY_ELEMENT_PROPERTY_VAC_GRAPH' => $keyItem['MY_ELEMENT_PROPERTY_VAC_GRAPH'],
				'MY_ELEMENT_PROPERTY_VAC_EDU' => $keyItem['MY_ELEMENT_PROPERTY_VAC_EDU']
			);
		};
	};
};

//Записываем данные в кэш, и подключаем template
$this->SetResultCacheKeys(array(
	"TREE"
));
$this->IncludeComponentTemplate();
?>