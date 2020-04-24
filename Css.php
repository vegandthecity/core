<?php
namespace VegAndTheCity\Core;
use Magento\Framework\View\Element\AbstractBlock as _P;
// 2020-04-18 "Category pages show 3 products in a row instead of 4": https://github.com/vegandthecity/core/issues/3
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Css extends _P {
	/**
	 * 2020-04-18
	 * @override
	 * @see _P::_toHtml()
	 * @used-by _P::toHtml():
	 *		$html = $this->_loadCache();
	 *		if ($html === false) {
	 *			if ($this->hasData('translate_inline')) {
	 *				$this->inlineTranslation->suspend($this->getData('translate_inline'));
	 *			}
	 *			$this->_beforeToHtml();
	 *			$html = $this->_toHtml();
	 *			$this->_saveCache($html);
	 *			if ($this->hasData('translate_inline')) {
	 *				$this->inlineTranslation->resume();
	 *			}
	 *		}
	 *		$html = $this->_afterToHtml($html);
	 * https://github.com/magento/magento2/blob/2.2.0/lib/internal/Magento/Framework/View/Element/AbstractBlock.php#L643-L689
	 * @return string
	 */
	final protected function _toHtml() {return df_link_inline(sprintf(
		'VegAndTheCity_Core::%s/custom.css', df_website_code()
	));}
}