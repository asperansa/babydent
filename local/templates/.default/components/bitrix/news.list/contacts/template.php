<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Asperansa\Helper\Helper;
$this->setFrameMode(true);?>
<section class="main_bl_address_cl">
	<?if ($arParams['DISPLAY_HEADER'] == "Y"): ?>
	<div class="main_bl_address_cl_header"><?Helper::IncludeFile('address_header');?></div><?endif;?>
	<div class="main_bl_address_cl_cont">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<div class="bl_address_cl_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="bl_address_cl_item_head"><?=$arItem['DISPLAY_PROPERTIES']['ADDRESS']['DISPLAY_VALUE']?></div>
			<div class="bl_address_cl_item_pic">
				<img
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/>
			</div>
			<a href="nofollow" class="gallery_item_map" id="map_<?=$arItem['ID']?>">Посмотреть на карте</a>
			<div id="popup_map_<?=$arItem['ID']?>" class="v_popup" style="display: none;">
				<div class="v_popup_container">
					<span class="header_video_close"></span>
					<?Helper::IncludeFile('map_'.$arItem['ID']);?>
				</div>
			</div>
			<ul class="bl_address_cl_item_char">
				<li><?=$arItem['DISPLAY_PROPERTIES']['PHONE']['DISPLAY_VALUE']?></li>
				<li>e-mail: <?=$arItem['DISPLAY_PROPERTIES']['EMAIL']['DISPLAY_VALUE']?></li>
				<li>Время работы <?=$arItem['DISPLAY_PROPERTIES']['WORK_TIME']['DISPLAY_VALUE']?></li>
			</ul>
			<a href="#" class="but_y make_order_item">Записаться на прием</a>
		</div><?endforeach;?>
	</div>
</section>