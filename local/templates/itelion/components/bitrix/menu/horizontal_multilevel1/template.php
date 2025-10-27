<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$sections = CIBlockSection::GetList(
    array("SORT"=>"ASC"),
    ['IBLOCK_ID' => 12, 'ACTIVE' => 'Y'],
    false,
    ['NAME', 'CODE', 'DESCRIPTION','UF_ICON','UF_TEXT_MENU']
);
$case = [];
while ($ob = $sections->fetch()){
    $case[$ob['NAME']] = $ob;
}


?>
<?global $APPLICATION;?>
<?if (!empty($arResult)):?>
    <nav class="header__nav">
        <ul class="desktop-menu">
            <?
            $previousLevel = 0;
            foreach($arResult as $arItem):?>

            <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                <?=str_repeat("</div></div></div></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
            <?endif?>

            <?if ($arItem["IS_PARENT"]):?>

            <?if ($arItem["DEPTH_LEVEL"] == 1):?>
            <li>
                <a href="<?=$arItem["LINK"]?>" class="desktop-menu__link <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
                <div class="desktop-menu__item">
                    <div class="desktop-menu-links">
                        <div class="desktop-menu-links__list">
                            <?else:?>
                            <li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>>
                                <a href="<?=$arItem["LINK"]?>" class="desktop-menu-links__item">
                                    <div class="desktop-menu-links__icon">
                                        <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/desktop-menu-links-<?=$arItem["PARAMS"]["ICON_NUMBER"]?>.svg" alt="#">
                                    </div>
                                    <div class="desktop-menu-links__content">
                                        <h3><?=$arItem["TEXT"]?></h3>
                                        <p><?=$arItem["PARAMS"]["DESCRIPTION"]?></p>
                                    </div>
                                </a>
                                <div class="desktop-menu__item">
                                    <div class="desktop-menu-links">
                                        <div class="desktop-menu-links__list">
                                            <?endif?>

                                            <?else:?>

                                                <?if ($arItem["PERMISSION"] > "D"):?>

                                                    <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                                                        <li>
                                                            <a href="<?=$arItem["LINK"]?>" class="desktop-menu__link <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
                                                        </li>
                                                    <?else:?>
                                                        <a href="<?=$arItem["LINK"]?>" class="desktop-menu-links__item <?if ($arItem["SELECTED"]):?>item-selected<?endif?>">
                                                            <div class="desktop-menu-links__icon">
                                                                <?if (strpos($arItem["LINK"], 'case')):?>
                                                                    <img src="<?= CFile::GetPath($case[$arItem["TEXT"]]['UF_ICON'])?>" alt="#">
                                                                <?else:?>
                                                                    <?if (str_contains($APPLICATION->GetDirProperty("icons_menu" , $arItem["LINK"]),'IBLOCK') !== false):?>
                                                                        <?$iblockid = str_replace('IBLOCK ', '',$APPLICATION->GetDirProperty("icons_menu" , $arItem["LINK"]))?>
                                                                    <?else:?>
                                                                        <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/desktop-menu-links-<?=$APPLICATION->GetDirProperty("icons_menu" , $arItem["LINK"]);?>.svg" alt="#">
                                                                    <?endif;?>
                                                                <?endif?>

                                                            </div>
                                                            <div class="desktop-menu-links__content">
                                                                <h3><?=$arItem["TEXT"]?></h3>
                                                                <?if (strpos($arItem["LINK"], 'case')):?>
                                                                <p><?= $case[$arItem["TEXT"]]['UF_TEXT_MENU']?></p>
                                                                <?else:?>
                                                                    <p><?=$APPLICATION->GetDirProperty("description_menu_text" , $arItem["LINK"]);?></p>

                                                                <?endif?>
                                                            </div>
                                                        </a>
                                                    <?endif?>

                                                <?else:?>

                                                    <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                                                        <li>
                                                            <a href="" class="desktop-menu__link <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a>
                                                        </li>
                                                    <?else:?>
                                                        <a href="" class="desktop-menu-links__item denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>">
                                                            <div class="desktop-menu-links__icon">
                                                                <img src="<?=SITE_TEMPLATE_PATH ?>/files/icons/desktop-menu-links-<?=$arItem["PARAMS"]["ICON_NUMBER"]?>.svg" alt="#">
                                                            </div>
                                                            <div class="desktop-menu-links__content">
                                                                <h3><?=$arItem["TEXT"]?></h3>
                                                                <p><?=$APPLICATION->GetDirProperty("description_menu_text" , "/company/index.php")?></p>
                                                            </div>
                                                        </a>
                                                    <?endif?>

                                                <?endif?>

                                            <?endif?>

                                            <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

                                            <?endforeach?>

                                            <?if ($previousLevel > 1):?>
                                                <?=str_repeat("</div></div></div></li>", ($previousLevel-1) );?>
                                            <?endif?>

        </ul>
    </nav>
<?endif?>

