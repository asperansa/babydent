<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<section class="main_deals common_carousel">
	<div class="center">
		<div class="main_deals_carousel">
			<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
			<div class="main_deals_carouel_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="main_deals_carouel_item_cont clearfix">
					<div class="carousel_left_pic">
						<img
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/>
					</div>
					<div class="carousel_right_cont">
						<div class="carousel_right_cont_header_a">
						<? if (isset($arItem["DISPLAY_PROPERTIES"]["LINK"])): ?>
						<a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>"><?echo $arItem["NAME"]?></a>
						<? else:?>
						<?echo $arItem["NAME"]?>
						<? endif;?>
						</div>
						<div class="carousel_right_cont_header_b"><?=$arItem["DISPLAY_PROPERTIES"]["HEADER"]["VALUE"]?></div>
						<?echo $arItem["PREVIEW_TEXT"];?>
						<a href="#" class="but_y footer_feedback_but">Записаться</a>
					</div>
				</div>
			</div>
			<?endforeach;?>
		</div>
	</div>
</section>
