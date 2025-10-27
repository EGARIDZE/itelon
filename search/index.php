<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
session_start();

//clog($_REQUEST);
?>
<section class="section">
    <div class="container">
        <div class="page-preview">
            <h1><? $APPLICATION->ShowProperty('h1'); ?></h1>
            <?$APPLICATION->IncludeComponent(
                "bitrix:breadcrumb",
                "breadcrumb",
                Array(
                    "PATH" => "",
                    "SITE_ID" => "s1",
                    "START_FROM" => "0"
                )
            );?>
        </div>
        <div class="tabs">
            <div class="tabs__titles">
                 <!-- Для активного таба добавляется класс _active-->
                <h2 class="tabs__title _active" data-section="products">Товары</h2>
                <h2 class="tabs__title" data-section="solutions">Решения</h2>
                <h2 class="tabs__title" data-section="news">Новости</h2>
                <h2 class="tabs__title" data-section="blog">Блог</h2>
            </div>
            <div id="search_component">
                 <?
                    include $_SERVER['DOCUMENT_ROOT'].'/search/tab_content.php';
                    ?>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function (){
        $('.tabs__titles').on('click', '.tabs__title', function(event){
            $.post('/search/tab_content.php',
                {
                    'section': $(this).data('section'),
                    'q' : "<?=htmlspecialchars($_REQUEST['q'], ENT_QUOTES, 'UTF-8');?>",
                    's' : "<?=htmlspecialchars($_REQUEST['s'], ENT_QUOTES, 'UTF-8');?>"
                }
                , function (res) {
                    $('#search_component').html(res);
                }
            );
        });
    });
</script>
<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>