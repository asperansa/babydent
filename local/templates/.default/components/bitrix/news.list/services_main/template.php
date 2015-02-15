<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Asperansa\Helper\Helper;
$this->setFrameMode(true);?>
<section class="main_services">
	<div class="main_services_cont">
	<div class="main_services_header"><?Helper::IncludeFile('main_services_header');?></div>
		<p><?Helper::IncludeFile('main_services_about');?></p>
		<div class="main_services_container">
			<?foreach($arResult["ITEMS"] as $key => $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="item_main_serv" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<span class="item_main_serv_ico_0<?=$key+1?>"></span>
				<p><?echo $arItem["DISPLAY_PROPERTIES"]["MAIN_NAME"]["DISPLAY_VALUE"];?></p>
			</a>
			<?endforeach;?>
			<a href="<?=SITE_DIR?>services/" class="item_main_serv">
				<span class="item_main_serv_ico_07"></span>
				<p>Другие услуги</p>
			</a>
		</div>
	</div>
</section>
