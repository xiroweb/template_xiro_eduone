<?php
/**
 * @package     XiroWeb
 * @subpackage  Templates.XiroWeb
 *
 * @copyright   Copyright (C) 2020 XiroWeb -, Inc. All rights reserved.
 */

defined('_JEXEC') or die;


$this->setGenerator(null);

$this->setHtml5(true);

$app = JFactory::getApplication();

JHtml::_('bootstrap.framework');
JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

JHtml::_('stylesheet', 'bootstrap.min.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'template.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'custom.css', array('version' => 'auto', 'relative' => true));


JHtml::_('script', 'footer.js', array('version' => 'auto', 'relative' => true), array('defer' => 'defer'));

$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');											  

$sidebarLeft = $this->countModules('sidebarLeft');
$sidebarRight = $this->countModules('sidebarRight');

if ($sidebarRight && $sidebarLeft)
{
	$change_width_col_left_or_right = 'col-xs-12 col-sm-6 col-md-6';
}
elseif ($sidebarRight && !$sidebarLeft)
{
	$change_width_col_left_or_right = ' col-xs-12 col-sm-9 col-md-9';
}
elseif (!$sidebarRight && $sidebarLeft)
{
	$change_width_col_left_or_right = ' col-xs-12 col-sm-9 col-md-9';
}
else
{
	$change_width_col_left_or_right = 'col-xs-12';
}
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<?php if ($app->input->getString('view') == 'category')  {?>
		<?php if ($this->countModules('head_code_cat')):  ?>
			<jdoc:include type="modules" name="head_code_cat" style="none" /> 
		<?php endif; //if ($this->countModules('head_code_cat')):  ?>
	<?php } ?>
		<?php if ($this->countModules('head_code_all')):  ?>
	<jdoc:include type="modules" name="head_code_all" style="none" />
		<?php endif; //if ($this->countModules('head_code_all')):  ?>
