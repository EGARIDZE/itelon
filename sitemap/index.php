<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта сайта");
$APPLICATION->SetPageProperty('title', "Карта сайта Itelon");
$APPLICATION->SetPageProperty('description', "Полная карта сайта магазина серверного оборудования. Быстрый доступ ко всем разделам: серверы, СХД, сетевые решения, акции, доставка и контакты. Удобная навигация для пользователей и SEO.");
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

            function printSectionTree(array $sections, $url, $level = 0, $parentId = null, $parentCode = null) {
                if (empty($sections)) {
                    return;
                }

                if($level > 0){
                    $url = str_replace('//', '/', $url);
                }

                echo '<ul>';
                foreach ($sections as $section) {
                    // if($parentId == 182 || $section['IBLOCK_SECTION_ID'] == 182 ){
                    //     $url = '/configurator/servery/';



                    // }
                    echo '<li>';
                    echo '<a href="'.$url.$section['CODE'].'/">'.$section['NAME'].'</a><br>';

                    
                    if (!empty($section['CHILD'])) {

                        printSectionTree($section['CHILD'], $url.'/'.$section['CODE'].'/', $level + 1, $section['ID'], $section['CODE']);
                    }
                    
                    echo '</li>';
                }
                echo '</ul>';
            }    
            ?>
            
            <h2>Каталог</h2>
            <?

            //Каталог
            $rsSections = CIBlockSection::GetList(['DEPTH_LEVEL' => 'ASC', 'SORT' => 'ASC'], ['ACTIVE' => 'Y', 'IBLOCK_ID' => 14, 'GLOBAL_ACTIVE' => 'Y',], false, ['IBLOCK_ID', 'ID', 'NAME', 'DEPTH_LEVEL', 'IBLOCK_SECTION_ID', 'CODE']);
            $sectionLinc = array();
            $arResult['ROOT'] = array();
            $sectionLinc[0] = &$arResult['ROOT'];

            while ($arSection = $rsSections->GetNext()) {
                $sectionLinc[(int)$arSection['IBLOCK_SECTION_ID']]['CHILD'][$arSection['ID']] = $arSection;
                $sectionLinc[$arSection['ID']] = &$sectionLinc[(int)$arSection['IBLOCK_SECTION_ID']]['CHILD'][$arSection['ID']];
            }

            unset( $sectionLinc );
            $arResult['ROOT'] = $arResult['ROOT']['CHILD'];

            printSectionTree($arResult['ROOT'], '/catalog/');

            ?>

            <h2>Конфигуратор</h2>
            <?
            //Конфигуратор
            $rsSections = CIBlockSection::GetList(['DEPTH_LEVEL' => 'ASC', 'SORT' => 'ASC'], ['ACTIVE' => 'Y', 'IBLOCK_ID' => 48, 'GLOBAL_ACTIVE' => 'Y',], false, ['IBLOCK_ID', 'ID', 'NAME', 'DEPTH_LEVEL', 'IBLOCK_SECTION_ID', 'CODE']);
            $sectionLinc = array();
            $arResult['ROOT'] = array();
            $sectionLinc[0] = &$arResult['ROOT'];

            while ($arSection = $rsSections->GetNext()) {
                $sectionLinc[(int)$arSection['IBLOCK_SECTION_ID']]['CHILD'][$arSection['ID']] = $arSection;
                $sectionLinc[$arSection['ID']] = &$sectionLinc[(int)$arSection['IBLOCK_SECTION_ID']]['CHILD'][$arSection['ID']];
            }

            unset( $sectionLinc );
            $arResult['ROOT'] = $arResult['ROOT']['CHILD'];
            
            printSectionTree($arResult['ROOT'], '/configurator/');
            ?>

            <h2>Сеты</h2>
            <?php
            //Сеты
                $res = CIBlockElement::GetList(Array(), ["IBLOCK_ID"=>18, "ACTIVE" => 'Y'], false, false, ["ID", "NAME", "CODE"]);
                echo '<ul>';
                while($ob = $res->GetNextElement())
                {
                    $arFields = $ob->GetFields();
                    echo '<li><a href="/category/'.$arFields['CODE'].'/">'.$arFields['NAME'].'</a></li>';
                }
                echo '</ul>';
            ?>   
            
            <h2><a href="/solutions/">ИТ-решения</a></h2>
           <?
            $rsSections = CIBlockSection::GetList(['DEPTH_LEVEL' => 'ASC', 'SORT' => 'ASC'], ['ACTIVE' => 'Y', 'IBLOCK_ID' => 12, 'GLOBAL_ACTIVE' => 'Y',], false, ['IBLOCK_ID', 'ID', 'NAME', 'DEPTH_LEVEL', 'IBLOCK_SECTION_ID', 'CODE']);
            $sectionLinc = array();
            $arResult['ROOT'] = array();
            $sectionLinc[0] = &$arResult['ROOT'];

            while ($arSection = $rsSections->GetNext()) {
                $sectionLinc[(int)$arSection['IBLOCK_SECTION_ID']]['CHILD'][$arSection['ID']] = $arSection;
                $sectionLinc[$arSection['ID']] = &$sectionLinc[(int)$arSection['IBLOCK_SECTION_ID']]['CHILD'][$arSection['ID']];
            }

            unset( $sectionLinc );
            $arResult['ROOT'] = $arResult['ROOT']['CHILD'];
            
            printSectionTree($arResult['ROOT'], '/solutions/');
            ?>                
            <?php
                $res = CIBlockElement::GetList(Array(), ["IBLOCK_ID"=>19, "ACTIVE" => 'Y'], false, false, ["ID", "NAME", "DETAIL_PAGE_URL"]);
                echo '<ul>';
                while($ob = $res->GetNextElement())
                {
                    $arFields = $ob->GetFields();
                    echo '<li><a href="'.$arFields["DETAIL_PAGE_URL"].'">'.$arFields['NAME'].'</a></li>';
                }
                echo '</ul>';
            ?> 

            <h2><a href="/case/">Кейсы</a></h2>
           <?
            $rsSections = CIBlockSection::GetList(['DEPTH_LEVEL' => 'ASC', 'SORT' => 'ASC'], ['ACTIVE' => 'Y', 'IBLOCK_ID' => 12, 'GLOBAL_ACTIVE' => 'Y',], false, ['IBLOCK_ID', 'ID', 'NAME', 'DEPTH_LEVEL', 'IBLOCK_SECTION_ID', 'CODE']);
            $sectionLinc = array();
            $arResult['ROOT'] = array();
            $sectionLinc[0] = &$arResult['ROOT'];

            while ($arSection = $rsSections->GetNext()) {
                $sectionLinc[(int)$arSection['IBLOCK_SECTION_ID']]['CHILD'][$arSection['ID']] = $arSection;
                $sectionLinc[$arSection['ID']] = &$sectionLinc[(int)$arSection['IBLOCK_SECTION_ID']]['CHILD'][$arSection['ID']];
            }

            unset( $sectionLinc );
            $arResult['ROOT'] = $arResult['ROOT']['CHILD'];
            
            printSectionTree($arResult['ROOT'], '/case/');
            ?>            
            <?php
                $res = CIBlockElement::GetList(Array(), ["IBLOCK_ID"=>12, "ACTIVE" => 'Y'], false, false, ["ID", "NAME", "DETAIL_PAGE_URL"]);
                echo '<ul>';
                while($ob = $res->GetNextElement())
                {
                    $arFields = $ob->GetFields();
                    echo '<li><a href="'.$arFields["DETAIL_PAGE_URL"].'">'.$arFields['NAME'].'</a></li>';
                }
                echo '</ul>';
            ?>             

            <h2>Товары</h2>
            <ul>
                <li><a href="/sitemap/product/">Товары</a></li>
            </ul>
            <h2>Страницы сайта</h2>
            <ul>
                <li><a href="/company/about/">О компании</a></li>
                <li><a href="/company/certificates/">Сертификаты</a></li>
                <li><a href="/company/vakansii/">Вакансии</a></li>
                <li><a href="/contacts/">Контакты</a></li>
                <li><a href="/stock/">Акции</a></li>
                <li><a href="/news/">Новости</a></li>
                <li><a href="/blog/">Блог</a></li>
                <li><a href="/questions-and-answers/">Вопросы и ответы</a></li>
                <li><a href="/support/technical-support/">Техническая поддержка</a></li>
                <li><a href="/support/warranty/">Гарантия</a></li>
                <li><a href="/privacy-policy/">Политика конфиденциальности</a></li>
                <li><a href="/public-offer-agreement/">Публичный договор-оферта</a></li>
                <li><a href="/user-agreement/">Пользовательское соглашение</a></li>
                
            </ul>

        </div>
    </section>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");