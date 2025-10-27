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
CJSCore::Init(array('ajax'));
$this->setFrameMode(true);
?>

<div class="container">
<div class="navigation">
    <?foreach($arResult["ITEMS"] as $arItem):?>

    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <a href="#"  onclick="ajax_set([<?=implode(',' , $arItem['PROPERTIES']['SET']['VALUE'])?>])" class="navigation__item btn btn_medium btn_outlined" id="<?=$this->GetEditAreaId($arItem['ID']);?>"><?=$arItem["NAME"]?></a>

    <?endforeach;?>
</div>

</div>
<script>
    function ajax_set(data) {
        const result = document.getElementById('catalog_section_ajax')

            BX.ajax({
                url: '/local/ajaxhandler/catalog_set_ajax.php',
                data: data,
                method: 'POST',
                dataType: 'html',
                timeout: 10,
                onsuccess: function (res) {
                    console.log('res: ', res)
                    result.innerHTML = res;
                },
                onfailure: e => {
                    console.error(e)
                }
            })

    }
</script>




























