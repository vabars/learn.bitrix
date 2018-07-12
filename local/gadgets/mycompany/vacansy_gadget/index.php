<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (!CModule::IncludeModule('form')) {
	return false;
};


//Обработка входящих параметров
$arGadgetParams['FORM_ID'] = intval($arGadgetParams['FORM_ID']);
if ($arGadgetParams['FORM_ID'] == 0) {
	return false;
};
//Запрос к БД с целью получения информации из нужной веб-формы
$arFilter = "*";
$rsResults = CFormResult::GetList($arGadgetParams['FORM_ID'], ($by ="s_date_create"), ($order = "desc"), $arFilter, ($is_filtered = false), "Y", 50);

while ($arResult = $rsResults->Fetch()) {
	$formReqResult[] = array(
		"ANSWER_ID" => $arResult['ID'],
		"ANSWER_DATE_CREATE" => $arResult['DATE_CREATE']
	);
};
$allRezumes = count($formReqResult);
//Счетчик количества поданых сегодня резюме
$todayRezumes = 0;
$new_format = CSite::GetDateFormat("SHORT");
$format = CSite::GetDateFormat("FULL");
foreach ($formReqResult as $formRes => $formVal) {
	$formVal['ANSWER_DATE_CREATE'] = $GLOBALS['DB'] -> FormatDate($formVal['ANSWER_DATE_CREATE'], $format, $new_format);
		if ($formVal['ANSWER_DATE_CREATE'] == ConvertTimeStamp()) {
			$todayRezumes++;
		};
};

//Верстка


if ($todayRezumes > 0) {
	if (!empty($arGadgetParams['URL_TYPE'])) {?>
		<p><?echo GetMessage("TODAY_REZUMES") . ' ';?>
		<a href="<?=$arGadgetParams['URL_TYPE'];?>"><?=$todayRezumes?></a>
		<?echo ' ' . GetMessage("JUST_REZUMES");?></p>
	<?};
	if (empty($arGadgetParams['URL_TYPE'])) {?>
		<p><?echo GetMessage("TODAY_REZUMES") . ' ';?>
		<a href="/bitrix/admin/form_result_list.php?lang=ru&WEB_FORM_ID=<?=$arGadgetParams['FORM_ID']?>"><?=$todayRezumes?></a>
	<?echo ' ' . GetMessage("JUST_REZUMES");?></p>
	<?};
};?>


<?
if (!empty($arGadgetParams['URL_TYPE'])) {?>
		<p><?echo GetMessage("ALL_REZUMES") . ' ';?>
		<a href="<?=$arGadgetParams['URL_TYPE'];?>"><?=$allRezumes?></a>
		<?echo ' ' . GetMessage("JUST_REZUMES");?></p>
	<?};
if (empty($arGadgetParams['URL_TYPE'])) {?>
	<p><?echo GetMessage("ALL_REZUMES") . ' ';?>
	<a href="/bitrix/admin/form_result_list.php?lang=ru&WEB_FORM_ID=<?=$arGadgetParams['FORM_ID']?>"><?=$allRezumes?></a>
	<?echo ' ' . GetMessage("JUST_REZUMES");?></p>
<?};?>
