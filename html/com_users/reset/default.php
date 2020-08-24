<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
$doc    =    JFactory::getDocument();
$doc->addStyleSheet('templates/gigacms/css/login.css');
?>
<div class="login-wrapper <?php echo $this->pageclass_sfx; ?>">
	<div class="login-form pmd-card card-default pmd-z-depth " >
		<div class="reset<?php echo $this->pageclass_sfx; ?>">
			<?php if ($this->params->get('show_page_heading')) : ?>
				<div class="page-header">
					<h1>
						<?php echo $this->escape($this->params->get('page_heading')); ?>
					</h1>
				</div>
			<?php endif; ?>
			<form id="user-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=reset.request'); ?>" method="post" class="form-validate form-horizontal ">
				<div class="login-main pmd-card-body">
					<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
						<fieldset>
							<p> <?php echo JText::_($fieldset->label); ?></p>
							<?php foreach ($this->form->getFieldset($fieldset->name) as $name => $field) : ?>
								<?php if ($field->hidden === false) : ?>
									<div class="form-group pmd-textfield pmd-textfield-floating-label">
									<?php if ($field->name == "jform[email]") {
										echo '<label  class="control-label pmd-input-group-label"> <b>'. JText::_('COM_USERS_FIELD_PASSWORD_RESET_LABEL').'</b><span class="star">&nbsp;*</span>'.'</label> ';
									    	echo '<div class="input-group">
						                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">email</i></div>';
						                   
									    	echo $field->input .' <span class="pmd-textfield-focused"></span> </div>';
									} ?>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</fieldset>
					<?php endforeach; ?>
				</div>
				<div class="pmd-card-footer">
					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn pmd-ripple-effect btn-primary btn-block validate">
								<?php echo JText::_('JSUBMIT'); ?>
							</button>
						</div>
					</div>					
					<?php echo JHtml::_('form.token'); ?>
				</div>
			</form>
			
		</div>
	</div>
</div>
