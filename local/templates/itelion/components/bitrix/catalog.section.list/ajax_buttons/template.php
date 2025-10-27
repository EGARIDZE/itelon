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

$divId = 'section_list_'.$arParams["IBLOCK_TYPE"].'_'.$arParams["IBLOCK_ID"];
$outerTagId = $arParams['TAG_ID'];
//clog($arParams);
?>

<div id="<?=$divId;?>" class="navigation">
    <?
    if ($arParams['ALL_BUTTON_NAME']) {
	    $strClassActive = $arParams['ACTIVE_SECTION'] == '' ? ' _active' : '';
        ?><p class="navigation__item btn btn_medium btn_outlined<?=$strClassActive;?>" data-section="">
		<?=$arParams['ALL_BUTTON_NAME'];?>
        </p><?
    }
    foreach($arResult["SECTIONS"] as $arSection) {
        $strClassActive = $arParams['ACTIVE_SECTION'] == $arSection['CODE'] ? ' _active' : '';
        ?>
        <p class="navigation__item btn btn_medium btn_outlined<?=$strClassActive;?>" data-section="<?=$arSection['CODE'];?>">
            <?=$arSection['NAME'];?>
        </p>
        <?
    }
    ?>
</div>
<script type="text/javascript">
    $(function (){
        $('#<?=$divId;?>').on('click', 'p', function(){
            $.post(window.location.href,
                {
                    '<?=$arParams['IBLOCK_TYPE'].'_'.$arParams["IBLOCK_ID"];?>_section': $(this).data('section'),
                }
                , function (res) {
                    $('#<?=$outerTagId;?>').html(res);
                }
            );
        });
    });
</script>