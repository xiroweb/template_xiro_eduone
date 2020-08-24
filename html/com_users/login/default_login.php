<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');

$doc    =    JFactory::getDocument();
$doc->addStyleSheet('templates/gigacms/css/login.css');
$doc->addStyleSheet('http://propeller.in/components/checkbox/css/checkbox.css');
//$doc->addScript('http://propeller.in/components/checkbox/js/checkbox.js');


?>
<div class="login-wrapper <?php echo $this->pageclass_sfx; ?>">
	<div class="login-form pmd-card card-default pmd-z-depth " >
			<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="form-validate form-horizontal ">
					<div class="login-title pmd-card-title card-header-border text-center">
						<div class="loginlogo">
						<?php if ($this->params->get('show_page_heading')) : ?>
							<div class="page-header">
								<h1>
									<?php echo $this->escape($this->params->get('page_heading')); ?>
								</h1>
							</div>
						<?php endif; ?>
						<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
							<div class="login-description">
						<?php endif; ?>
						<?php if ($this->params->get('logindescription_show') == 1) : ?>
							<?php echo $this->params->get('login_description'); ?>
						<?php endif; ?>
						<?php if ($this->params->get('login_image') != '') : ?>
							<img src="<?php echo $this->escape($this->params->get('login_image')); ?>" class="login-image" alt="<?php echo JText::_('COM_USERS_LOGIN_IMAGE_ALT'); ?>" />
						<?php endif; ?>
						<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
							</div>
						<?php endif; ?>
						</div>
					</div>
					<div class="login-main pmd-card-body">
						<?php foreach ($this->form->getFieldset('credentials') as $field) : ?>
							<?php if (!$field->hidden) : ?>						
								<div class="form-group pmd-textfield pmd-textfield-floating-label">
								    <?php
								    switch ($field->name) {
									    case 'username':
									    	echo '<label  class="control-label pmd-input-group-label">'. JText::_('COM_USERS_LOGIN_USERNAME_LABEL').'</label> ';
									    	echo '<div class="input-group"><div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>';
						                   // echo '<input type="text" name="username" id="username"  value="" class="validate-username required form-control" size="25" required aria-required="true" autofocus />';
									    	echo $field->input .' <span class="pmd-textfield-focused"></span> </div>';
									        break;
									    case 'password':
									    	//var_dump($field->input);
									       	echo '<label  class="control-label pmd-input-group-label">'. JText::_('JGLOBAL_PASSWORD').'</label>';
									       	echo '<div class="input-group">
						                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>';
						                    // echo '<input type="password" name="password" id="password" value=""   class="validate-password required form-control"   size="25" maxlength="99" required aria-required="true"  />';
						                    echo $field->input;
									    	echo '<span class="pmd-textfield-focused"></span></div>';
									        break;
									    default:
									        echo '<div class="control-group"><div class="control-label">';
											echo $field->label;
											echo '</div><div class="controls">';
											echo $field->input;
											echo '</div></div>';
									}	
								      ?>		
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php if ($this->tfa) : ?>
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getField('secretkey')->label; ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getField('secretkey')->input; ?>
								</div>
							</div>
						<?php endif; ?>
						
						<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
							<div class="checkbox ">
								<label class="pmd-checkbox pmd-checkbox-ripple-effect">
									<input id="remember" type="checkbox" name="remember" class="inputbox pm-ini" value="yes" />
									<span class="pmd-checkbox-label"><?php echo JText::_('COM_USERS_LOGIN_REMEMBER_ME'); ?></span>
								</label>
							</div>
						<?php endif; ?>
					</div>
					<div class="pmd-card-footer">
						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn pmd-ripple-effect btn-primary btn-block">
									<?php echo JText::_('JLOGIN'); ?>
								</button>
							</div>
						</div>
						<?php $return = $this->form->getValue('return', '', $this->params->get('login_redirect_url', $this->params->get('login_redirect_menuitem'))); ?>
						<input type="hidden" name="return" value="<?php echo base64_encode($return); ?>" />
						<?php echo JHtml::_('form.token'); ?>

					</div>
					<ul class="login-ul">
						<li>
							<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
								<?php echo JText::_('COM_USERS_LOGIN_RESET'); ?>
							</a>
						</li>
						<li>
							<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
								<?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?>
							</a>
						</li>
						<?php $usersConfig = JComponentHelper::getParams('com_users'); ?>
						<?php if ($usersConfig->get('allowUserRegistration')) : ?>
							<li>
								<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
									<?php echo JText::_('COM_USERS_LOGIN_REGISTER'); ?>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				
			</form>

	</div>
	
</div>
