<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?
$res = CIBlockElement::GetByID($arParams['ELEMENT_ID']);
if($ar_res = $res->GetNext()) {
	$arResult['FORM_ELEMENT_NAME'] = $ar_res['NAME'];
}
?>