<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$page = $APPLICATION->GetCurPage();?>
<?foreach($arResult['TREE'] as $sectName => $itemValue): ?>
<div class="block">
	<h3 class="extremum-click"><?=GetMessage('VAC_OT');?> <?=$sectName;?></h3>
	<?foreach($itemValue as $arItem):?>
		<?$this->AddEditAction($arItem["MY_ELEMENT_ID"], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams['IBLOCKS']['0'], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem["MY_ELEMENT_ID"], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams['IBLOCKS']['0'], "ELEMENT_DELETE"));?>
		<div class="extremum-slide">
			<div id="<?=$this->GetEditAreaId($arItem['MY_ELEMENT_ID']);?>">
				<h4><?=GetMessage('VAC_NAME');?> <a href="<?=$arItem["MY_ELEMENT_DETAIL_PAGE_URL"];?>"><?=$arItem["MY_ELEMENT_NAME"]?></a></h4>
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
