<?//echo '<pre>'.print_r($arResult['ITEMS'], true).'</pre>';foreach($arResult['ITEMS'][0]['DISPLAY_PROPERTIES']['PHOTOS']['FILE_VALUE'] as &$arPhoto) {	//echo '<pre>'.print_r($arPhoto, true).'</pre>';	//$file = CFile::ResizeImageGet($arPhoto, array('width'=>96, 'height'=>68), BX_RESIZE_IMAGE_PROPORTIONAL, true);	$file = CFile::ResizeImageGet($arPhoto, array('width' => 96, 'height'=>68));	$arPhoto['SMALL'] = $file['src'];	//print_r($arPhoto['SMALL']);}?>