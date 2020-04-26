<?php
namespace VegAndTheCity\Core\Plugin\Mageplaza\Search\Helper;
use Magento\Catalog\Model\Product as P;
use Magento\Reports\Model\ResourceModel\Product\Collection as C;
use Mageplaza\Search\Helper\Data as Sb;
// 2020-04-26
final class Data {
	/**
	 * 2020-04-26
	 * "The `mgz_pagebuilder` tags should not be shown in the dropdown with a search results":
	 * https://github.com/vegandthecity/magento/issues/25
	 * @see \Mageplaza\Search\Helper\Data::getProducts()
	 * @used-by \Mageplaza\Search\Helper\Data::createJsonFileForStore()
	 * @param Sb $sb
	 * @param C $r
	 * @return C
	 */
	function afterGetProducts(Sb $sb, C $r) {
		foreach ($r as $p) {/** @var P $p */
			$p['short_description'] = self::p($p['short_description']);
		}
		return $r;
	}

	/**
	 * 2020-04-26
	 * @used-by afterGetProducts()
	 * @param string $s
	 * @return string
	 */
	private static function p($s) {
		$key  = 'mgz_pagebuilder';
		$prex = '/\[' . $key . '\](.*?)\[\/' . $key . '\]/si';
		preg_match_all($prex, $s, $matches, PREG_SET_ORDER);
		if ($matches) {
			if ($va = dfa(df_json_decode(df_first($matches)[1]), 'elements')) {
				$s = dfa_r($va, 'content');
			}
		}
		return $s;
	}
}