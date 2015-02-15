<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<div class="bl_about_timeline clearfix">
	<div class="bl_about_timeline_line"></div>
	<div class="bl_about_timeline_left">
	<?foreach($arResult["ITEMS"] as $arItem): 
		if (isset($arItem['DISPLAY_PROPERTIES']['PLACE']) && $arItem['DISPLAY_PROPERTIES']['PLACE']['VALUE'] == 'Слева'):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<div class="bl_about_timeline_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="timeline_date"><?=$arItem['NAME']?></div>
			<?=$arItem['PREVIEW_TEXT']?>
		</div>
		<?endif;endforeach;?>
	</div>
	<div class="bl_about_timeline_right">
	<?foreach($arResult["ITEMS"] as $arItem):
		if (isset($arItem['DISPLAY_PROPERTIES']['PLACE']) && $arItem['DISPLAY_PROPERTIES']['PLACE']['VALUE'] == 'Справа'):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<div class="bl_about_timeline_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="timeline_date"><?=$arItem['NAME']?></div>
			<?=$arItem['PREVIEW_TEXT']?>
		</div>
		<?endif;endforeach;?>
	</div>
</div>
