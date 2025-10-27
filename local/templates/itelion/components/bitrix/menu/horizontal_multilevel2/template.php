<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


//mpr($arResult['CATALOG']);
$count = 0;

?>
<?global $APPLICATION;?>
<?if (!empty($arResult['ITEMS'])):?>
    <nav class="header__nav">
        <ul class="desktop-menu">
            <?
            $previousLevel = 0;
            foreach($arResult['ITEMS'] as $arItem):?>

                <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                    <? if(strpos($arItem['LINK'], 'solutions')):?>
                        <?=str_repeat("</div></div></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
                    <?else:?>
                        <?=str_repeat("</div>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
                        <? if(strpos($arItem['LINK'], 'support')):?>
                            <?=str_repeat('<div class="desktop-menu-links__banner"><a href="#" target="_blank" class="marketing__item "><div class="marketing__info"><h3>Последний реализованный проект</h3><img src="/local/templates/itelion/files/icons/btn-icon_primary.svg" alt="#"></div><div class="marketing__image"><picture><source srcset="/local/templates/itelion/files/images/menu-project.webp" type="image/webp"><img src="/local/templates/itelion/files/images/menu-project.webp" alt="#"></picture></div></a></div>', ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
                        <?elseif(strpos($arItem['LINK'], 'kontakty')):?>
                            <?=str_repeat('<div class="desktop-menu-links__banner"><a href="#" target="_blank" class="marketing__item "><div class="marketing__info"><h3>Обращение в сервисный центр</h3><img src="/local/templates/itelion/files/icons/btn-icon_primary.svg" alt="#"></div><div class="marketing__image"><picture><source srcset="/local/templates/itelion/files/images/menu-support.webp" type="image/webp"><img src="/local/templates/itelion/files/images/menu-support.webp" alt="#"></picture></div></a></div>', ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
                        <?else:?>
                            <?=str_repeat('<div class="desktop-menu-links__banner"><a href="#consultation" class="marketing__item"><div class="marketing__info"><h3>Консультация эксперта</h3><img src="/local/templates/itelion/files/icons/btn-icon_primary.svg" alt="#"></div><div class="marketing__image"><picture><source srcset="/local/templates/itelion/files/images/headphones.webp" type="image/webp"><img src="/local/templates/itelion/files/images/headphones.webp" alt="#"></picture></div></a></div>', ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
                        <?endif?>
                        <?=str_repeat("</div></div></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
                    <?endif?>
                <?endif?>
                <?if ($arItem["IS_PARENT"]):?>
                        <li>
                        <a href="<?=$arItem["LINK"]?>" class="desktop-menu__link"><?=$arItem["TEXT"]?></a>
                        <div class="desktop-menu__item">
                        <div class="<?= strpos($arItem['LINK'], 'catalog') ? 'desktop-menu-nav' : 'desktop-menu-links'?>">
                        <div class="<?= strpos($arItem['LINK'], 'catalog') ? 'desktop-menu-nav__links' : 'desktop-menu-links__list'?>">
                <?else:?>
                        <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                            <li>
                                <a href="<?= $arItem['LINK']?>" class="desktop-menu__link"><?=$arItem["TEXT"]?></a>
                            </li>
                        <?else:?>
                            <?php if(strpos($arItem['LINK'], 'catalog')):?>
                                <div class="desktop-menu-nav__link<?= $count == 1 ? ' _visible' : ''?>" data-link="<?= $arItem['PARAMS']['CODE']?>"><h3><?=$arItem["TEXT"]?></h3></div>
                            <?php else:?>
                                <a href="<?= $arItem['LINK']?>" class="desktop-menu-links__item denied">
                                    <div class="desktop-menu-links__icon">
                                        <img src="<?= $arItem['PARAMS']['ICON_URL']?>" alt="#">
                                    </div>
                                    <div class="desktop-menu-links__content">
                                        <h3><?=$arItem["TEXT"]?></h3>
                                        <p><?= $arItem['PARAMS']['DESCRIPTION']?></p>
                                    </div>
                                </a>
                            <?php endif;?>
                        <?endif?>
                <?endif?>
                <? if($count == $arResult['CATALOG_COUNT']):?>
                    </div>
                    <div class="desktop-menu-nav__items">
                        <? foreach ($arResult['CATALOG'] as $k => $item):?>
                            <? if ($item['PARAMS']['CODE'] == 'servery') { ?>
                                <div class="desktop-menu-nav__body _visible" data-menu="servery">
                                    <div class="desktop-menu-nav__preview">
                                        <div class="desktop-menu-nav__header">
                                            <a href="<?= $arResult['SERVERY_MENU']['CODE']; ?>">
                                                <span><?= $arResult['SERVERY_MENU']['NAME']; ?></span>
                                            </a>
                                            <div class="desktop-menu-nav__list">
                                                <? foreach ($arResult['SERVERY_MENU']['PROPERTY_SUBSECTIONS_VALUE'] as $key => $item) { ?>
                                                    <a href="<?= $arResult['SERVERY_MENU']['PROPERTY_SUBSECTIONS_DESCRIPTION'][$key]; ?>"><?= $item; ?></a>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="navigation">
                                        <? foreach ($arResult['SERVERY_MENU']['PROPERTY_SETS_VALUE'] as $key => $item) { ?>
                                            <a href="<?= $arResult['SERVERY_MENU']['PROPERTY_SETS_DESCRIPTION'][$key]; ?>" class="navigation__item btn btn_small btn_outlined"><?= $item; ?></a>
                                        <? } ?>
                                    </div>
                                    <div class="desktop-menu-nav__btns">
                                        <? foreach ($arResult['SERVERY_MENU']['PROPERTY_SECTIONS_VALUE'] as $key => $item) { ?>
                                            <span class="btn btn_medium btn_menu btn-icon btn-icon_reverse btn-icon_hover" >
                                                <span class="children"><?= $item; ?></span>
                                                <a href="<?= $arResult['SERVERY_MENU']['PROPERTY_SECTIONS_DESCRIPTION'][$key]; ?>"   class="cover " ></a>
                                            </span>
                                        <? } ?>
                                    </div>
                                </div>
                            <? } else { ?>
                                <div class="desktop-menu-nav__body" data-menu="<?= $item['PARAMS']['CODE']?>">
                                    <div class="desktop-menu-nav__preview">
                                        <div class="desktop-menu-nav__header">
                                            <a href="<?= $item['LINK']?>"><span><?= $item['TEXT']?></span></a>
                                            <? if($item['SUB_SECTIONS']):?>
                                            <div class="desktop-menu-nav__list">
                                                <? foreach ($item['SUB_SECTIONS'] as $val):?>
                                                    <a href="<?= $item['LINK'] . $val['CODE'] . '/'?>"><?= $val['NAME']?></a>
                                                <? endforeach;?>
                                            </div>
                                            <? endif;?>
                                        </div>
                                    </div>
                                    <? if($item['SETS']):?>
                                        <div class="navigation">
                                            <? foreach ($item['SETS'] as $val):?>
                                                <a href="/category/<?= $val['CODE']?>/" class="navigation__item btn btn_small btn_outlined"><?= $val['NAME']?></a>
                                            <? endforeach;?>
                                        </div>
                                    <? endif;?>
                                    <? if($item['PARAMS']['UF_LIZING'] || $item['PARAMS']['UF_STOCK']):?>
                                        <div class="desktop-menu-nav__btns">
                                            <? if($item['PARAMS']['UF_LIZING']):?>
                                                <span class="btn btn_medium btn_menu btn-icon btn-icon_reverse btn-icon_hover">
                                                    <span class="children">Лизинг</span>
                                                    <a href="/lizing/" class="cover "></a>
                                                </span>
                                            <? endif;?>
                                            <? if($item['PARAMS']['UF_STOCK']):?>
                                                <span class="btn btn_medium btn_menu btn-icon btn-icon_reverse btn-icon_hover">
                                                    <span class="children">Акции</span>
                                                    <a href="/stock/" class="cover "></a>
                                                </span>
                                            <? endif;?>
                                        </div>
                                    <? endif;?>
                                </div>
                            <? } ?>
                        <?endforeach?>
                    </div>
                <?endif?>
                <? if(strpos($arItem['LINK'], 'catalog')){
                    $count += 1;
                }?>
                <?$previousLevel = $arItem["DEPTH_LEVEL"];?>
            <?endforeach?>
            <?if ($previousLevel > 1):?>
                <?=str_repeat("</div></div></div></li>", ($previousLevel-1) );?>
            <?endif?>
        </ul>
    </nav>
<?endif?>




