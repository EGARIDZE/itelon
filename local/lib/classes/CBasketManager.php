<?
class CBasketManager
{
	public static function addIbElement($object) :void
	{
		$el = new CIBlockElement;
		$arLoadProductArray = array(
			"IBLOCK_ID" => 40,
			"IBLOCK_SECTION_ID" => 519,
			"NAME" => "Элемент " . date("d.m.Y H:i:s"), // Добавляем уникальное имя
			"XML_ID" => session_id(),
			"ACTIVE" => "Y",
			'PROPERTY_VALUES' => ['BASKET' => self::genHtmlForEmail($object)],
		);

		$elementId = $el->Add($arLoadProductArray);
		echo $elementId;
	}
	public static function updateIbElement($id, $object) :void
	{
		CIBlockElement::SetPropertyValuesEx(
			$id
			, 40
			, [
				'BASKET' => self::genHtmlForEmail($object)
			]
		);
	}
	public static function genHtmlForEmail($json) :string|bool
	{
		if (!empty($json)) {
			$html = '<div>';
			//$data = htmlspecialchars_decode(html_entity_decode($json, ENT_QUOTES), ENT_QUOTES);
			foreach ($json as $item) {
				$html .= '<h4>' . $item['title'] . '</h4>'
					. '<p>тип: ' . $item['type'] . '</p>'
					. '<p>цена: ' . $item['price'] . '</p>'
					. '<p>наличие: ' . $item['delivery'] . '</p>'
					. '<p>гарантия: ' . $item['warranty'] . '</p>'
					. '<p>кол-во: ' . $item['count'] . '</p>'
					. '<p>описание: ' . $item['description'] . '</p>'
					. '<p>-----</p>';
			}
			$html .= '</div>';
		} else {
			$html = false;
		}
		return $html;
	}
}