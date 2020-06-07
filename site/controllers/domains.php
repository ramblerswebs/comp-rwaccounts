<?php
/**
 * @version    CVS: 0.0.2
 * @package    Com_Rw_accounts
 * @author     webmaster@ramblers-webs.org.uk <webmaster@ramblers-webs.org.uk>
 * @copyright  2020 webmaster@ramblers-webs.org.uk
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Domains list controller class.
 *
 * @since  1.6
 */
class Rw_accountsControllerDomains extends Rw_accountsController
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional
	 * @param   array   $config  Configuration array for model. Optional
	 *
	 * @return object	The model
	 *
	 * @since	1.6
	 */
	public function &getModel($name = 'Domains', $prefix = 'Rw_accountsModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}
