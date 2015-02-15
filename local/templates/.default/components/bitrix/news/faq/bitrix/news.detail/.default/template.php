<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<article class="page_article">
	<div class="faq_bl_item">
		<div class="faq_bl_item_question">
			<div class="faq_bl_item_question_name"></div>
			<div class="faq_bl_item_question_date"><?echo $arResult["DISPLAY_ACTIVE_FROM"]?></div>
			<div class="faq_bl_item_question_tx"><?=$arResult['PREVIEW_TEXT']?></div>
		</div>
		<div class="faq_bl_item_answer"><?=$arResult['DETAIL_TEXT']?></div>
	</div>
</article>