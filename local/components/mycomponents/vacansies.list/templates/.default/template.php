<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?CJSCore::Init(array("jquery"));?>

<?foreach ($arResult['TREE'] as $sectName => $itemValue): ?>
<div class="block">
	<h3 class="extremum-click"><?=GetMessage('VAC_OT');?> <?=$sectName;?></h3>
	<?foreach ($itemValue as $item): ?>
		<div class="extremum-slide">
			<h4><?=GetMessage('VAC_NAME');?> <?=$item["MY_ELEMENT_NAME"]?></h4>
			<h4><?=GetMessage('VAC_DESC');?></h4>
				<p><?=$item["MY_ELEMENT_DETAIL_TEXT"]?></p>
			<p><span class="vacdesc"><?=GetMessage('VAC_STAZH');?></span> <?=$item["MY_ELEMENT_PROPERTY_VAC_STAZH"]?></p>
			<p><span class="vacdesc"><?=GetMessage('VAC_WORK_TIME');?></span> <?=$item["MY_ELEMENT_PROPERTY_VAC_GRAPH"]?></p>
			<p><span class="vacdesc"><?=GetMessage('VAC_EDUC');?></span> <?=$item["MY_ELEMENT_PROPERTY_VAC_EDU"]?></p>
			<hr />
		</div>
	<?endforeach;?>
</div>
<?endforeach;?>
