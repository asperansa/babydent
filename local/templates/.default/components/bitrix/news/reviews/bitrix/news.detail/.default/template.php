<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<article class="page_article">
	<?if (isset($arResult["DISPLAY_PROPERTIES"]["DOCTOR"])): ?>
	<p>Отзыв о специалисте: <?= $arResult["DISPLAY_PROPERTIES"]["DOCTOR"]['DISPLAY_VALUE'];?></p>
	<? endif; ?>
	<?if (isset($arResult["DISPLAY_PROPERTIES"]["SERVICE"])): ?>
	<p>Была предоставлена услуга: <?= $arResult["DISPLAY_PROPERTIES"]["SERVICE"]['DISPLAY_VALUE']?></p>
	<? endif; ?>
	<p><?echo $arResult["PREVIEW_TEXT"];?></p></br>
	<p><?=FormatDate($arParams["ACTIVE_DATE_FORMAT"],MakeTimeStamp($arResult['DATE_ACTIVE_FROM']))?></p>	
</article>