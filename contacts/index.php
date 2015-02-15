<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
use Asperansa\Helper\Helper;
$APPLICATION->SetTitle("Контактная информация");?> 
<div class="contacts_container"> 	
  <div class="contacts_tel"><?Helper::IncludeFile('phone');?></div>
 	<a href="#" class="contacts_but_form popup_feedback" >Форма обратной связи</a> </div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"contacts", 
	array(
		"IBLOCK_TYPE" => "clinic",
		"IBLOCK_ID" => "13",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "EMAIL",
			1 => "ADDRESS",
			2 => "WORK_TIME",
			3 => "MAP_LINK",
			4 => "PHONE",
			5 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DISPLAY_PANEL" => "N",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"DISPLAY_HEADER" => "N"
	),
	false
);?> 
<div id="popup_feedback" class="v_popup" style="display: none;">
	<div class="v_popup_container">
		<span class="header_feedback_close"></span>
			<div class="bl_form_feedback clearfix">
				<?$APPLICATION->IncludeComponent(
		"asperansa:iblock.element.add.xform", 
		"feedback", 
		array(
			"IBLOCK_TYPE" => "feedback",
			"IBLOCK_ID" => "20",
			"STATUS_NEW" => "NEW",
			"LIST_URL" => "",
			"USE_CAPTCHA" => "N",
			"USER_MESSAGE_EDIT" => "",
			"USER_MESSAGE_ADD" => "Ваши контакты отправлены, спасибо.",
			"DEFAULT_INPUT_SIZE" => "30",
			"RESIZE_IMAGES" => "N",
			"PROPERTY_CODES" => array(
				0 => "NAME",
				1 => "PREVIEW_TEXT",
				2 => "34",
				3 => "35"
			),
			"PROPERTY_CODES_REQUIRED" => array(
				0 => "NAME",
				1 => "PREVIEW_TEXT",
				2 => "34",
				3 => "35"
			),
			"GROUPS" => array(
				0 => "2",
			),
			"STATUS" => "ANY",
			"ELEMENT_ASSOC" => "CREATED_BY",
			"MAX_USER_ENTRIES" => "100000",
			"MAX_LEVELS" => "100000",
			"LEVEL_LAST" => "Y",
			"MAX_FILE_SIZE" => "0",
			"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
			"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
			"RULES" => "",
			"SEF_MODE" => "N",
			"SEF_FOLDER" => "/",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "N",
			"AJAX_OPTION_HISTORY" => "N",
			"CUSTOM_TITLE_NAME" => "Представьтесь",
			"CUSTOM_TITLE_TAGS" => "",
			"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
			"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
			"CUSTOM_TITLE_IBLOCK_SECTION" => "",
			"CUSTOM_TITLE_PREVIEW_TEXT" => "Комментарий",
			"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
			"CUSTOM_TITLE_DETAIL_TEXT" => "",
			"CUSTOM_TITLE_DETAIL_PICTURE" => "",
			"AJAX_OPTION_ADDITIONAL" => ""
		),
		false
	);?></div>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>