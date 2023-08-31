<?php
/**
 * @version    CVS: 1.0.1
 * @package    Com_Rw_accounts
 * @author     webmaster@ramblers-webs.org.uk <webmaster@ramblers-webs.org.uk>
 * @copyright  2023 webmaster@ramblers-webs.org.uk
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Router\Route;
use \Joomla\CMS\Language\Text;
use \Rwaccounts\Component\Rw_accounts\Site\Helper\Rw_accountsHelper;

$wa = $this->document->getWebAssetManager();
$wa->useScript('keepalive')
	->useScript('form.validate');
HTMLHelper::_('bootstrap.tooltip');

// Load admin language file
$lang = Factory::getLanguage();
$lang->load('com_rw_accounts', JPATH_SITE);

$user    = Factory::getApplication()->getIdentity();
$canEdit = Rw_accountsHelper::canUserEdit($this->item, $user);


?>

<div class="domain-edit front-end-edit">
	<?php if (!$canEdit) : ?>
		<h3>
		<?php throw new \Exception(Text::_('COM_RW_ACCOUNTS_ERROR_MESSAGE_NOT_AUTHORISED'), 403); ?>
		</h3>
	<?php else : ?>
		<?php if (!empty($this->item->id)): ?>
			<h1><?php echo Text::sprintf('COM_RW_ACCOUNTS_EDIT_ITEM_TITLE', $this->item->id); ?></h1>
		<?php else: ?>
			<h1><?php echo Text::_('COM_RW_ACCOUNTS_ADD_ITEM_TITLE'); ?></h1>
		<?php endif; ?>

		<form id="form-domain"
			  action="<?php echo Route::_('index.php?option=com_rw_accounts&task=domainform.save'); ?>"
			  method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
			
	<input type="hidden" name="jform[id]" value="<?php echo isset($this->item->id) ? $this->item->id : ''; ?>" />

	<input type="hidden" name="jform[ordering]" value="<?php echo isset($this->item->ordering) ? $this->item->ordering : ''; ?>" />

	<input type="hidden" name="jform[state]" value="<?php echo isset($this->item->state) ? $this->item->state : ''; ?>" />

	<input type="hidden" name="jform[checked_out]" value="<?php echo isset($this->item->checked_out) ? $this->item->checked_out : ''; ?>" />

	<input type="hidden" name="jform[checked_out_time]" value="<?php echo isset($this->item->checked_out_time) ? $this->item->checked_out_time : ''; ?>" />

	<?php echo $this->form->renderField('created_by'); ?>

	<?php echo $this->form->renderField('modified_by'); ?>

	<?php echo HTMLHelper::_('uitab.startTabSet', 'myTab', array('active' => 'domain')); ?>
	<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'domain', Text::_('COM_RW_ACCOUNTS_TAB_DOMAIN', true)); ?>
	<?php echo $this->form->renderField('code'); ?>

	<?php echo $this->form->renderField('areaname'); ?>

	<?php echo $this->form->renderField('groupname'); ?>

	<?php echo $this->form->renderField('domain'); ?>

	<?php echo $this->form->renderField('status'); ?>

	<?php echo $this->form->renderField('web_master'); ?>

	<?php echo $this->form->renderField('user'); ?>

	<?php echo $this->form->renderField('notes'); ?>

	<?php echo $this->form->renderField('latitude'); ?>

	<?php echo $this->form->renderField('longitude'); ?>

	<?php echo $this->form->renderField('created'); ?>

	<?php echo $this->form->renderField('modified'); ?>

	<?php echo HTMLHelper::_('uitab.endTab'); ?>
			<div class="control-group">
				<div class="controls">

					<?php if ($this->canSave): ?>
						<button type="submit" class="validate btn btn-primary">
							<span class="fas fa-check" aria-hidden="true"></span>
							<?php echo Text::_('JSUBMIT'); ?>
						</button>
					<?php endif; ?>
					<a class="btn btn-danger"
					   href="<?php echo Route::_('index.php?option=com_rw_accounts&task=domainform.cancel'); ?>"
					   title="<?php echo Text::_('JCANCEL'); ?>">
					   <span class="fas fa-times" aria-hidden="true"></span>
						<?php echo Text::_('JCANCEL'); ?>
					</a>
				</div>
			</div>

			<input type="hidden" name="option" value="com_rw_accounts"/>
			<input type="hidden" name="task"
				   value="domainform.save"/>
			<?php echo HTMLHelper::_('form.token'); ?>
		</form>
	<?php endif; ?>
</div>