</head>
<body class="body_class  <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($this->direction === 'rtl' ? ' rtl' : '');
?>">
	<?php if ($this->countModules('code_after_body')):  ?>
		<jdoc:include type="modules" name="code_after_body" style="none" />
	<?php endif; // if ($this->countModules('code_after_body'))  ?>
	<div class="body" id="top">
		<?php if ($this->countModules('module-menu-admin')): // for show admin menu sidebar ?>
			<div class="giga-header__menu-admin">
				<jdoc:include type="modules" name="module-menu-admin" style="none" />	
			</div>
		<?php endif; // end if ($this->countModules('module-menu-admin')) ?>
			<header class="giga-header">
				<?php if ($this->countModules('header__topbar')):?>
					<jdoc:include type="modules" name="header__topbar" style="xhtml" />	
				<?php endif; // end if ($this->countModules('header__topbar')) ?>
				<div class="giga-header__main">
					<div class="container">
						<div class="row">
							<div class="col xs-12 col-md-6">				
								<div class="giga-header__main__logo">
									<a class="brand" href="<?php echo $this->baseurl; ?>/">
										<jdoc:include type="modules" name="logo" style="none" />
									</a>
								</div>
							</div>
							<div class="col xs-12 col-md-6 hidden-xs hidden-sm">				
								<div class="giga-header__info">
									<jdoc:include type="modules" name="header_info" style="none" />
								</div>
							</div>

						</div>
					</div>
					<div class="giga-header__main__nav">
						<?php if ($this->countModules('mainmenu')) : ?>
							<jdoc:include type="modules" name="mainmenu" style="none" />
						<?php endif; ?>
					</div>
				</div>
			</header>
				<?php if ($this->countModules('module-main-top')):?>
						<jdoc:include type="modules" name="module-main-top" style="xhtml" />
				<?php endif; //endif ($this->countModules('module-main-top')) ?>

			<div class="giga-main">
				<div class="container">
					<div class="warp">	   
						<div class="row">
							<?php if ($sidebarLeft) : ?>
								<!-- Begin Sidebar -->
								<div class=" col-xs-12 col-sm-3 col-md-3">
									<div class="giga-main_sidebarleft">
										<jdoc:include type="modules" name="sidebarLeft" style="xhtml" />
									</div>
								</div>
								<!-- End Sidebar -->
							<?php endif; // end if ($sidebarLeft) ?>
							<!-- Begin Content -->
							<main  class="<?php echo $change_width_col_left_or_right; ?> ">
								<div class="giga-main__content">	
								<?php if ($app->input->getInt('Itemid','0') != '101') : ?>
									<div class="giga-breadcrumbs">
										<jdoc:include type="modules" name="breadcrumbs" style="xhtml" />
									</div>
								<?php endif; //if ($app->input->getInt('Itemid','0') == '101') : ?>

									<?php if ($this->countModules('module-main-content-top')):?>
									<div class="giga-main__content__top">
										<jdoc:include type="modules" name="module-main-content-top" style="xhtml" />
									</div>
									<?php endif; // endif ($this->countModules('module-main-content-top')) ?>
									<div class="giga-main__content__main">												
										<?php // __ COMPONENT __ COMPONENT __ COMPONENT  ?>
										<jdoc:include type="message" />		
										<?php if ($this->countModules('module-content-top')):?>
											<div class="module-content-top">
												<jdoc:include type="modules" name="module-content-top" style="xhtml" />
											</div>
										<?php endif; // if ($this->countModules('module-content-top')) ?>				
										<jdoc:include type="component" />
										<?php if ($this->countModules('module-content-bottom')):?>
											<div class="module-content-bottom">
												<jdoc:include type="modules" name="module-content-bottom" style="xhtml" />
											</div>
										<?php endif; // if ($this->countModules('module-content-top')) ?>	
											<?php // for show admin menu sidebar
											 if ($this->countModules('module-menu-admin')):?>
											<div class="pmd-sidebar-overlay"></div>
											<?php endif; // endif if ($this->countModules('module-menu-admin')) ?>
									</div>
									<?php if ($this->countModules('module-main-content-bottom')):?>
									<div class="giga-main__content__bottom">
										<jdoc:include type="modules" name="module-main-content-bottom" style="xhtml" />
									</div>
									<?php endif; // if ($this->countModules('module-main-content-bottom')) ?>	
								</div>
							</main>
							<!-- End Content -->
							<?php if ($sidebarRight) : ?>
								<!-- Begin Sidebar -->
								<div class="col-xs-12 col-sm-3 col-md-3">
									<div class="giga-main__sidebarright">
										<jdoc:include type="modules" name="sidebarRight" style="xhtml" />
									</div>						
								</div>
								<!-- End Sidebar -->
							<?php endif; // end if ($sidebarRight) ?>		
						</div>		
					</div>		
				</div>
			</div>
			<?php if ($this->countModules('module-main-bottom')):?>			
				<jdoc:include type="modules" name="module-main-bottom" style="xhtml" />
			<?php endif; // end if ($this->countModules('module-email')) ?>
			<footer class="giga-footer">
				<div class="container">
					<div class="row">
						<?php if ($this->countModules('module-footer-top')):?>
							<div class="col-xs-12">
								<div class="giga-footer__top">
									<jdoc:include type="modules" name="module-footer-top" style="xhtml" />
								</div>
							</div>
						<?php endif; // end if ($this->countModules('module-footer-top')) ?>
						<?php if ($this->countModules('module-footer-a')):?>
							<div class="col-xs-12 col-sm-12 col-md-4 ">
								<div class="giga-footer__a">
									<jdoc:include type="modules" name="module-footer-a" style="xhtml" />
								</div>
							</div>
						<?php endif; // end if ($this->countModules('module-footer-a')) ?>
						<?php if ($this->countModules('module-footer-b')):?>
							<div class="col-xs-6 col-md-4 ">
								<div class="giga-footer__b">
									<jdoc:include type="modules" name="module-footer-b" style="xhtml" />
								</div>
							</div>
						<?php endif; // end if ($this->countModules('module-footer-b')) ?>
						<?php if ($this->countModules('module-footer-c')):?>
							<div class="col-xs-6 col-sm-4 col-md-4 ">
								<div class="giga-footer__c">
									<jdoc:include type="modules" name="module-footer-c" style="xhtml" />
								</div>
							</div>
						<?php endif; // if ($this->countModules('module-footer-c')) ?>
						
					</div>
					<?php if ($this->countModules('module-footer-copyright')):?>
						<div class="col-xs-12 ">
							<div class="giga-footer__copyright">
								<jdoc:include type="modules" name="module-footer-copyright" style="xhtml" />
							</div>
						</div>
					<?php endif; // if ($this->countModules('module-footer-copyright')) ?>
				</div>
			</footer>
	</div>
	<div id="back-to-top" data-spy="affix" data-offset-top="300" class="back-to-top hidden-xs hidden-sm affix">
		<button class="btn btn-primary"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></button>
	</div>
	<div id="zalo-contact" data-spy="affix" data-offset-top="0" class="back-to-top affix hover-pmd-z-depth-2 pmd-z-depth">
		<a  href="https://zalo.me/0909770040"><img width="46" height="46" src="images/zalo.png"></a></button>
	</div>
	<div id="call-contact" data-spy="affix" data-offset-top="0" class="back-to-top affix  hover-pmd-z-depth-2 pmd-z-depth">
		<a  href="tel:0909770040"><img width="46" height="46" src="images/call-contact.png"></a></button>
	</div>
	<jdoc:include type="modules" name="debug" style="none" />

</body>
</html>
