<? 
class CPostMailing
{
    function AfterElementAddSendMail(&$arFields) {
		if ($arFields["IBLOCK_ID"] == 20) { #Форма обратной связи
            $arOrder = Array("SORT"=>"ASC");
            $arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>20, "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
            while($ob = $res->GetNextElement()){
                $arOb = $ob->GetFields();
				$arProps = $ob->GetProperties();
				$arEventFields = array(
					"ID" => $arOb["ID"],
                    "AUTHOR" => $arOb["NAME"],
					"PHONE" => ($arProps["PHONE"]["VALUE"]? "Позвоните по телефону <b>".$arProps["PHONE"]["VALUE"]."</b>" : ""),
					"PHONE_NUM" => $arProps["PHONE"]["VALUE"],
					"EMAIL_TO" => $arProps["EMAIL"]["VALUE"],
                    "EMAIL" => ($arProps["EMAIL"]["VALUE"]? ($arProps["PHONE"]["VALUE"]? "или напишите ": "Напишите ")."на почту <a href='mailto:'".$arProps["EMAIL"]["VALUE"]."'>".$arProps["EMAIL"]["VALUE"]."</a> для уточнения информации." : " для уточнения информации."),
					"TEXT" => ($arOb["PREVIEW_TEXT"]? " с комментарием: </p><p>". $arOb["PREVIEW_TEXT"].'</p>' : '.')
                );
                CEvent::Send("FEEDBACK", s1, $arEventFields);
            }
        }
        if ($arFields["IBLOCK_ID"] == 3) { #Форма запись на прием
            $arOrder = Array("SORT"=>"ASC");
            $arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>3, "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
            while($ob = $res->GetNextElement()){
                $arOb = $ob->GetFields();
				$arProps = $ob->GetProperties();
				$arEventFields = array(
					"ID" => $arOb["ID"],
                    "AUTHOR" => $arOb["NAME"],
					"PHONE" => ($arProps["PHONE"]["VALUE"]? "Вы можете позвонить по телефону <b>".$arProps["PHONE"]["VALUE"]."</b> для уточнения информации." : ""),
                    "TEXT" => ($arOb["PREVIEW_TEXT"]? " с комментарием: </p><p>". $arOb["PREVIEW_TEXT"].'</p>' : '.')
                );
                CEvent::Send("MAKE_ORDER", s1, $arEventFields);
            }
        }
		if ($arFields["IBLOCK_ID"] == 10) { #Форма задать вопрос
            $arOrder = Array("SORT"=>"ASC");
            $arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>10, "ACTIVE"=>"N");
            $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
            while($ob = $res->GetNextElement()){
                $arOb = $ob->GetFields();
				$arEventFields = array(
					"ID" => $arOb["ID"],
                    "AUTHOR" => $arOb["NAME"],
                    "TEXT" => $arOb["PREVIEW_TEXT"]
                );
                CEvent::Send("TAKE_QUESTION", s1, $arEventFields);
            }
        }
		if ($arFields["IBLOCK_ID"] == 9) { #Форма оставить отзыв
            $arOrder = Array("SORT"=>"ASC");
            $arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>9, "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
            while($ob = $res->GetNextElement()){
                $arOb = $ob->GetFields();
				$arProps = $ob->GetProperties();
				$arEventFields = array(
					"ID" => $arOb["ID"],
                    "AUTHOR" => $arOb["NAME"],
					"DOCTOR" => ' ',
					"SERVICE" => ' ',
                    "TEXT" => $arOb["PREVIEW_TEXT"]
                );
				if (isset($arProps["DOCTOR"]["VALUE"])) {
					$resDoctor = CIBlockElement::GetList(Array("SORT"=>"ASC"), Array("ID" => $arProps["DOCTOR"]["VALUE"], "IBLOCK_ID"=>6, "ACTIVE"=>"Y"), false, false, array('NAME'));
					while($arDoctor = $resDoctor->GetNext()) {
						$arEventFields["DOCTOR"] = ' о специалисте: '.$arDoctor["NAME"].'.';
					}
				}
				if (isset($arProps["SERVICE"]["VALUE"])) {
					$resService = CIBlockElement::GetList(Array("SORT"=>"ASC"), Array("ID" => $arProps["SERVICE"]["VALUE"], "IBLOCK_ID"=>4, "ACTIVE"=>"Y"), false, false, array('NAME'));
					while($arService = $resService->GetNext()) {
						$arEventFields["SERVICE"] = 'Было проведено '.$arService["NAME"].'.';
					}
				}
				CEvent::Send("TAKE_REVIEW", s1, $arEventFields);
            }
        }
        /*if ($arFields["IBLOCK_ID"] == 16) {
            if ($arFields["ID"] > 0) {
                $arOrder = Array("SORT"=>"ASC");
                $arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>16, "ACTIVE"=>"Y");
                $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
                while($ob = $res->GetNextElement()){
                    $arOb = $ob->GetFields();
                    $arProps = $ob->GetProperties();
                    $arEventFields = array(
                        "AUTHOR" => $arOb["NAME"],
                        "AUTHOR_EMAIL" => $arProps["EMAIL"]["VALUE"],
                        "PHONE" => $arProps["PHONE"]["VALUE"]
                    );
                    CEvent::Send("FEEDBACK_CORAL", s1, $arEventFields);
                }
            }
        }
        if ($arFields["IBLOCK_ID"] == 18) {
            if ($arFields["ID"] > 0) {
                $arOrder = Array("SORT"=>"ASC");
                $arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>18, "ACTIVE"=>"Y");
                $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
                while($ob = $res->GetNextElement()){
                    $arOb = $ob->GetFields();
                    $arProps = $ob->GetProperties();
                    $arEventFields = array(
                        "AUTHOR" => $arOb["NAME"],
                        "PHONE" => $arProps["PHONE"]["VALUE"],
                        "TEXT" => $arOb["PREVIEW_TEXT"]
                    );
                    CEvent::Send("CALL_CORAL", s1, $arEventFields);
                }
            }
        }
        if ($arFields["IBLOCK_ID"] == 20) {
            if ($arFields["ID"] > 0) {
                $arOrder = Array("SORT"=>"ASC");
                $arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>20, "ACTIVE"=>"Y");
                $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
                while($ob = $res->GetNextElement()){
                    $arOb = $ob->GetFields();
                    $arProps = $ob->GetProperties();
                    $arEventFields = array(
                        "AUTHOR" => $arOb["NAME"],
                        "AUTHOR_EMAIL" => $arProps["EMAIL"]["VALUE"],
						"TYPE" => $arProps["TYPE"]["VALUE"],
                        "PHONE" => $arProps["PHONE"]["VALUE"]
                    );
                    CEvent::Send("FEEDBACK_VISA", s1, $arEventFields);
                }
            }
        }
        if ($arFields["IBLOCK_ID"] == 21) {
            if ($arFields["ID"] > 0) {
                $arOrder = Array("SORT"=>"ASC");
                $arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>21, "ACTIVE"=>"Y");
                $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
                while($ob = $res->GetNextElement()){
                    $arOb = $ob->GetFields();
                    $arProps = $ob->GetProperties();
                    $arEventFields = array(
                        "AUTHOR" => $arOb["NAME"],
                        "PHONE" => $arProps["PHONE"]["VALUE"],
                        "TEXT" => $arOb["PREVIEW_TEXT"]
                    );
                    CEvent::Send("CALL_VISA", s1, $arEventFields);
                }
            }
        }
        if ($arFields["IBLOCK_ID"] == 7) {
			if ($arFields["ID"] > 0) {
				//error_log('$arEventFields '.print_r($arFields["IBLOCK_ID"], true), 3, $_SERVER['DOCUMENT_ROOT'].'/log/temp.log');
				$arOrder = Array("SORT"=>"ASC");
				$arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>7, "ACTIVE"=>"N");
				$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
				while($ob = $res->GetNextElement()){
					$arOb = $ob->GetFields();
					$arProps = $ob->GetProperties();
					 //if (!empty($arOb["PREVIEW_PICTURE"]))
					 //$onePicture = CFile::GetFileArray($arOb["PREVIEW_PICTURE"]);
					/*if (is_array($arProps["PHOTOS"]["FILE_VALUE"])) {
						$photos = '';
						foreach ($arProps["PHOTOS"]["VALUE"] as $arFile)
							$photo = CFile::GetFileArray($arFile);
							$photos .= ' '.$photo['SRC'];
					}*/
					//error_log('$arProps '.print_r($arProps["PHOTOS"], true), 3, $_SERVER['DOCUMENT_ROOT'].'/log/temp.log');
					/*$arEventFields = array(
							"AUTHOR" => $arOb["NAME"],
							"SURNAME" => $arProps["SURNAME"]["VALUE"],
							"EMAIL" => $arProps["EMAIL"]["VALUE"],
							//"AVATAR" => $onePicture['SRC'],
							//"PHOTOS" => $photos,
							"SEX" => $arProps["SEX"]["VALUE"],
							"COUNTRY" => $arProps["COUNTRY"]["VALUE"],
							"PLACE" => $arProps["PLACE"]["VALUE"],
							"TEXT" => $arOb["PREVIEW_TEXT"]
					);
				   //error_log('$arEventFields '.print_r($arEventFields, true), 3, $_SERVER['DOCUMENT_ROOT'].'/log/temp.log');
					CEvent::Send("FEEDBACK", s1, $arEventFields);
				}
			}
        }*/
    }
    
}