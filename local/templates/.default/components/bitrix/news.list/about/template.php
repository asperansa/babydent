<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="four_bls_about clearfix">
<?foreach($arResult["ITEMS"] as $key => $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<div class="<?=($key % 4 == 0) ? "item_f_about_bl item_f_about_bl_01" : 
			(($key % 4 == 1) ? "item_f_about_bl item_f_about_bl_02" : 
			(($key % 4 == 2) ? "item_f_about_bl item_f_about_bl_03" : "item_f_about_bl item_f_about_bl_04"))
			?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="item_f_about_bl_header"><?=$arItem['NAME']?></div>
			<div class="item_f_about_bl_tx"><?=$arItem['PREVIEW_TEXT']?></div>
		</div><?endforeach;?>
	</div>