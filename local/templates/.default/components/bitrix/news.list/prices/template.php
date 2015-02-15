<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if (count($arResult["ITEMS"])>0):?>
<table>
	<thead>
		<tr>
			<td colspan="2">Название услуги</td>
			<td>Цена</td>
		</tr>
	</thead>
	<tbody>
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	
		<tr id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<td><?=$arItem['NAME']?></td>
			<td><?if (isset($arItem['DISPLAY_PROPERTIES']['ADVANTAGE'])): //print_r($arItem['DISPLAY_PROPERTIES']['ADVANTAGE']);?>
				<? switch($arItem['DISPLAY_PROPERTIES']['ADVANTAGE']['VALUE_ENUM_ID']) {
					case 13: ?><div class="tb_bl_z"><?=$arItem['DISPLAY_PROPERTIES']['ADVANTAGE']['DISPLAY_VALUE']?></div><?break;
					case 14: ?><div class="tb_bl_n"><?=$arItem['DISPLAY_PROPERTIES']['ADVANTAGE']['DISPLAY_VALUE']?></div><? break;
					case 15: ?><div class="tb_bl_s"><?=$arItem['DISPLAY_PROPERTIES']['ADVANTAGE']['DISPLAY_VALUE']?></div><? break;
					case 16:  ?><div class="tb_bl_b"><?=$arItem['DISPLAY_PROPERTIES']['ADVANTAGE']['DISPLAY_VALUE']?></div><?break;
				}
				else:
				?><?=$arItem['DISPLAY_PROPERTIES']['COMMENT']['DISPLAY_VALUE']?><?
				endif;?></td>
			<td class="td_price" nowrap><?=$arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']?> <i class="rub">a</i></td>
		</tr>
	<? endforeach; ?>
	</tbody>
</table>
<?endif;?>