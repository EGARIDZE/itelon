<?
function process_form_data($data) {
	// Обработка данных формы
	if (empty($data['sorting'])) {
		return false;
	}
	return $data['sorting'];
}

function set_cookie($name, $value, $expire = 0) {
	// Установка куки
	setcookie($name, $value, $expire, '/', '', false, true);
}

// Обработка данных формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$sorting = process_form_data($_POST);
	if ($sorting !== false) {
		set_cookie('sorting', $sorting);
	}
}