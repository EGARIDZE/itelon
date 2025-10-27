<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта сайта - Товары");
$APPLICATION->SetPageProperty('title', "Карта сайта Itelon - Товары");
$APPLICATION->SetPageProperty('description', "Полная карта сайта магазина серверного оборудования. Быстрый доступ ко всем разделам: серверы, СХД, сетевые решения, акции, доставка и контакты. Удобная навигация для пользователей и SEO. - Товары");
?>
<style>
    .sitemap h2{
        font-size: 3rem;
        margin: 30px 0;
    }

    .sitemap ul li{
        line-height: 0;
    }
    
    .sitemap ul li ul{
        margin-top: 10px;
    }
    .sitemap ul li a{
        color: #005AA3 !important;
    }

    .sitemap h2 a{
        color: #005AA3 !important;      
    }
</style>
    <section class="section sitemap">
        <div class="container">
            <h1><?php echo $APPLICATION->getTitle(false); ?></h1>

            <?php
            //Продукты
                $res = CIBlockElement::GetList(Array(), ["IBLOCK_ID"=>14, "ACTIVE" => 'Y'], false, false, ["ID", "NAME", "CODE"]);
                echo '<ul>';
                while($ob = $res->GetNextElement())
                {
                    $arFields = $ob->GetFields();
                    echo '<li><a href="/product/'.$arFields['CODE'].'/">'.$arFields['NAME'].'</a></li>';
                }
                echo '</ul>';
            ?>

            <?php
            // Конфигураторы
            $res = CIBlockElement::GetList(
                [],
                [
                    "IBLOCK_ID" => 48,
                    "ACTIVE" => "Y"
                ],
                false,
                false,
                ["ID", "NAME", "CODE", "IBLOCK_SECTION_ID"]
            );

            echo '<ul>';
            while ($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();

                // Получаем путь разделов
                $sectionPath = getSectionPath($arFields["IBLOCK_SECTION_ID"]);

                if (!empty($sectionPath)) {
                    $elementUrl = '/configurator/' . implode('/', $sectionPath) . '/' . $arFields["CODE"] . '/';
                } else {
                    $elementUrl = '/configurator/' . $arFields["CODE"] . '/';
                }

                echo '<li><a href="' . $elementUrl . '">' . $arFields['NAME'] . '</a></li>';
            }
            echo '</ul>';


            // Функция для получения пути разделов
            function getSectionPath($sectionId) {
                $path = [];

                while ($sectionId > 0) {
                    $section = CIBlockSection::GetByID($sectionId)->GetNext();
                    if (!$section) break;

                    $path[] = $section['CODE'];
                    $sectionId = $section['IBLOCK_SECTION_ID'];
                }

                return array_reverse($path); // от корневого к текущему
            }
            ?>

        </div>
    </section>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");