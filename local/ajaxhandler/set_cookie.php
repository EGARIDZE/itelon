<?
function process_data($data) {
	if (empty($data['hide-banner'])) {
		echo "Empty";
		return false;
	}
	return $data['hide-banner'];
}

function set_cookie($name, $value, $expire = null) {
	// Установка куки
	setcookie($name, $value, $expire, '/', '', false, true);
}

// Обработка данных формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$hideBanner = process_data($_POST);
	if ($hideBanner) {
		set_cookie('hide_banner', $hideBanner);
		echo "done";
	}
}