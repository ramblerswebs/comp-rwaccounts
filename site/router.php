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

use Joomla\CMS\Component\Router\RouterViewConfiguration;
use Joomla\CMS\Component\Router\RouterView;
use Joomla\CMS\Component\Router\Rules\StandardRules;
use Joomla\CMS\Component\Router\Rules\NomenuRules;
use Joomla\CMS\Component\Router\Rules\MenuRules;
use \Joomla\CMS\Factory;

/**
 * Class Rw_accountsRouter
 *
 */
class Rw_accountsRouter extends RouterView
{
	private $noIDs;
	public function __construct($app = null, $menu = null)
	{
		$params = Factory::getApplication()->getParams('com_rw_accounts');
		$this->noIDs = (bool) $params->get('sef_ids');
		
		
		$domains = new RouterViewConfiguration('domains');
		$this->registerView($domains);
		

		parent::__construct($app, $menu);

		$this->attachRule(new MenuRules($this));

		if ($params->get('sef_advanced', 0))
		{
			$this->attachRule(new StandardRules($this));
			$this->attachRule(new NomenuRules($this));
		}
		else
		{
			JLoader::register('Rw_accountsRulesLegacy', __DIR__ . '/helpers/legacyrouter.php');
			JLoader::register('Rw_accountsHelpersRw_accounts', __DIR__ . '/helpers/rw_accounts.php');
			$this->attachRule(new Rw_accountsRulesLegacy($this));
		}
	}


	

	
}
