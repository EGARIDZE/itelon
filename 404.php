<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404");
?>
<div>
    <section class="section">
        <div class="container">
            <div class="not-found">
                <div class="not-found__content">
                    <div class="not-found__title">
                        <h1>Страница не найдена</h1>
                        <p>
                            Страница, на которую вы пытаетесь попасть, не существует или была удалена.
                        </p>
                    </div>
                    <span class="btn btn_large btn_primary" >
	                <span class="children">Перейти на главную страницу</span>
                        <a href="/"   class="cover " ></a>
                    </span>
                </div>
                <div class="not-found__bg" style="background-image: url('<?=SITE_TEMPLATE_PATH ?>/files/images/not-found.webp');"></div>
            </div>
        </div>
    </section>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>