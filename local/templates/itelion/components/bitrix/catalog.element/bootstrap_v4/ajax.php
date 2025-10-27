<?php
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

use Bitrix\Main\Application;
use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Main\Security\Random;
use Bitrix\Main\Web\Json;

global $USER;
Loader::includeModule('iblock');

$request = Context::getCurrent()->getRequest();
$action = $request->getPost('action');
$productId = (int)$request->getPost('productId');

function sendJson($data) {
    echo Json::encode($data);
    die();
}

if ($action === 'getRating') {
    if ($productId <= 0) {
        sendJson(['success' => false, 'error' => 'bad product']);
    }

    $connection = Application::getConnection();
    $agg = $connection->query("
        SELECT AVG(rating) AS avg_rating, COUNT(*) AS cnt
        FROM product_ratings
        WHERE product_id = {$productId}
    ")->fetch();

    $averageRating = $agg['avg_rating'] !== null ? round((float)$agg['avg_rating'], 1) : 5.0;
    $numberRating  = (int)$agg['cnt'];

    sendJson([
        'success' => true,
        'avg_rating' => $averageRating,
        'cnt' => $numberRating
    ]);
}

if (!check_bitrix_sessid()) {
    sendJson(['success' => false, 'error' => 'Bad sessid']);
}

if ($action === 'rate') {
    $rating = (int)$request->getPost('rating');

    if ($productId <= 0 || $rating < 1 || $rating > 5) {
        sendJson(['success' => false, 'error' => 'Некорректные данные']);
    }

    $uid = (int)$USER->GetID();
    $ua = substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 200);
    $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    $cookie = $_COOKIE['PHPSESSID'] ?? Random::getString(16);

    $voterHash = hash('sha256', $uid ? 'u' . $uid : 'g' . $ip . $ua . $cookie);

    $connection = Application::getConnection();
    $helper = $connection->getSqlHelper();
    $voterHashSql = $helper->forSql($voterHash);

    $sqlCheck = "SELECT 1 FROM product_ratings WHERE product_id = {$productId} AND voter_hash = '{$voterHashSql}' LIMIT 1";

    try {
        $resultProductsRating = $connection->query($sqlCheck);
        if ($resultProductsRating->fetch()) {
            sendJson(['success' => false, 'error' => 'Вы уже голосовали за этот товар']);
        }

        $connection->queryExecute("INSERT INTO product_ratings (product_id, voter_hash, rating) VALUES ({$productId}, '{$voterHashSql}', {$rating})");

        $agg = $connection->query("SELECT AVG(rating) AS avg_rating, COUNT(*) AS cnt FROM product_ratings WHERE product_id = {$productId}")->fetch();

        $averageRating = round((float)$agg['avg_rating'], 1);
        $numberRating  = (int)$agg['cnt'];

        \CIBlockElement::SetPropertyValuesEx($productId, false, [
            'RATING_VALUE' => $averageRating,
            'RATING_COUNT' => $numberRating,
        ]);

        sendJson([
            'success' => true,
            'avg_rating' => $averageRating,
            'cnt' => $numberRating
        ]);

    } catch (\Throwable $e) {
        sendJson(['success' => false, 'SystemError' => 'Ошибка БД']);
    }
}

sendJson(['success' => false, 'error' => 'Unknown action']);
