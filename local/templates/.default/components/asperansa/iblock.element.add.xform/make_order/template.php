<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?><? 
// @desc разрешение на использование композитной технологии 
$this->setFrameMode(true); 
include_once('functions.php');?>
<?if (count($arResult["ERRORS"])):?>
	<?=ShowError(implode("<br />", $arResult["ERRORS"]))?>
<?endif?>
<?if (strlen($arResult["MESSAGE"]) > 0):?>
	<?=ShowNote($arResult["MESSAGE"])?>
<?else:?>
<form id="make_order" name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
	<?=bitrix_sessid_post()?>
    <input type="hidden" name="form_id" value="<?=$arResult['FORM_ID']?>" />
	<?if ($arParams["MAX_FILE_SIZE"] > 0):?><input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>
    <div class="header_bl_form_c_header">Запись на приём</div>
	<?if (is_array($arResult["PROPERTY_LIST"]) && !empty($arResult["PROPERTY_LIST"])):?>
		<div class="header_bl_form_row">
			<? ShowFormHeaderField("NAME", $arResult, $arParams); ?>
		</div>
		<div class="header_bl_form_row">
			<? ShowFormHeaderField("1", $arResult, $arParams); ?>
		</div>
		<div class="header_bl_form_row">
			<? ShowFormHeaderField("PREVIEW_TEXT", $arResult, $arParams); ?>
		</div>	
		<?if($arParams["USE_CAPTCHA"] == "Y" && $arParams["ID"] <= 0):?>
			<?if($arParams["USE_CAPTCHA"] == "Y" && $arParams["ID"] <= 0):?>
				<p><?=GetMessage("IBLOCK_FORM_CAPTCHA_PROMPT")?></p>
				<input type="hidden" name="captcha_sid_<?=$arParams['AJAX_ID']?>" value="<?=$arResult["CAPTCHA_CODE"]?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
				<br/><br/><input class="popup_input captcha_input<?=($arResult['ERRORS']['CAPTCHA'])? " error_form" : '';?>" type="text" name="captcha_word_<?=$arParams['AJAX_ID']?>" maxlength="50" value="">
			<?endif?>
		<?endif?>
		<div class="header_bl_form_but_send">		
			<input type="submit" name="iblock_submit" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" />
		</div>
	<?endif?>
</form>
<? endif;?>