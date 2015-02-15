<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
foreach($arResult["ITEMS"] as $key => $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	if ($GLOBALS['arrFilter']['ID%3'] == 0 && $key % 3 != 0) continue;
	if ($GLOBALS['arrFilter']['ID%3'] == 1 && $key % 3 != 1) continue;
	if ($GLOBALS['arrFilter']['ID%3'] == 2 && $key % 3 != 2) continue;?>
	<div class="common_review_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
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
			<div class="review_item_head_name"><?=$arItem['DISPLAY_PROPERTIES']['MAIN_NAME']['DISPLAY_VALUE']?: $arItem['NAME']?></div>
		</div>
		<div class="review_item_tx">
			<p><?=TruncateText($arItem['PREVIEW_TEXT'], 300);?></p>
		</div>
		<?if (iconv_strlen($arItem['PREVIEW_TEXT'], 'UTF-8') > 300): ?>
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="read_more">Читать далее</a>
		<? endif;?>
	</div>
<? endforeach;?>	