<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Рабочий стол");
?><?$APPLICATION->IncludeComponent(
	"bitrix:desktop",
	"",
	Array(
		"CAN_EDIT" => "Y",
		"COLUMNS" => "3",
		"COLUMN_WIDTH_0" => "33%",
		"COLUMN_WIDTH_1" => "33%",
		"COLUMN_WIDTH_2" => "33%",
		"GADGETS" => array("VACANSY_GADGET"),
		"GU_FAVORITES_TITLE_STD" => "",
		"GU_HTML_AREA_TITLE_STD" => "",
		"GU_MYGADGET_ELEMENT_COUNT" => "5",
		"GU_MYGADGET_SHOW_UNACTIVE_ELEMENTS" => "N",
		"GU_MYGADGET_TITLE_STD" => "",
		"GU_PROBKI_CITY" => "c213",
		"GU_PROBKI_TITLE_STD" => "",
		"GU_RSSREADER_CNT" => "10",
		"GU_RSSREADER_IS_HTML" => "N",
		"GU_RSSREADER_RSS_URL" => "",
		"GU_RSSREADER_TITLE_STD" => "",
		"GU_VACANSY_GADGET_TITLE_STD" => "",
		"GU_VACANSY_GADGET_URL_TYPE" => "",
		"GU_WEATHER_CITY" => "c11339",
		"GU_WEATHER_COUNTRY" => "Россия",
		"GU_WEATHER_TITLE_STD" => "",
		"G_MYGADGET_IBLOCK_ID" => "1",
		"G_PROBKI_CACHE_TIME" => "3600",
		"G_PROBKI_SHOW_URL" => "N",
		"G_RSSREADER_CACHE_TIME" => "3600",
		"G_RSSREADER_PREDEFINED_RSS" => "",
		"G_RSSREADER_SHOW_URL" => "N",
		"G_VACANSY_GADGET_FORM_ID" => "1",
		"G_WEATHER_CACHE_TIME" => "3600",
		"G_WEATHER_SHOW_URL" => "N",
		"ID" => "holder1"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>