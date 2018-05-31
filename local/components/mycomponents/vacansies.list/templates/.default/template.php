<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?CJSCore::Init(array("jquery"));?>

<?foreach($arResult['TREE'] as $sectName => $itemValue): ?>
<div class="block">
	<h3 class="extremum-click"><?=GetMessage('VAC_OT');?> <?=$sectName;?></h3>
	<?foreach($itemValue as $arItem):?>

	<?
////////// Подключение кнопок эрмитажа
	$arButtons = CIBlock::GetPanelButtons(
		$arParams['IBLOCKS']['0'],
		$arItem["MY_ELEMENT_ID"],
		0,
		array("SECTION_BUTTONS"=>false, "SESSID"=>false)
	);
	$arItem["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
	$arItem["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];
	$this->AddEditAction($arItem['MY_ELEMENT_ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams['IBLOCKS']['0'], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['MY_ELEMENT_ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams['IBLOCKS']['0'], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
//////////
	?>
	
		<div class="extremum-slide">
			<div id="<?=$this->GetEditAreaId($arItem['MY_ELEMENT_ID']);?>">
				<h4><?=GetMessage('VAC_NAME');?> <?=$arItem["MY_ELEMENT_NAME"]?></h4>
				<h4><?=GetMessage('VAC_DESC');?></h4>
					<p><?=$arItem["MY_ELEMENT_DETAIL_TEXT"]?></p>
				<p><span class="vacdesc"><?=GetMessage('VAC_STAZH');?></span> <?=$arItem["MY_ELEMENT_PROPERTY_VAC_STAZH"]?></p>
				<p><span class="vacdesc"><?=GetMessage('VAC_WORK_TIME');?></span> <?=$arItem["MY_ELEMENT_PROPERTY_VAC_GRAPH"]?></p>
				<p><span class="vacdesc"><?=GetMessage('VAC_EDUC');?></span> <?=$arItem["MY_ELEMENT_PROPERTY_VAC_EDU"]?></p>
			</div>
		</div>
		<?endforeach;?>
</div>
<?endforeach;?>
