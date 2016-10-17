<?php
/**
 * @version     2.0.2
 * @package     com_cot_forms
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Sylvie Fiat <sylvie.fiat@ird.fr>
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Oi admins list controller class.
 */
class Cot_formsControllerOi_admins extends Cot_formsController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Oi_admins', $prefix = 'Cot_formsModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

	public function export()
	{
		header("Content-type: text/csv");
		header("Content-Disposition: attachment; filename=VFD_OtherInvertebrates.csv");
		header("Pragma: no-cache");
		header("Expires: 0");
		$this->getModel()->getCsv();
		jexit();
	}
}
