<?
$arSelect = ['IBLOCK_ID','ID','PROPERTY_BLOCKS'];
$arFilter = ['IBLOCK_ID' => 55, 'ID' => 1914525, 'ACTIVE' => 'Y'];
$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
if ($ob = $res->Fetch()) {
   // clog($ob);
    ?>
        <div class="solution-event__properties">
    <?
    foreach ($ob['PROPERTY_BLOCKS_VALUE'] as $i => $item) {
        $class = $i === 0 ? ' conditions__item_red' : '';
        ?>
        <div class="conditions__item<?=$class;?>">
            <div class="conditions__card">
                <div class="conditions__preview">
                    <h3><?=$item['SUB_VALUES']['BLOCKS_TITLE']['VALUE'];?></h3>
                    <h4><?=$item['SUB_VALUES']['BLOCKS_SUBTITLE']['VALUE'];?></h4>
                </div>
                <div class="conditions__text">
                    <p><?=$item['SUB_VALUES']['BLOCKS_DESCRIPTION']['VALUE']['TEXT'];?></p>
                </div>
            </div>
        </div>
        <?
    }
    ?>
        </div>
    <?
}
