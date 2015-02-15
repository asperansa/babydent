<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (isset($arResult['DISPLAY_PROPERTIES']['SERVICES']['DISPLAY_VALUE'])):?>
<div class="one_doc_right_services">
	<p>Услуги специалиста:</p>
	<ul>
					<?foreach ($arResult['DISPLAY_PROPERTIES']['SERVICES']['DISPLAY_VALUE'] as $arService):?>
					<li><?=$arService?></li>
					<?endforeach?>
					</ul>
	<a href="#" class="but_y make_order_item">Записаться на прием</a>
</div>
				<?endif;?>
<article class="page_article">
	<?=$arResult['DETAIL_TEXT']?>
</article>