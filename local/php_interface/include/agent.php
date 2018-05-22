<?
function AgentCheckPrice() {
    if (CModule:: IncludeModule('iblock')) {
    $arSelect = Array("ID", "NAME", "PROPERTY_PRICE");
    $arFilter = Array("IBLOCK_ID"=> CATALOG_IBLOCK_ID, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_PRICE" => false);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while($ob = $res->GetNextElement())
    {
     $arFields = $ob->GetFields();
     $arItems[] = $arFields; 
    }
    CEventLog:: Add(array (
        "SEVERITY" => "SECURITY",
        "AUDIT_TYPE_ID" => "CHECK_PRICE",
        "MODULE_ID" => "iblock",
        "ITEM_ID" => "",
        "DESCRIPTION" => "Проверка наличия цен, нет цен для " . count($arItems) . " элементов",
        )
    );
    if (count($arItems) > 0) {
        $filter = Array("GROUPS_ID" => array (GROUP_ADMIN_ID), );
        $rsUsers = CUser::GetList(($by="personal_country"), ($order="desc"), $filter);
        $arEmail = array();
        while ($arUsers = $rsUsers -> GetNext()) {
            $arEmail[] = $arUsers['EMAIL'];
        }
    if (count($arEmail) > 0) {
                $arEventFields = array(
                    "TEXT" => count($arItems),            
                    "EMAIL" => implode(', ', $arEmail),            
                );
                CEvent::Send("CHECK_CATALOG", SITE_ID, $arEventFields);
           }       
        }
    }
    return "AgentCheckPrice();";
}


function AgentCheckActions() {
    if (CModule:: IncludeModule('iblock')) {
    $arSelect = Array("ID", "NAME", "PROPERTY_DATE_ACTIVE_TO");
    $arFilter = Array("IBLOCK_ID"=> ACTIONS_IBLOCK_ID, "!ACTIVE_DATE"=>"Y", "ACTIVE"=>"N");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while($ob = $res->GetNextElement())
    {
     $arFields = $ob->GetFields();
     $arItems[] = $arFields; 
    }
    CEventLog:: Add(array (
        "SEVERITY" => "SECURITY",
        "AUDIT_TYPE_ID" => "CHECK_ACTIONS",
        "MODULE_ID" => "iblock",
        "ITEM_ID" => "",
        "DESCRIPTION" => "Проверка выявила  " . count($arItems) . " неактивных акций",
        )
    );
    if (count($arItems) > 0) {
        $filter = Array("GROUPS_ID" => array (GROUP_ADMIN_ID), );
        $rsUsers = CUser::GetList(($by="personal_country"), ($order="desc"), $filter);
        $arEmail = array();
        while ($arUsers = $rsUsers -> GetNext()) {
            $arEmail[] = $arUsers['EMAIL'];
        }
    if (count($arEmail) > 0) {
                $arEventFields = array(
                    "TEXT" => count($arItems),            
                    "EMAIL" => implode(', ', $arEmail),            
                );
                CEvent::Send("CHECK_ACTIONS", SITE_ID, $arEventFields);
           }       
        }
    }
    return "AgentCheckActions();";
}
?>