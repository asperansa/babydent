<? foreach($arResult['ITEMS'] as $item_key => $arItem){
	$arFile = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => 104, 'height'=>74));
	$arResult['ITEMS'][$item_key]['PREVIEW_PICTURE'] = $arFile;
}?>