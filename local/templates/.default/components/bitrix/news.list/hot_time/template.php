<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Asperansa\Helper\Helper;
$this->setFrameMode(true);?>
<section class="main_hot_time">
	<div class="center">
		<div class="main_hot_time_header">
			<?Helper::IncludeFile('hot_time_header');?>
		</div>
		<div class="main_hot_time_container">
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<a href="#" class="main_hot_time_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="hot_time_item_tb">
					<div class="hot_time_item_td hot_time_item_td_name">
						<div class="h_t_name_serv"><?echo $arItem["NAME"]?></div>
						<div class="h_t_addr"><?echo $arItem["DISPLAY_PROPERTIES"]["ADDRESS"]["VALUE"]?></div>
					</div>
					<div class="hot_time_item_td hot_time_item_date">
						<?if (isset($arItem["DISPLAY_PROPERTIES"]["DOCTOR"]["VALUE"])):?>
						<div class="h_t_doc">
							<? if (isset($arResult['DOCTORS'][$arItem["DISPLAY_PROPERTIES"]["DOCTOR"]["VALUE"]]['PREVIEW_PICTURE'])):?>
							<div class="h_t_doc_photo">
								<img src="<?=$arResult['DOCTORS'][$arItem["DISPLAY_PROPERTIES"]["DOCTOR"]["VALUE"]]['PREVIEW_PICTURE']["SRC"]?>" alt="">
							</div>
							<? endif; ?>
							<div class="h_t_doc_name"><span>Врач</span> <?=$arResult['DOCTORS'][$arItem["DISPLAY_PROPERTIES"]["DOCTOR"]["VALUE"]]["NAME"]?></div>
						</div>
						<?endif;?>
						<div class="h_t_time"><?=$arItem["DISPLAY_PROPERTIES"]["HOT_TIME"]["DISPLAY_VALUE"]?></div>
					</div>
					<div class="hot_time_item_td hot_time_item_price">
						<div class="h_t_price_price_cont">
							<?if (isset($arItem["DISPLAY_PROPERTIES"]["DISCOUNT"]["VALUE"])):?>
							<div class="h_t_price_header">Скидка</div>
							<div class="h_t_price"><?=$arItem["DISPLAY_PROPERTIES"]["DISCOUNT"]["VALUE"]?>%</div>
							<?elseif(isset($arItem["DISPLAY_PROPERTIES"]["DISCOUNT_PRICE"]["VALUE"])):?>
							<div class="h_t_price_header"><span class="old_price"><?=$arItem["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]?> <i class="rub">a</i></span></div>
							<div class="h_t_price"><?=$arItem["DISPLAY_PROPERTIES"]["DISCOUNT_PRICE"]["VALUE"]?> <i class="rub">a</i></div>
							<?endif;?>
						</div>
					</div>
					<div class="hot_time_item_td hot_time_item_arrow">
						<div class="h_t_arrow"></div>
					</div>
				</div>
			</a>
			<?endforeach;?>	
		</div>
	</div>
</section>
