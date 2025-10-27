<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult["CATEGORIES"]) && $arResult["DEBUG"]["SHOW"] != 'Y') return;

IncludeTemplateLangFile(__FILE__);

$arParams["SHOW_PREVIEW_TEXT"] = ($arParams["SHOW_PREVIEW_TEXT"]) ? $arParams["SHOW_PREVIEW_TEXT"] : 'Y';

$preview = ($arParams["SHOW_PREVIEW"] != 'N');

$image_style = '';
$info_style = '';

if($preview){
	if($arParams["PREVIEW_WIDTH_NEW"]){
		$image_style .= 'width: '.$arParams["PREVIEW_WIDTH_NEW"].'px;';
		$info_style .= 'padding-left: '.($arParams["PREVIEW_WIDTH_NEW"]+5).'px;';
	}
	if($arParams["PREVIEW_HEIGHT_NEW"]){
		$image_style .= 'height: '.$arParams["PREVIEW_HEIGHT_NEW"].'px;';
	}
	if($info_style) $info_style = 'style="'.$info_style.'"';
}
?>

<div>
	<?

	if($arResult["DEBUG"]["SHOW"] == 'Y'){
		echo '<pre>Debug Info: '; print_r($arResult["DEBUG"]); echo '</pre>';
		// echo '<pre>'; print_r($arResult["CATEGORIES"]); echo '</pre>';
	}
	?>
	
	<?if(!empty($arResult["CATEGORIES"])):?>
		<?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>

			<?
				// Массив для хранения результатов, разбитых по PARAM2
				$groupedResults = [];

				// Проходим по каждому элементу исходного массива
				foreach ($arCategory["ITEMS"] as $item) {
					$param2Value = $item['PARAM2'];
					if (!isset($groupedResults[$param2Value])) {
						$groupedResults[$param2Value] = [];
					}

					$groupedResults[$param2Value][] = $item;
				}

				// foreach ($groupedResults as $param2 => $items) {
				// 	echo "<h3>Группа PARAM2 = $param2</h3>\n<ul>\n";
				// 	foreach ($items as $item) {
				// 		echo "<li>{$item['NAME']} (ID: {$item['ITEM_ID']})</li>\n";
				// 	}
				// 	echo "</ul>\n";
				// }				
			?>

			<?			
			if (isset($groupedResults[14])) {
				echo "<h3>Продукция <span>".count($groupedResults[14])."</span></h3>";
				echo '<ul>';

				$arServers = [];

				foreach($groupedResults[14] as $k => $item){

					$res = CCatalogProduct::GetList([], ["ID" => $item['ITEM_ID']], false, false, ["ID", "QUANTITY"]);
					while ($arProduct = $res->Fetch()) {
						$product_qty = $arProduct["QUANTITY"];
					}	
					
					$prodPrice = null;
					$prodPriceFormat = '';
					$db_res = CPrice::GetList(
							array(),
							array(
									"PRODUCT_ID" => $item['ITEM_ID'],  // Получаем ID Товара
									"CATALOG_GROUP_ID" => 1 // Получаем ID типа цен из переменной
								)
						);
					if ($ar_res = $db_res->Fetch())
					{
						$prodPrice = intval($ar_res['PRICE']);
					}							

					$res = CIBlockElement::GetList([], ["ID" => $item['ITEM_ID'], "ACTIVE" => "Y"], false, false, ["*"]);

					if ($ob = $res->GetNextElement()) {
						$arFields = $ob->GetFields();
						$arProps = $ob->GetProperties();
						$serverDate = strtotime($arFields['DATE_CREATE']); // timestamp для сортировки

						$avail = CDataModifier::QtyToStrValues(
							$product_qty
							,$arProps['AVAIL']['VALUE']
							,$arProps['AVAIL']['XML_ID']
							,$arProps['_MIN_DTIME']['VALUE'] ?: $arProps['DELIVERY_TIME']['VALUE'] ?: ''
						);

						// Получаем информацию об изображении анонса (PREVIEW_PICTURE)
						$previewPictureId = $arFields["PREVIEW_PICTURE"];				
						$prodPriceFormat = CDataModifier::PriceFormat($prodPrice, true, true);								
						
					}		
					
					$arServers[$k] = $item;
					$arServers[$k]['PRICE'] = $prodPrice;
					$arServers[$k]['PRICE_FORMATTED'] = $prodPriceFormat;
					$arServers[$k]['QUANTITY'] = $product_qty;
					$arServers[$k]['PREVIEW_PICTURE_ID'] = $previewPictureId;
					$arServers[$k]['AVAIL'] = $avail;
					$arServers[$k]['DATE_CREATE'] = $serverDate;

				}


				usort($arServers, function($a, $b) {
					// 1. Сначала по наличию цены
					// $hasPriceA = !empty($a['PRICE']);
					// $hasPriceB = !empty($b['PRICE']);
					// if ($hasPriceA != $hasPriceB) {
					// 	return $hasPriceB - $hasPriceA;
					// }

					// // 2. Потом по количеству (наличию)
					// $qtyA = (int)$a['QUANTITY'];
					// $qtyB = (int)$b['QUANTITY'];
					// if ($qtyA != $qtyB) {
					// 	return $qtyB - $qtyA;
					// }

					// 3. Потом по дате (сначала новые)
					return $b['DATE_CREATE'] - $a['DATE_CREATE'];
				});				

				foreach($arServers as $k => $server){

					if( !empty($server['PREVIEW_PICTURE_ID']) ){
						echo '<li class="product__item"><div class="product__item-l"><img src="'.CFile::GetPath($server['PREVIEW_PICTURE_ID']).'"><a href="'.$server["URL"].'">'.$server['NAME'].'</a><span class="avail '.$server['AVAIL']['class'].'">'.$server['AVAIL']['text'].'</span></div><div class="product__item-r">'.$server['PRICE_FORMATTED'].'</div></li>';
					}else{
						echo '<li class="product__item"><div class="product__item-l"><a href="'.$server["URL"].'">'.$server['NAME'].'</a><span class="avail '.$server['AVAIL']['class'].'">'.$server['AVAIL']['text'].'</span></div><div class="product__item-r">'.$server['PRICE_FORMATTED'].'</div></li>';
					}
					
					if( $k == 4 ){
						break;
					}
				}
				echo '</ul>';		
			}

			if (isset($groupedResults[19])) {
				echo "<h3>Решения <span>".count($groupedResults[19])."</span></h3>";
				echo '<ul>';
				foreach($groupedResults[19] as $k => $item){

					echo '<li><a href="'.$item["URL"].'">'.$item['NAME'].'</a></li>';
					if( $k == 3 ){
						break;
					}
				}
				echo '</ul>';		
			}


			// if (isset($groupedResults[12])) {
			// 	echo "<h3>Кейсы <span>".count($groupedResults[12])."</span></h3>";
			// 	echo '<ul>';
			// 	foreach($groupedResults[12] as $k => $item){

			// 		echo '<li><a href="'.$item["URL"].'">'.$item['NAME'].'</a></li>';
			// 		if( $k == 4 ){
			// 			break;
			// 		}
			// 	}
			// 	echo '</ul>';		
			// }

			if (isset($groupedResults[17])) {
				echo "<h3>Блог <span>".count($groupedResults[17])."</span></h3>";
				echo '<ul>';
				foreach($groupedResults[17] as $k => $item){

					echo '<li><a href="'.$item["URL"].'">'.$item['NAME'].'</a></li>';
					if( $k == 3 ){
						break;
					}
				}
				echo '</ul>';		
			}			

			if (isset($groupedResults[2])) {
				echo "<h3>Новости <span>".count($groupedResults[2])."</span></h3>";
				echo '<ul>';
				foreach($groupedResults[2] as $k => $item){

					echo '<li><a href="'.$item["URL"].'">'.$item['NAME'].'</a></li>';
					if( $k == 3 ){
						break;
					}
				}
				echo '</ul>';		
			}			

			?>



		
	
			<!-- <?foreach($arCategory["ITEMS"] as $i => $arItem):?>
				<?if(isset($arResult["ELEMENTS"][$arItem["ITEM_ID"]])):
					$arElement = $arResult["ELEMENTS"][$arItem["ITEM_ID"]];
				
					$arElement["PREVIEW_TEXT"] = strip_tags($arElement["PREVIEW_TEXT"]);
				
					if($arItem['IS_HINT']){
						$image_url = '/bitrix/components/arturgolubev/search.title/templates/.default/images/search-icon.svg';
					}elseif(is_array($arElement["PICTURE"])){
						$image_url = $arElement["PICTURE"]["src"];
					}else{
						$image_url = '/bitrix/components/arturgolubev/search.title/templates/.default/images/noimg.png';
					}
				?>
					
					<a class="js_search_href bx_item_block_href bx_item_block_element" href="<?echo $arItem["URL"]?>">
						<span class="bx_item_block_item_info">
							<?if($preview):?>
								<?if($arItem['IS_HINT']):?>
									<span class="bx_item_block_item_image" style="<?=$image_style?>">
										<svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 30 30" width="30px" height="30px"><path fill="currentColor" d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z"/></svg>
									</span>
								<?else:?>
									<span class="bx_item_block_item_image" style="<?=$image_style?>"><img src="<?=$image_url?>" alt=""></span>
								<?endif;?>
							<?endif;?>
							
							<span class="bx_item_block_item_info_wrap <?if($preview) echo 'wpic';?>"<?=$info_style?>>
								<?
								foreach($arElement["PRICES"] as $code=>$arPrice)
								{
									if ($arPrice["MIN_PRICE"] != "Y")
										continue;

									if($arPrice["CAN_ACCESS"])
									{
										if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
											<span class="bx_item_block_item_price">
												<span class="bx_price_new">
													<?=$arPrice["PRINT_DISCOUNT_VALUE"]?>
												</span>
												<span class="bx_price_old"><?=$arPrice["PRINT_VALUE"]?></span>
											</span>
										<?else:?>
											<span class="bx_item_block_item_price bx_item_block_item_price_only_one">
												<span class="bx_price_new"><?=$arPrice["PRINT_VALUE"]?></span>
											</span>
										<?endif;
									}
									if ($arPrice["MIN_PRICE"] == "Y")
										break;
								}
								?>
								
								<span class="bx_item_block_item_name">
									<span class="bx_item_block_item_name_flex_align">
										<?echo $arItem["NAME"]?>
									</span>
									
									<?/* if($arResult["DEBUG"]["SHOW_DEBUG"] == 'Y'):?>
										&nbsp;<span class="bx_item_block_item_name_flex_align">
											(<?echo $arItem["NAME_S"]?>)
										</span>
									<?endif; */?>
								</span>
							
								<?if($arParams['SHOW_QUANTITY'] == 'Y' && $arElement['CATALOG_TYPE'] != 3 && strlen($arElement['CATALOG_QUANTITY']) > 0):
									// echo '<pre>'; print_r($arResult['MEASURES']); echo '</pre>';
									// echo '<pre>'; print_r($arElement); echo '</pre>';
								?>
									<span class="bx_item_block_item_props">
										<?=GetMessage('AG_SMARTIK_CATALOG_QUANTITY')?>: <?=$arElement['CATALOG_QUANTITY']?>
										<?if($arElement['CATALOG_MEASURE'] && is_array($arResult['MEASURES'][$arElement['CATALOG_MEASURE']])) echo $arResult['MEASURES'][$arElement['CATALOG_MEASURE']]['SYMBOL'];?>
									</span>
								<?endif;?>
								
								<?if(!empty($arElement["PROPS"])):?>
									<span class="bx_item_block_item_props">
										<?foreach($arElement["PROPS"] as $prop):
										if(empty($prop["VALUE"])) continue;
										?>
											<span class="bx_item_block_item_prop_item"><span class="bx_item_block_item_prop_item_name"><?=$prop["NAME"]?>:</span> <span class="bx_item_block_item_prop_item_value"><?
												if(is_array($prop["VALUE"])){
													echo implode(', ', $prop["VALUE"]);
												}else{
													echo $prop["VALUE"];
												}
											?></span></span>
										<?endforeach;?>
									</span>
								<?endif;?>
								
								<?if($arParams["SHOW_PREVIEW_TEXT"] == 'Y' && $arElement["PREVIEW_TEXT"]):?>
									<span class="bx_item_block_item_text"><?=$arElement["PREVIEW_TEXT"]?></span>
								<?endif;?>
							</span>
							<span class="bx_item_block_item_clear"></span>
						</span>
					</a>
				<?endif;?>
			<?endforeach;?> -->

		<?endforeach;?>
	<?else:?>
		<div class="bx_smart_no_result_find">
			<?=GetMessage("AG_SMARTIK_NO_RESULT");?>
		</div>
	<?endif;?>

	<a class="all_result_button" href="/search/?q=<?=htmlspecialcharsbx($_REQUEST["q"])?>">Все результаты</a>

</div>