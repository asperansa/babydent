<?
foreach($arResult["ITEMS"] as &$arItem):
$arItem['REVIEWS'] = 'N';
$resReviews = CIBlockElement::GetList(Array("SORT"=>"ASC"), Array("PROPERTY_DOCTOR" => $arItem['ID'], "IBLOCK_ID"=>9, "ACTIVE"=>"Y"), false, false, array('NAME'));
while($arReviews = $resReviews->GetNext()) {
	$arItem['REVIEWS'] = 'Y';
}
endforeach;
?>