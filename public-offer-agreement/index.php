<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Публичный договор-оферта");
?>

    <section class="section">
        <div class="container">
            <div class="section__column">
                <div class="section__wrapper">
                    <div class="page-preview">
                        <h1><? $APPLICATION->ShowProperty('h1'); ?></h1>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:breadcrumb",
                            "breadcrumb",
                            array(
                                "PATH" => "",
                                "SITE_ID" => "s1",
                                "START_FROM" => "0"
                            )
                        ); ?>
                    </div>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        ".default",
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/public-offer-agreement.php",
                            "EDIT_TEMPLATE" => ""
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>