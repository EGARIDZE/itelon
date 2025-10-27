<?
if (!isset($_COOKIE['hide_banner'])) {
	CModule::IncludeModule('iblock');
	$arSelect = ['IBLOCK_ID','ID','PROPERTY_BANNER_HTML', 'PROPERTY_BANNER_COLOR'];
	$arFilter = ['IBLOCK_ID' => 55, 'ID' => 1914526, 'ACTIVE' => 'Y'];
	$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
	if ($ob = $res->Fetch()) {
//    clog($ob);
		?>
        <div class="header__banner" style="background: #<?=$ob['PROPERTY_BANNER_COLOR_VALUE'];?>">
            <div class="container">
				<?=$ob['PROPERTY_BANNER_HTML_VALUE']['TEXT'];?>
                <img class="banner-close-btn" src="/local/templates/itelion/files/icons/Icon-close.svg">
            </div>

        </div>

		<?
	}
}
