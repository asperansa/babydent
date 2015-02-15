<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Asperansa\Helper\Helper;
$this->setFrameMode(true);?>
<div class="main_bl_gallery_video">
	<div class="main_bl_gallery_bls_header"><?Helper::IncludeFile('video_header');?></div>
	<div class="main_bl_gallery_video_cont">
		<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<a href="nofollow" class="gallery_item_video popup_video_<?=$arItem['ID']?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<span>
				<img
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/>
			</span>
			<p><?=$arItem['NAME']?></p>
		</a>
		<div id="popup_video_<?=$this->GetEditAreaId($arItem['ID']);?>" class="v_popup" style="display: none;">
			<div class="v_popup_container">
				<span class="header_video_close"></span>
				<?=$arItem['DISPLAY_PROPERTIES']['LINK']['DISPLAY_VALUE']?>
			</div>
		</div>
		<?endforeach;?>
	</div>
</div>