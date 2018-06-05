<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult['TREE'] as $sectName => $itemValue): ?>
<div class="block">
	<h3 class="extremum-click"><?=GetMessage('VAC_OT');?> <?=$sectName;?></h3>
	<?foreach($itemValue as $arItem):?>
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