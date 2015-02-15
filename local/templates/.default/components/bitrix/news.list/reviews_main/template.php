<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Asperansa\Helper\Helper;
$this->setFrameMode(true);?>
<div class="main_bl_reviews">
			<div class="main_bl_reviews_header"><?Helper::IncludeFile('reviews_header');?></div>
			<div class="main_bl_reviews_header_tx"><?Helper::IncludeFile('reviews_header_about');?></div>
			<div class="main_bl_reviews_container">
				<div class="main_bl_reviews_carousel">
					<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
					<div class="main_bl_reviews_carousel_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="main_review_item">
							<div class="review_item_head">
								<div class="review_item_head_photo">
									<img
						src="<?=$arItem["PREVIEW_PICTURE"]["src"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/>
								</div>
								<div class="review_item_head_name"><?=$arItem['NAME']//$arItem['DISPLAY_PROPERTIES']['MAIN_NAME']['DISPLAY_VALUE']?></div>
							</div>
							<div class="review_item_tx">
								<p><?=TruncateText($arItem['PREVIEW_TEXT'], 300);?></p>
							</div>
							<?if (iconv_strlen($arItem['PREVIEW_TEXT'], 'UTF-8') > 300): ?>
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="read_more">Читать далее</a>
							<? endif;?>
						</div>
					</div>
					<?endforeach;?>
				</div>
			</div>
			<div class="bottom_btn_all_reviews">
				<a href="<?=SITE_DIR?>reviews/" class="but_y">Читать все отзывы</a>
			</div>
		</div>