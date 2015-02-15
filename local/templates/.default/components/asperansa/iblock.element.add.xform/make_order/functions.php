<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (!function_exists("ShowFormField"))
{
    function ShowFormHeaderField($propertyID, $arResult, $arParams) {?>
        <?/*if (intval($propertyID) > 0):?><?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"]?><?else:?><?=!empty($arParams["CUSTOM_TITLE_".$propertyID]) ? $arParams["CUSTOM_TITLE_".$propertyID] : GetMessage("IBLOCK_FIELD_".$propertyID)?><?endif*/?><?/*if(in_array($propertyID, $arResult["PROPERTY_REQUIRED"])):?>*<?endif;*/?>
<?

if (intval($propertyID) > 0)
{
    if (
        $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "T"
        &&
        $arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] == "1"
    )
        $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "S";
    elseif (
        (
            $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "S"
            ||
            $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "N"
        )
        &&
        $arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] > "1"
    )
        $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "T";
}
elseif (($propertyID == "TAGS") && CModule::IncludeModule('search'))
    $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "TAGS";

if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y")
{
    $inputNum = ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0) ? count($arResult["ELEMENT_PROPERTIES"][$propertyID]) : 0;
    $inputNum += $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE_CNT"]+5;
}
else
{
    $inputNum = 1;
}
if($arResult["PROPERTY_LIST_FULL"][$propertyID]["GetPublicEditHTML"] || $arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"])
    $INPUT_TYPE = "USER_TYPE";
else
    $INPUT_TYPE = $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"];

switch ($INPUT_TYPE):
    case "USER_TYPE":
        //echo '<pre>'.print_r($arResult["PROPERTY_LIST_FULL"][$propertyID], true).'</pre>';
        /*\Bitrix\Main\Loader::includeModule('highloadblock');
        $rsData = \Bitrix\Highloadblock\HighloadBlockTable::getList(array('filter'=>array('TABLE_NAME'=>$arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE_SETTINGS"]["TABLE_NAME"])));
        if ( $arData = $rsData->fetch() ){
            ?>
            <td><select class="form_select"
                        <?if(in_array($propertyID, $arResult["PROPERTY_REQUIRED"])):?>required<?endif;?>
                        name="PROPERTY[<?=$propertyID?>][]<?=$type=="multiselect" ? "[]\" size=\"".$arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"]."\" multiple=\"multiple" : ""?>">
                    <option value=""></option>
                    <?
                    if (intval($propertyID) > 0) $sKey = "ELEMENT_PROPERTIES";
                    else $sKey = "ELEMENT";

                    foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key => $arEnum)
                    {
                        $checked = false;
                        if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                        {
                            foreach ($arResult[$sKey][$propertyID] as $elKey => $arElEnum)
                            {
                                if ($key == $arElEnum["VALUE"]) {$checked = true; break;}
                            }
                        }
                        else
                        {
                            if ($arEnum["DEF"] == "Y") $checked = true;
                        }
                        ?>
                        <option value="<?=$key?>" <?=$checked ? " selected=\"selected\"" : ""?>><?=$arEnum["VALUE"]?></option>
                    <?
                    }
                    ?>

            <?
            $Entity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arData);
            $Query = new \Bitrix\Main\Entity\Query($Entity);
            $Query->setSelect(array('UF_XML_ID', 'UF_NAME'));
            $result = $Query->exec();
            $result = new CDBResult($result);
            while ($row = $result->Fetch()){
                $checked = false;
                if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                {
                    foreach ($arResult[$sKey][$propertyID] as $elKey => $arElEnum)
                    {
                        if ($row['UF_XML_ID'] == $arElEnum["VALUE"]) {$checked = true; break;}
                    }
                }
                else
                {
                    if ($arEnum["DEF"] == "Y") $checked = true;
                } ?>
                <option value="<?=$row['UF_XML_ID']?>" <?=$checked ? " selected=\"selected\"" : ""?>><?=$row["UF_NAME"]?></option>
                <?

            }?>
                </select></td><?
        }*/
        /*for ($i = 0; $i<$inputNum; $i++)
        {
            if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
            {
                $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["~VALUE"] : $arResult["ELEMENT"][$propertyID];
                $description = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["DESCRIPTION"] : "";
            }
            elseif ($i == 0)
            {
                $value = intval($propertyID) <= 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];
                $description = "";
            }
            else
            {
                $value = "";
                $description = "";
            }
            echo call_user_func_array($arResult["PROPERTY_LIST_FULL"][$propertyID]["GetPublicEditHTML"],
                array(
                    $arResult["PROPERTY_LIST_FULL"][$propertyID],
                    array(
                        "VALUE" => $value,
                        "DESCRIPTION" => $description,
                    ),
                    array(
                        "VALUE" => "PROPERTY[".$propertyID."][".$i."][VALUE]",
                        "DESCRIPTION" => "PROPERTY[".$propertyID."][".$i."][DESCRIPTION]",
                        "FORM_NAME"=>"iblock_add",
                    ),
                ));
            ?><?
        }*/
        break;
    case "TAGS":
        $APPLICATION->IncludeComponent(
            "bitrix:search.tags.input",
            "",
            array(
                "VALUE" => $arResult["ELEMENT"][$propertyID],
                "NAME" => "PROPERTY[".$propertyID."][0]",
                "TEXT" => 'size="'.$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"].'"',
            ), null, array("HIDE_ICONS"=>"Y")
        );
        break;
    case "HTML":
        $LHE = new CLightHTMLEditor;
        $LHE->Show(array(
            'id' => preg_replace("/[^a-z0-9]/i", '', "PROPERTY[".$propertyID."][0]"),
            'width' => '100%',
            'height' => '200px',
            'inputName' => "PROPERTY[".$propertyID."][0]",
            'content' => $arResult["ELEMENT"][$propertyID],
            'bUseFileDialogs' => false,
            'bFloatingToolbar' => false,
            'bArisingToolbar' => false,
            'toolbarConfig' => array(
                'Bold', 'Italic', 'Underline', 'RemoveFormat',
                'CreateLink', 'DeleteLink', 'Image', 'Video',
                'BackColor', 'ForeColor',
                'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyFull',
                'InsertOrderedList', 'InsertUnorderedList', 'Outdent', 'Indent',
                'StyleList', 'HeaderList',
                'FontList', 'FontSizeList',
            ),
        ));
        break;
    case "T":
        for ($i = 0; $i<$inputNum; $i++)
        {

            if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
            {
                $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
            }
            elseif ($i == 0)
            {
                $value = intval($propertyID) > 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];
            }
            else
            {
                $value = "";
            }
            ?>
            <textarea placeholder="<?if (intval($propertyID) > 0):?><?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"]?><?else:?><?=!empty($arParams["CUSTOM_TITLE_".$propertyID]) ? $arParams["CUSTOM_TITLE_".$propertyID] : GetMessage("IBLOCK_FIELD_".$propertyID)?><?endif?>"
                name="PROPERTY[<?=$propertyID?>][<?=$i?>]" <?if(in_array($propertyID, $arResult["PROPERTY_REQUIRED"])):?>required<?endif;?>><?=$value?></textarea>
        <?
        }
        break;

    case "S":
    case "N":
        for ($i = 0; $i<$inputNum; $i++)
        {
            if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
            {
                $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
            }
            elseif ($i == 0)
            {
                $value = intval($propertyID) <= 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];

            }
            else
            {
                $value = "";
            }
            ?>
            <input <?if ($propertyID == 1):?>class="masked_phone"<?endif;?> placeholder="<?if (intval($propertyID) > 0):?><?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"]?><?else:?><?=!empty($arParams["CUSTOM_TITLE_".$propertyID]) ? $arParams["CUSTOM_TITLE_".$propertyID] : GetMessage("IBLOCK_FIELD_".$propertyID)?><?endif?>"
				type="text" name="PROPERTY[<?=$propertyID?>][<?=$i?>]" size="25" value="<?=$value?>" <?if(in_array($propertyID, $arResult["PROPERTY_REQUIRED"])):?>required<?endif;?>/><?
            if($arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"] == "DateTime"):?><?
                $APPLICATION->IncludeComponent(
                    'bitrix:main.calendar',
                    '',
                    array(
                        'FORM_NAME' => 'iblock_add',
                        'INPUT_NAME' => "PROPERTY[".$propertyID."][".$i."]",
                        'INPUT_VALUE' => $value,
                    ),
                    null,
                    array('HIDE_ICONS' => 'Y')
                );
                ?><br /><small><?=GetMessage("IBLOCK_FORM_DATE_FORMAT")?><?=FORMAT_DATETIME?></small><?
            endif
            ?><?
        }
        break;

    case "F":
        for ($i = 0; $i<$inputNum; $i++)
        {
            $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
            ?>

            <label for="FILE_<?=$propertyID?>_<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"]?>" class="input_file" <?if ($i>0):?>style="display: none;"<?endif;?>>
            <input type="hidden" name="PROPERTY[<?=$propertyID?>][<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>]" value="<?=$value?>" />
            <input id="FILE_<?=$propertyID?>_<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"]?>" type="file" size="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"]?>"  name="PROPERTY_FILE_<?=$propertyID?>_<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>" <?if(in_array($propertyID, $arResult["PROPERTY_REQUIRED"])):?>required<?endif;?>/>
                <span>Загрузить фото</span>
                <?

            if (!empty($value) && is_array($arResult["ELEMENT_FILES"][$value]))
            {
                ?>
                <input type="checkbox" name="DELETE_FILE[<?=$propertyID?>][<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>]" id="file_delete_<?=$propertyID?>_<?=$i?>" value="Y" /><label for="file_delete_<?=$propertyID?>_<?=$i?>"><?=GetMessage("IBLOCK_FORM_FILE_DELETE")?></label><br />
                <?

                if ($arResult["ELEMENT_FILES"][$value]["IS_IMAGE"])
                {
                    ?>
                    <img src="<?=$arResult["ELEMENT_FILES"][$value]["SRC"]?>" height="<?=$arResult["ELEMENT_FILES"][$value]["HEIGHT"]?>" width="<?=$arResult["ELEMENT_FILES"][$value]["WIDTH"]?>" border="0" /><br />
                <?
                }
                else
                {
                    ?>
                    <?=GetMessage("IBLOCK_FORM_FILE_NAME")?>: <?=$arResult["ELEMENT_FILES"][$value]["ORIGINAL_NAME"]?><br />
                    <?=GetMessage("IBLOCK_FORM_FILE_SIZE")?>: <?=$arResult["ELEMENT_FILES"][$value]["FILE_SIZE"]?> b<br />
                    [<a href="<?=$arResult["ELEMENT_FILES"][$value]["SRC"]?>"><?=GetMessage("IBLOCK_FORM_FILE_DOWNLOAD")?></a>]<br />
                <?
                }
            }?>
            </label>

         <?
        }

        break;
    case "L":

        if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["LIST_TYPE"] == "C")
            $type = $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y" ? "checkbox" : "radio";
        else
            $type = $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y" ? "multiselect" : "dropdown";

        switch ($type):
            case "checkbox":
            case "radio":

                //echo "<pre>"; print_r($arResult["PROPERTY_LIST_FULL"][$propertyID]); echo "</pre>";
                ?>
            <div class="radiobuts"><?
                foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key => $arEnum)
                {
                    $checked = false;
                    if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                    {
                        if (is_array($arResult["ELEMENT_PROPERTIES"][$propertyID]))
                        {
                            foreach ($arResult["ELEMENT_PROPERTIES"][$propertyID] as $arElEnum)
                            {
                                if ($arElEnum["VALUE"] == $key) {$checked = true; break;}
                            }
                        }
                    }
                    else
                    {
                        if ($arEnum["DEF"] == "Y") $checked = true;
                    }

                    ?>
                    <div class="radiobutton">
                    <input type="<?=$type?>"
                           name="PROPERTY[<?=$propertyID?>]<?=$type == "checkbox" ? "[".$key."]" : ""?>"
                           value="<?=$key?>"
                           id="property_<?=$key?>"<?=$checked ? " checked=\"checked\"" : ""?>
                    <?if(in_array($propertyID, $arResult["PROPERTY_REQUIRED"])):?>required<?endif;?>/>
                    <label for="property_<?=$key?>"><span></span><?=$arEnum["VALUE"]?></label>
                    </div>
                <?
                }?>
            </div>
                <?

                break;

            case "dropdown":
            case "multiselect":
                ?>
                <td><select class="form_select"
            <?if(in_array($propertyID, $arResult["PROPERTY_REQUIRED"])):?>required<?endif;?>
                    name="PROPERTY[<?=$propertyID?>]<?=$type=="multiselect" ? "[]\" size=\"".$arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"]."\" multiple=\"multiple" : ""?>">
                    <option value=""></option>
                    <?
                    if (intval($propertyID) > 0) $sKey = "ELEMENT_PROPERTIES";
                    else $sKey = "ELEMENT";

                    foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key => $arEnum)
                    {
                        $checked = false;
                        if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                        {
                            foreach ($arResult[$sKey][$propertyID] as $elKey => $arElEnum)
                            {
                                if ($key == $arElEnum["VALUE"]) {$checked = true; break;}
                            }
                        }
                        else
                        {
                            if ($arEnum["DEF"] == "Y") $checked = true;
                        }
                        ?>
                        <option value="<?=$key?>" <?=$checked ? " selected=\"selected\"" : ""?>><?=$arEnum["VALUE"]?></option>
                    <?
                    }
                    ?>
                </select></td>
                <?
                break;

        endswitch;
        break;
endswitch;?><?
    }
}