<?php
/**
 * Venustheme
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Venustheme.com license that is
 * available through the world-wide-web at this URL:
 * http://www.venustheme.com/license-agreement.html
 * 
 * DISCLAIMER
 * 
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 * 
 * @category   Venustheme
 * @package    Ves_Trackorder
 * @copyright  Copyright (c) 2014 Venustheme (http://www.venustheme.com/)
 * @license    http://www.venustheme.com/LICENSE-1.0.html
 */

namespace Ves\Trackorder\Block\Widget;

use Ves\Trackorder\Block\Trackorder;

class Trackwidget extends Trackorder
{
	public function _prepareLayout($attributes = array())
	{   
		$show_widget = $this->getDataFilterHelper()->getConfig("trackorder_general/show_widget");
		if(!$show_widget) {
			return parent::_prepareLayout($attributes);
		}
		$this->setTemplate("widget/link.phtml");
		return parent::_prepareLayout($attributes);
	}
}
