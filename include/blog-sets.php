<p class="navigation__item btn btn_medium btn_outlined" data-id="">Все теги</p>
<?
$arSelect = ['ID', 'IBLOCK_ID', 'NAME'];
$arFilter = ['IBLOCK_ID' => 54, 'ACTIVE' => 'Y', 'SECTION_ID' => 0];
$res = CIBlockElement::GetList(['SORT'=>'asc'], $arFilter, false, false, $arSelect);
while ($ob = $res->Fetch()) {
    ?>
    <p class="navigation__item btn btn_medium btn_outlined" data-id="<?=$ob['ID'];?>"><?=$ob['NAME'];?></p>
    <?
}
