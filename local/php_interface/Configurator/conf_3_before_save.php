<?


class GmiClass
{
    static function GmiOnBeforeIBlockElement(&$arFields)
    {
        //$sku = reset($arFields["PROPERTY_VALUES"][333])['VALUE'];
        //if ($arFields["CODE"]=='') $arFields["CODE"] = $sku;
        if (!empty($arFields["PROPERTY_VALUES"][337])) { // installed cpu
            $cpuSku = reset($arFields["PROPERTY_VALUES"][337])['VALUE'];
            $fKey = key($arFields["PROPERTY_VALUES"][335]); // cpu model
            $arFilter = array(
				"IBLOCK_ID" => 47
                , "ACTIVE" => "Y"
                , "CODE" => $cpuSku
            );
            $arSelect = ['ID', "IBLOCK_ID", 'PROPERTY_CPU_CLASS'];
            $dbr = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
            if ($dbr_arr = $dbr->Fetch())
                $arFields["PROPERTY_VALUES"][335][$fKey]['VALUE'] = $dbr_arr['PROPERTY_CPU_CLASS_VALUE'];

        }
    }
}