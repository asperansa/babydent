<?require_once('include/CPostMailing.php');

//@desc почтовые сообщения с форм
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("CPostMailing", "AfterElementAddSendMail"));

define('DEFAULT_TEMPLATE_PATH', '/local/templates/.default');
$curPage = $APPLICATION->GetCurPage(false);
CModule::IncludeModule('asperansa.helper');