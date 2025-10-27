<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}
//clog($arResult["CACHED_TPL"]);
?>
<script type="importmap">
    {
      "imports": {
        "/local/lib/js/config/main.js": "/local/lib/js/config/main.js?v=0.0.2",
        "/local/lib/js/config/CHtmlModifier.js": "/local/lib/js/config/CHtmlModifier.js?v=0.0.3",
        "/local/lib/js/config/CFormDataCollector.js": "/local/lib/js/config/CFormDataCollector.js?v=0.0.1"
      }
    }
</script>
<script type="module">
        import CMain from "/local/lib/js/config/main.js";
        CMain.Init(<?= json_encode($arResult["CACHED_TPL"]);?>);
    </script>