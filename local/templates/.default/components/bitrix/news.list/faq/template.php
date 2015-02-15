<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
foreach($arResult["ITEMS"] as $key => $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	if ($GLOBALS['arrFilter']['ID%2'] == 0 && $key % 2 == 1) continue;
	if ($GLOBALS['arrFilter']['ID%2'] == 1 && $key % 2 == 0) continue;?>
	<div class="faq_bl_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="faq_bl_item_question">
			<div class="faq_bl_item_question_name"><?=$arItem['NAME']?></div>
			<div class="faq_bl_item_question_date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
			<div class="faq_bl_item_question_tx"><?=$arItem['PREVIEW_TEXT']?></div>
		</div>
		<div class="faq_bl_item_answer"><?=$arItem['DETAIL_TEXT']?></div>
	</div>
<? endforeach;?>		