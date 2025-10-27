<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

\CJSCore::Init(['ajax']);

use Bitrix\Main\Loader;

/**
 * @var array $templateData
 * @var array $arParams
 * @var string $templateFolder
 * @global CMain $APPLICATION
 */

global $APPLICATION;

?>
    <script>
        (function() {
            const ajaxUrl = '<?= CUtil::JSEscape($templateFolder) ?>/ajax.php';
            const productId = <?= (int)$arResult['ID'] ?>;

            const ratingContainer = document.querySelector('.rating[data-product-id="<?= (int)$arResult['ID'] ?>"]');
            if (!ratingContainer) return;

            const stars = ratingContainer.querySelectorAll('.star');
            const ratingValueElement = ratingContainer.querySelector('.js-rating-value');
            const ratingCountElement = ratingContainer.querySelector('.js-rating-count');

            const ratingValueId = document.getElementById('ratingValue');
            const ratingCount = document.getElementById('ratingCount');

            const messageElement = ratingContainer.querySelector('.js-rating-message');

            renderRating(parseFloat(ratingContainer.dataset.initialValue || '5'), parseInt(ratingContainer.dataset.initialCount || '0'));

            BX.ajax({
                url: ajaxUrl,
                method: 'POST',
                dataType: 'json',
                data: {
                    action: 'getRating',
                    productId
                },
                onsuccess: res => {
                    if (res?.success) {
                        renderRating(parseFloat(res.avg_rating), parseInt(res.cnt));
                    }
                }
            });

            if (hasVoted(productId)) {
                disableStars();
            }

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    if (hasVoted(productId) || this.classList.contains('disabled')) return;

                    BX.ajax({
                        url: ajaxUrl,
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            sessid: '<?= bitrix_sessid() ?>',
                            action: 'rate',
                            productId,
                            rating: parseInt(this.dataset.value)
                        },
                        onsuccess: res => {
                            messageElement.textContent = res.success ? 'Ваш голос учтён!' : res.error || 'Ошибка при голосовании';
                            messageElement.classList.toggle('success', res.success);
                            messageElement.classList.toggle('error', !res.success);

                            if (res.success) {
                                renderRating(
                                    res.avg_rating !== undefined ? parseFloat(res.avg_rating) : parseFloat(ratingContainer.dataset.initialValue || '5'),
                                    res.cnt !== undefined ? parseInt(res.cnt) : parseInt(ratingContainer.dataset.initialCount || '0')
                                );
                                disableStars();
                                document.cookie = `rated_${productId}=1; path=/; max-age=31536000`;
                            }
                        },
                        onfailure: () => {
                            messageElement.textContent = 'Ошибка сети';
                            messageElement.classList.remove('success');
                            messageElement.classList.add('error');
                        }
                    });
                });
            });

            function renderRating(average, count) {
                stars.forEach(star => {
                    star.classList.toggle('filled', parseInt(star.dataset.value) <= Math.round(average));
                });

                if (ratingValueElement) {
                    ratingValueElement.textContent = `${average.toFixed(1)} / 5`;
                    ratingValueId.textContent = `${average.toFixed(1)} / 5`;
                }
                if (ratingCountElement) {
                    ratingCountElement.textContent = `(${count})`;
                    ratingCount.textContent = `${count}`;
                }
            }

            function disableStars() {
                stars.forEach(star => star.classList.add('disabled'));
            }

            function hasVoted(id) {
                return document.cookie.includes(`rated_${id}=1`);
            }
        })();
    </script>
<?

if (!empty($templateData['TEMPLATE_LIBRARY']))
{
	$loadCurrency = false;

	if (!empty($templateData['CURRENCIES']))
	{
		$loadCurrency = Loader::includeModule('currency');
	}

	CJSCore::Init($templateData['TEMPLATE_LIBRARY']);
	if ($loadCurrency)
	{
		?>
		<script>
			BX.Currency.setCurrencies(<?=$templateData['CURRENCIES']?>);
		</script>
		<?php
	}
}

if (isset($templateData['JS_OBJ']))
{
	?>
	<script>
		BX.ready(BX.defer(function(){
			if (!!window.<?=$templateData['JS_OBJ']?>)
			{
				window.<?=$templateData['JS_OBJ']?>.allowViewedCount(true);
			}
		}));
	</script>
	<?php
	// check compared state
	if ($arParams['DISPLAY_COMPARE'])
	{
		$compared = false;
		$comparedIds = array();
		$item = $templateData['ITEM'];

		if (!empty($_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]))
		{
			if (!empty($item['JS_OFFERS']) && is_array($item['JS_OFFERS']))
			{
				foreach ($item['JS_OFFERS'] as $key => $offer)
				{
					if (array_key_exists($offer['ID'], $_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]['ITEMS']))
					{
						if ($key == $item['OFFERS_SELECTED'])
						{
							$compared = true;
						}

						$comparedIds[] = $offer['ID'];
					}
				}
			}
			elseif (array_key_exists($item['ID'], $_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]['ITEMS']))
			{
				$compared = true;
			}
		}

		if ($templateData['JS_OBJ'])
		{
			?>
			<script>
				BX.ready(BX.defer(function(){
					if (!!window.<?=$templateData['JS_OBJ']?>)
					{
						window.<?=$templateData['JS_OBJ']?>.setCompared('<?=$compared?>');

						<?php
						if (!empty($comparedIds)):
						?>
						window.<?=$templateData['JS_OBJ']?>.setCompareInfo(<?=CUtil::PhpToJSObject($comparedIds, false, true)?>);
						<?php
						endif;
						?>
					}
				}));
			</script>
			<?php
		}
	}

	// select target offer
	$request = Bitrix\Main\Application::getInstance()->getContext()->getRequest();
	$offerNum = false;
	$offerId = (int)$this->request->get('OFFER_ID');
	$offerCode = $this->request->get('OFFER_CODE');

	if ($offerId > 0 && !empty($templateData['OFFER_IDS']) && is_array($templateData['OFFER_IDS']))
	{
		$offerNum = array_search($offerId, $templateData['OFFER_IDS']);
	}
	elseif (!empty($offerCode) && !empty($templateData['OFFER_CODES']) && is_array($templateData['OFFER_CODES']))
	{
		$offerNum = array_search($offerCode, $templateData['OFFER_CODES']);
	}

	if (!empty($offerNum))
	{
		?>
		<script>
			BX.ready(function(){
				if (!!window.<?=$templateData['JS_OBJ']?>)
				{
					window.<?=$templateData['JS_OBJ']?>.setOffer(<?=$offerNum?>);
				}
			});
		</script>
		<?php
	}
}
