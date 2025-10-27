<?php
/**
 * @param mixed ...$vars
 * @return void
 */
if (!function_exists('clog')) {
	function clog(...$vars) :void{
		foreach ($vars as $var) {
			$what = ( is_array($var) || is_object($var) ) ? json_encode( $var, JSON_PARTIAL_OUTPUT_ON_ERROR ) : '"'.$var.'"';
			if (json_last_error_msg()) {
				?><script type='text/javascript'>console.log('<?=json_last_error_msg()?>');</script><?
			} // Print out the error if any
			?><script type='text/javascript'>console.log(<?=$what?>);</script><?
		}
	}
}

?>