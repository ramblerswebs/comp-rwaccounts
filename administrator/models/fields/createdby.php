<?php
/**
 * @version    CVS: 0.0.2
 * @package    Com_Rw_accounts
 * @author     webmaster@ramblers-webs.org.uk <webmaster@ramblers-webs.org.uk>
 * @copyright  2020 webmaster@ramblers-webs.org.uk
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

use \Joomla\CMS\Factory;

/**
 * Supports an HTML select list of categories
 *
 * @since  1.6
 */
class JFormFieldCreatedby extends \Joomla\CMS\Form\FormField
{
	/**
	 * The form field type.
	 *
	 * @var        string
	 * @since    1.6
	 */
	protected $type = 'createdby';

	/**
	 * Method to get the field input markup.
	 *
	 * @return    string    The field input markup.
	 *
	 * @since    1.6
	 */
	protected function getInput()
	{
		// Initialize variables.
		$html = array();

		// Load user
		$user_id = $this->value;

		if ($user_id)
		{
			$user = Factory::getUser($user_id);
		}
		else
		{
			$user   = Factory::getUser();
			$html[] = '<input type="hidden" name="' . $this->name . '" value="' . $user->id . '" />';
		}

		if (!$this->hidden)
		{
			$html[] = "<div>" . $user->name . " (" . $user->username . ")</div>";
		}

		return implode($html);
	}
}
