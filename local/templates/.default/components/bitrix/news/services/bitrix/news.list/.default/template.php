<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<div class="for_moms_bls">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="bl_for_mom_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if (isset($arItem["PREVIEW_PICTURE"])): ?>
		<div class="bl_for_mom_item_pic">
			<img
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/>
		</div>
		<? endif;?>
		<div class="bl_for_mom_item_descr" <?if (!isset($arItem["PREVIEW_PICTURE"])): ?>style="width:100%"<?endif;?>>
			<div class="bl_for_mom_item_header"><?=$arItem['NAME']?><?if (isset($arItem["DISPLAY_ACTIVE_FROM"])):?><span class="date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span><?endif;?></div>
<?=$arItem['PREVIEW_TEXT']?>
<span class="read_more">Читать далее</span>
		</div>
	</a>
	<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
