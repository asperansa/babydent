<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<div class="main_bl_personal_carousel">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="main_bl_personal_carousel_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="main_bl_personal_item clearfix">
			<div class="bl_personal_item_photo">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
						src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>"
						width="<?=$arItem["DETAIL_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["DETAIL_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"
						title="<?=$arItem["DETAIL_PICTURE"]["TITLE"]?>"
						/></a>
			</div>
			<div class="bl_personal_item_cont">
				<div class="bl_personal_item_header_a">Друзья ваших детей!</div>
				<div class="bl_personal_item_header_b"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
				<?=$arItem['DISPLAY_PROPERTIES']['FIO']['DISPLAY_VALUE']?></a></div>
				<p><?=$arItem['DISPLAY_PROPERTIES']['ABOUT']['DISPLAY_VALUE']?></p>
				<?if (isset($arItem['DISPLAY_PROPERTIES']['SERVICES']['DISPLAY_VALUE'])):?>
				<ul class="personal_sp_services">
					<?foreach ($arItem['DISPLAY_PROPERTIES']['SERVICES']['DISPLAY_VALUE'] as $arService):?>
					<li><?=$arService?></li>
					<?endforeach?>
					</ul>
				<?endif;?>
			</div>
		</div>
	</div>
	<?endforeach;?>
</div>