<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<div class="main_bl_gallery_photo" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="main_bl_gallery_bls_header"><?=$arItem['NAME']?></div>
			<div class="main_bl_gallery_photo_b">
				<img src="" alt="">
			</div>
			<ul class="main_bl_gallery_photo_sm">
				<? $keys = array_rand($arItem['DISPLAY_PROPERTIES']['PHOTOS']['FILE_VALUE'], 5);
				foreach($keys as $key):
				//$key = array_rand($arItem['DISPLAY_PROPERTIES']['PHOTOS']['FILE_VALUE'], 5);?>
				<li>
					<img src="<?=$arItem['DISPLAY_PROPERTIES']['PHOTOS']['FILE_VALUE'][$key]['SMALL']?>" alt="" data-big="<?=$arItem['DISPLAY_PROPERTIES']['PHOTOS']['FILE_VALUE'][$key]['SRC']?>">
				</li>
				<?endforeach;?>
			</ul>
		</div>
<?endforeach;?>