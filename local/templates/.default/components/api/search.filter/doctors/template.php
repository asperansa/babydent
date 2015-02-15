<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<form name="<?echo $arResult['FILTER_NAME']."_form"?>" action="<?echo $arResult['FORM_ACTION']?>" method="get" class="ts-form ts-filter">
	<?foreach($arResult['ITEMS'] as $arItem):
		if(array_key_exists("HIDDEN", $arItem)):
			echo $arItem['INPUT'];
		endif;
	endforeach;?>
	<?if(!empty($arParams['FILTER_TITLE'])):?>
	<h3><?=$arParams['FILTER_TITLE'];?></h3>
	<?endif;?>
	
		<?foreach($arResult['ITEMS'] as $arItem): //print_r($arItem);?>
			<?if(!array_key_exists("HIDDEN", $arItem) && $arItem['CODE'] == 'SERVICES'):// print_r($arItem);?>
				<div class="select_cat_doc">
					<div class="select_cat_doc_but"><?if ($arItem['INPUT_VALUE']):?><?=$arItem['VALUES'][$arItem['INPUT_VALUE'][0]]?><?else:?>Все врачи<?endif;?></div>
					<div class="select_cat_doc_container">
						<?=$arItem['INPUT'];?>
					</div>
				</div>
			<?endif?>
		<?endforeach;?>
	
	<!--<div class="ts-buttons" style="text-align: <?=$arParams['BUTTON_ALIGN'];?>">
		<input type="hidden" name="set_filter" value="Y" />
		<button type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>"><?=GetMessage("IBLOCK_SET_FILTER");?></button>&nbsp;&nbsp;
		<button type="submit" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>"><?=GetMessage("IBLOCK_DEL_FILTER");?></button>
	</div>-->
</form>