<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

//clog($arResult);
$activeTabGroup = '';
?>

<div class="navigation-config">
    <div class="navigation-config__tabs">
        <?
        foreach ($arResult['SECTIONS_GROUPS']['TABS'] as $groupName => $arData) {
            $classActive = $arData['active'] ? ' _active' : '';
            if ($arData['active']) $activeTabGroup = $groupName;
            ?>
                <a href="<?=$arData['link'];?>" target="_self" class="navigation-config__tab<?=$classActive;?>">
                    <div class="navigation-config__title">
                        <h3><?=$groupName?></h3>
                    </div>
                </a>
            <?
        }
        ?>
    </div>
    <?
    foreach ($arResult['SECTIONS_GROUPS']['TAB_CONTENT'] as $groupName => $arSections) {
	    if ($activeTabGroup==$groupName) {
            ?>
            <div class="navigation-config__group-row">
		    <?
		    foreach ($arSections as $groupName2 => $arSections2) {
			    $class = $arSections2['active'] ? ' _active' : '';
			    ?>
                <div class="navigation-config__group">
                    <a href="<?=$arSections2['link']; ?>" target="_self" class="navigation-config__item<?=$class;?>">
                        <div class="navigation-config__title">
                            <h4><?=$groupName2?></h4>
                        </div>
                    </a>
                    <div class="navigation-config__list">
                        <!-- Активному пункту добавляется класс _active-->
					    <?
					    foreach($arSections2['list'] as $name => $arData){
						    $class = $arData['active'] ? ' _active' : '';
						    ?>
                            <a href="<?=$arData['link'];?>" target="_self" class="navigation-config__item<?=$class;?>"><?=$name;?></a>
						    <?
					    }
					    ?>
                    </div>
                </div>
			    <?
		    }
		    ?>
        </div>
	        <?
	    }
    }
    ?>
</div>
