<?
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("CIBlockHandler", "OnBeforeIBlockElementUpdateHandler"));
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("CIBlockHandler", "OnBeforeIBlockElementShutDownHandler"));
class CIBlockHandler {
    function OnBeforeIBlockElementUpdateHandler(&$arFields) {
        if ($arFields['IBLOCK_ID'] == CATALOG_IBLOCK_ID) {
            $db_props = CIBlockElement::GetProperty($arFields['IBLOCK_ID'], $arFields['ID'], array("sort" => "asc"), Array("CODE"=>"PRICE"));
            if ($ar_props = $db_props->Fetch()) {
                if (strlen($arFields['PROPERTY_VALUES'][$ar_props['ID']][$ar_props['PROPERTY_VALUE_ID']]['VALUE']) > 0) {
                    $arFields['PROPERTY_VALUES'][$ar_props['ID']][$ar_props['PROPERTY_VALUE_ID']]['VALUE'] = preg_replace('/[^\d]/', '', $arFields['PROPERTY_VALUES'][$ar_props['ID']][ $ar_props['PROPERTY_VALUE_ID']]['VALUE']);
                }  
            }
        }
    }
    
    function OnBeforeIBlockElementShutDownHandler(&$arFields) {
    if($arFields['IBLOCK_ID'] == NEWS_IBLOCK_ID) {
        $objEL = CIBlockElement::GetById($arFields['ID']);

        if ($ar_res = $objEL->GetNext()) {                    
            $isElemDeactive = ($arFields["ACTIVE"] == 'N') && ($ar_res["ACTIVE"] == 'Y');
            $elementDate = $ar_res["ACTIVE_FROM"];
            $unixElementTime = MakeTimeStamp($elementDate, "DD.MM.YYYY HH:MI:SS");
            $threeDaysAgoUnix  = mktime(0, 0, 0, date("m")  , date("d")-3, date("Y"));
                if ($isElemDeactive && $unixElementTime >= $threeDaysAgoUnix) {
                    global $APPLICATION;
                    $APPLICATION->throwException("Новость не деактивированна, вы пытались деактивировать свежую новость");
                    return false;
                }                    
            }
        }
    }
}

AddEventHandler("main", "OnBeforeEventAdd", array("CMainHandler", "OnBeforeEventAddHandler"));
AddEventHandler("main", "OnBeforeUserAdd", array("CMainHandler", "OnBeforeUserAddHandler"));
class CMainHandler {
    function OnBeforeEventAddHandler(&$event, &$lid, &$arFields) //Запись работы формы обратной связи
    {
        if ($event == FEEDBACK_FORM) {
            if (CModule::IncludeModule('iblock')) {
                $el = new CIBlockElement;
                $arLoadProductArray = array(
                    'IBLOCK_ID' => FEEDBACK_IBLOCK_ID,
                    'NAME' => $arFields['AUTHOR'],   
                    'PREVIEW_TEXT' => $arFields['AUTHOR_EMAIL'],
                    'DETAIL_TEXT' => $arFields['TEXT'],
                    'DATE_ACTIVE_FROM' => ConvertTimeStamp(false, 'FULL'),
                );
                $el->Add($arLoadProductArray);
            }
        }
    }

    function OnBeforeUserAddHandler(&$arFields)
    {
        if($arFields["LAST_NAME"] == $arFields["NAME"]) {
            global $APPLICATION;
            $APPLICATION->throwException("Имя и фамилия совпадают");
            return false;
        }
    }

}


?>