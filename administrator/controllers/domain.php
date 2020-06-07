<?php
/**
 * @version    CVS: 0.0.2
 * @package    Com_Rw_accounts
 * @author     webmaster@ramblers-webs.org.uk <webmaster@ramblers-webs.org.uk>
 * @copyright  2020 webmaster@ramblers-webs.org.uk
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Domain controller class.
 *
 * @since  1.6
 */
class Rw_accountsControllerDomain extends \Joomla\CMS\MVC\Controller\FormController
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'domains';
		parent::__construct();
	}
}
