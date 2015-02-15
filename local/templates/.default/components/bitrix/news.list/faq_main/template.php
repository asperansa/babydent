<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Asperansa\Helper\Helper;
$this->setFrameMode(true);?>
<section class="main_bl_faq">
	<div class="center clearfix">
		<div class="main_bl_faq_header"><?Helper::IncludeFile('faq_header');?></div>
		<div class="main_bl_faq_header_tx"><?Helper::IncludeFile('faq_header_about');?></div>
		<div class="main_bl_faq_left">
			<div class="container_faq_header">Популярные вопросы</div>
			<ul class="sp_answers">
				<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		$pop_count = 0;
		if (isset($arItem['DISPLAY_PROPERTIES']['POPULARE']) && $arItem['DISPLAY_PROPERTIES']['POPULARE']["VALUE"] == "Y"):
		if ($pop_count > 3) continue; $pop_count++;
	?>
				<li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["PREVIEW_TEXT"]?></a>
				</li>
				<?endif;endforeach;?>
			</ul>
			<div class="link_more_answer">
				<a href="<?=SITE_DIR?>faq/">Посмотреть все ответы</a>
			</div>
		</div>
		<div class="main_bl_faq_right">
			<div class="container_faq_header">Последние вопросы</div>
			<ul class="sp_answers">
			<?$count = 0; foreach($arResult["ITEMS"] as $arItem): if ($count > 3) continue;  $count++;?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["PREVIEW_TEXT"]?></a>
				</li>
				<?endforeach;?>
				</ul>
			<div class="link_more_answer">
				<a href="<?=SITE_DIR?>faq/">Посмотреть все ответы</a>
			</div>
		</div>
		<div class="bl_link_more_question">
			<a href="nofollow" class="but_y popup_question">Задать свой вопрос</a>
		</div>
	</div>
</section>