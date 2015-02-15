<? namespace Asperansa\Helper;

class Helper {

    public static function includeFile($fileName, $mode = 'html') {
        if(!file_exists($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/'.$fileName.".php")) {
            $newFile = fopen($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/'.$fileName.".php", 'w');
            fclose($newFile);
        } else {
            $GLOBALS['APPLICATION']->IncludeFile(
                SITE_DIR."include/".$fileName.".php",
                array(),
                array('MODE' => $mode)
            );
        }
    }

    public static function getMessage($code) {
        return \Bitrix\Main\Localization\Loc::getMessage($code);
    }

}
