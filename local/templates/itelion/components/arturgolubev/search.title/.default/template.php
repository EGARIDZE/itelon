<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

/* hints */
$arResult["HINTS"] = array();
if(is_array($arParams["ANIMATE_HINTS"])){
	foreach($arParams["ANIMATE_HINTS"] as $k=>$v){
		$v = trim($v);
		if($v){
			$arResult["HINTS"][] = $v;
		}
	}
}

if(count($arResult["HINTS"])){
	CJSCore::Init(array("ag_smartsearch_type"));
	$arParams["INPUT_PLACEHOLDER"] = '';
	$arParams["ANIMATE_HINTS_SPEED"] = (intval($arParams["ANIMATE_HINTS_SPEED"]) ? intval($arParams["ANIMATE_HINTS_SPEED"]) : 1);
}
/* end hints */

$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
	$INPUT_ID = "smart-title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
	$CONTAINER_ID = "smart-title-search";

$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

$PRELOADER_ID = $CONTAINER_ID."_preloader_item";
$CLEAR_ID = $CONTAINER_ID."_clear_item";
$VOICE_ID = $CONTAINER_ID."_voice_item";

if($arParams["SHOW_INPUT"] !== "N"):?>
<div class="search-bar ">
	<form action="<?echo $arResult["FORM_ACTION"]?>">
		<div class="search-bar__wrapper">
			<input id="<?echo $INPUT_ID?>" placeholder="Поиск" type="text" name="q" value="<?=htmlspecialcharsbx($_REQUEST["q"])?>" autocomplete="off" class="search-bar__input">
			<span class="bx-input-group-btn">
				<span class="bx-searchtitle-preloader <?if($arParams["SHOW_LOADING_ANIMATE"] == 'Y') echo 'view';?>" id="<?echo $PRELOADER_ID?>"></span>
				<span class="bx-searchtitle-clear" id="<?echo $CLEAR_ID?>"></span>
				<button class="search-bar__submit" type="submit" name="s"></button>
			</span>						
		</div>
	</form>
	
	<?$frame = $this->createFrame()->begin('');?>
		<?if($arParams['SHOW_HISTORY_POPUP'] != 'Y' && is_array($arResult["SEARCH_HISTORY"]) && count($arResult["SEARCH_HISTORY"]) > 0):?>
			<div class="bx-searchtitle-history">
				<?=GetMessage("CT_BST_SEARCH_HISTORY")?>
				<?foreach($arResult["SEARCH_HISTORY"] as $k=>$v):
					if($k > 0) echo ', ';?><a href="<?=$arParams["PAGE"]?>?q=<?=$v?>"><?=$v?></a><?
				endforeach?>
			</div>
		<?endif;?>
	<?$frame->end();?>
</div>
<?endif?>

<script>
	BX.ready(function(){
		new JCTitleSearchAG({
			// 'AJAX_PAGE' : '/your-path/fast_search.php',
			'AJAX_PAGE' : '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
			'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
			'INPUT_ID': '<?echo $INPUT_ID?>',
			'PRELODER_ID': '<?echo $PRELOADER_ID?>',
			'CLEAR_ID': '<?echo $CLEAR_ID?>',
			'VOICE_ID': '<?=($arParams['VOICE_INPUT'] == 'Y') ? $VOICE_ID : ''?>',
			'POPUP_HISTORY': '<?=($arParams['SHOW_HISTORY'] == 'Y') ? $arParams['SHOW_HISTORY_POPUP'] : 'N'?>',
			'POPUP_HISTORY_TITLE': '<?=GetMessage("CT_BST_SEARCH_HISTORY")?>',
			'PAGE': '<?=$arParams["PAGE"]?>',
			'MIN_QUERY_LEN': 2
		});
		
		<?if(count($arResult["HINTS"])):?>
			new Typed('#<?echo $INPUT_ID?>', {
				strings: <?=CUtil::PhpToJSObject($arResult["HINTS"]);?>,
				typeSpeed: <?=$arParams["ANIMATE_HINTS_SPEED"]*20?>,
				backSpeed: <?=$arParams["ANIMATE_HINTS_SPEED"]*10?>,
				backDelay: 500,
				startDelay: 1000,
				// smartBackspace: true,
				bindInputFocusEvents: true,
				attr: 'placeholder',
				loop: true
			});
		<?endif;?>
	});
</script>

<?if($arResult["VISUAL_PARAMS"]["THEME_COLOR"]):?>
	<style>
		.bx-searchtitle .bx-input-group .bx-form-control, .bx_smart_searche .bx_item_block.all_result .all_result_button, .bx-searchtitle .bx-input-group-btn button, .bx_smart_searche .bx_item_block_hrline {
			border-color: <?=$arResult["VISUAL_PARAMS"]["THEME_COLOR"]?> !important;
		}
		.bx_smart_searche .bx_item_block.all_result .all_result_button, .bx-searchtitle .bx-input-group-btn button {
			background-color: <?=$arResult["VISUAL_PARAMS"]["THEME_COLOR"]?>  !important;
		}
		.bx_smart_searche .bx_item_block_href_category_name, .bx_smart_searche .bx_item_block_item_name b, .bx_smart_searche .bx_item_block_item_simple_name b {
			color: <?=$arResult["VISUAL_PARAMS"]["THEME_COLOR"]?>  !important;
		}
	</style>
<?endif;?>