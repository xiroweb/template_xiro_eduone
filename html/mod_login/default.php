<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::register('UsersHelperRoute', JPATH_SITE . '/components/com_users/helpers/route.php');

JHtml::_('behavior.keepalive');
JHtml::_('bootstrap.tooltip');
$doc    =    JFactory::getDocument();
$doc->addStyleSheet('templates/gigacms/css/login.css');
$doc->addStyleSheet('http://propeller.in/components/checkbox/css/checkbox.css');

?>
<div class="login-wrapper">
	
	<div class="login-form pmd-card card-default pmd-z-depth " >
		<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form" class="form-inline">
			<?php if ($params->get('pretext')) : ?>
				 <div class="pmd-card-title card-header-border text-center">		
					<h3 ><?php echo $params->get('pretext'); ?></h3 >
				</div>
			<?php endif; ?>
			<div class="pmd-card-body">				
						<?php if (!$params->get('usetext')) : ?>							
							<div class="form-group pmd-textfield pmd-textfield-floating-label">			
								<span class="icon-user hasTooltip" title="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME'); ?>"></span>
									<label for="modlgn-username" class="control-label pmd-input-group-label element-invisible"><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME'); ?></label>
								<div class="input-group">
									<div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>									
									<input id="modlgn-username" type="text" name="username" class="input-small form-control" tabindex="0" size="18" />
								</div>
							</div>							
						<?php else : ?>
							<div class="form-group pmd-textfield md-textfield-floating-label">		
								<label class="control-label pmd-input-group-label" for="modlgn-username"><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME'); ?></label>
								<div class="input-group">
									<div class="input-group-addon"><i class="material-icons md-dark pmd-sm">https</i></div>									
									<input id="modlgn-username" type="text" name="username" class="input-small form-control" tabindex="0" size="18" />
								</div>
							</div>		
						<?php endif; ?>				
						<?php if (!$params->get('usetext')) : ?>
							<div class="form-group pmd-textfield pmd-textfield-floating-label">							
								<span class="icon-lock hasTooltip" title="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>">
									</span>
								<label for="modlgn-passwd" class="control-label pmd-input-group-label element-invisible"><?php echo JText::_('JGLOBAL_PASSWORD'); ?>
									</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="material-icons md-dark pmd-sm">https</i></div>	
									<input id="modlgn-passwd" type="password" name="password" class="form-control input-small" tabindex="0" size="18" />
								</div>
							</div>							
						<?php else : ?>
							<div class="form-group pmd-textfield pmd-textfield-floating-label">							
								
								<label for="modlgn-passwd" class="control-label pmd-input-group-label element-invisible"><?php echo JText::_('JGLOBAL_PASSWORD'); ?>
									</label>
								<div class="input-group">
									<div class="input-group-addon"><i class="material-icons md-dark pmd-sm">https</i></div>	
									<input id="modlgn-passwd" type="password" name="password" class="form-control input-small" tabindex="0" size="18" />
								</div>
							</div>
						<?php endif; ?>
				<?php if (count($twofactormethods) > 1) : ?>
				<div id="form-login-secretkey" class="control-group">
					<div class="controls">
						<?php if (!$params->get('usetext')) : ?>
							<div class="input-prepend input-append">
								<span class="add-on">
									<span class="icon-star hasTooltip" title="<?php echo JText::_('JGLOBAL_SECRETKEY'); ?>">
									</span>
										<label for="modlgn-secretkey" class="element-invisible"><?php echo JText::_('JGLOBAL_SECRETKEY'); ?>
									</label>
								</span>
								<input id="modlgn-secretkey" autocomplete="off" type="text" name="secretkey" class="input-small" tabindex="0" size="18" placeholder="<?php echo JText::_('JGLOBAL_SECRETKEY'); ?>" />
								<span class="btn width-auto hasTooltip" title="<?php echo JText::_('JGLOBAL_SECRETKEY_HELP'); ?>">
									<span class="icon-help"></span>
								</span>
						</div>
						<?php else : ?>
							<label for="modlgn-secretkey"><?php echo JText::_('JGLOBAL_SECRETKEY'); ?></label>
							<input id="modlgn-secretkey" autocomplete="off" type="text" name="secretkey" class="input-small" tabindex="0" size="18" placeholder="<?php echo JText::_('JGLOBAL_SECRETKEY'); ?>" />
							<span class="btn width-auto hasTooltip" title="<?php echo JText::_('JGLOBAL_SECRETKEY_HELP'); ?>">
								<span class="icon-help"></span>
							</span>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
				<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
				<div id="form-login-remember" class="control-group checkbox">
					<label for="modlgn-remember" class="pmd-checkbox pmd-checkbox-ripple-effect control-label">
						<span><?php echo JText::_('MOD_LOGIN_REMEMBER_ME'); ?></span>
						<input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes"/>
					</label> 
				</div>
				<?php endif; ?>
			</div>
			<div class="pmd-card-footer">
				<div id="form-login-submit" class="control-group">
					<div class="controls">
						<button type="submit" tabindex="0" name="Submit" class="btn pmd-ripple-effect btn-primary btn-block"><?php echo JText::_('JLOGIN'); ?></button>
					</div>
				</div>				
			</div>
			<?php
					$usersConfig = JComponentHelper::getParams('com_users'); ?>
					<ul class="login-ul">
					<?php if ($usersConfig->get('allowUserRegistration')) : ?>
						<li>
							<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
							<?php echo JText::_('MOD_LOGIN_REGISTER'); ?> <span class="icon-arrow-right"></span></a>
						</li>
					<?php endif; ?>
						<li>
							<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
							<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?></a>
						</li>
						<li>
							<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
							<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?></a>
						</li>
					</ul>
				<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="user.login" />
				<input type="hidden" name="return" value="<?php echo $return; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			<?php if ($params->get('posttext')) : ?>
				<div class="posttext">
					<p><?php echo $params->get('posttext'); ?></p>
				</div>
			<?php endif; ?>
		</form>
	</div>
	
</div>