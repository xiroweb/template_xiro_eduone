<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg. To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

/*
 * Module chrome for rendering the module in a submenu
 */
function modChrome_no($module, &$params, &$attribs)
{
	if ($module->content)
	{
		echo $module->content;
	}
}

function modChrome_well($module, &$params, &$attribs)
{
	$moduleTag     = $params->get('module_tag', 'div');
	$bootstrapSize = (int) $params->get('bootstrap_size', 0);
	$moduleClass   = $bootstrapSize !== 0 ? ' span' . $bootstrapSize : '';
	$headerTag     = htmlspecialchars($params->get('header_tag', 'h3'), ENT_COMPAT, 'UTF-8');
	$headerClass   = htmlspecialchars($params->get('header_class', 'page-header'), ENT_COMPAT, 'UTF-8');

	if ($module->content)
	{
		echo '<' . $moduleTag . ' class="well ' . htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8') . $moduleClass . '">';

			if ($module->showtitle)
			{
				echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
			}

			echo $module->content;
		echo '</' . $moduleTag . '>';
	}
}

function modChrome_gigaxhtml($module, &$params, &$attribs)
{
	$moduleTag      = htmlspecialchars($params->get('module_tag', 'div'), ENT_QUOTES, 'UTF-8');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize !== 0 ? ' span' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass    = $params->get('header_class');
	$headerClass    = $headerClass ? ' class="' . htmlspecialchars($headerClass, ENT_COMPAT, 'UTF-8') . '"' : '';

	if (!empty ($module->content)) : ?>
		<<?php echo $moduleTag; ?> class="<?php echo htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8') . $moduleClass; ?>">
			<?php if ((bool) $module->showtitle) : ?>
				<<?php echo $headerTag . $headerClass . '>' . $module->title; ?></<?php echo $headerTag; ?>>
			<?php endif; ?>
			<?php echo $module->content; ?>
		</<?php echo $moduleTag; ?>>
	<?php endif;
}
function modChrome_id_containter_row($module, &$params, &$attribs)
{
	/* div.id div.container div.row */
	$moduleTag      = htmlspecialchars($params->get('module_tag', 'div'), ENT_QUOTES, 'UTF-8');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize !== 0 ? ' span' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass    = $params->get('header_class');
	//$headerClass    = $headerClass ? ' class="' . htmlspecialchars($headerClass, ENT_COMPAT, 'UTF-8') . '"' : '';
	$headerClass    = $headerClass ?  htmlspecialchars($headerClass, ENT_COMPAT, 'UTF-8') : '';

	if (!empty ($module->content)) : ?>
		<div class="<?php echo htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8'); ?>">
			<div class="container">
				<div class="warp">
					<?php if ((bool) $module->showtitle) : ?>
						<div class="row">
							<div class="col-xs-12">
								<<?php echo $headerTag  . '>' . $module->title; ?></<?php echo $headerTag; ?>>
							</div>
						</div>
					<?php endif; ?>
					<?php if ($headerClass != '' ) : ?><div class="<?php echo $headerClass; ?>"><?php endif; ?>
					<?php echo $module->content; ?>
					<?php if ($headerClass != '' ) : ?></div><?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif;
}
function modChrome_id_containter($module, &$params, &$attribs)
{
	/* div.id div.container div.row */
	$moduleTag      = htmlspecialchars($params->get('module_tag', 'div'), ENT_QUOTES, 'UTF-8');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize !== 0 ? ' span' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass    = $params->get('header_class');
	//$headerClass    = $headerClass ? ' class="' . htmlspecialchars($headerClass, ENT_COMPAT, 'UTF-8') . '"' : '';
	$headerClass    = $headerClass ?  htmlspecialchars($headerClass, ENT_COMPAT, 'UTF-8') : '';

	if (!empty ($module->content)) : ?>
		<div class="<?php echo htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8'); ?>">
			<div class="container">
				<div class="warp">
						<?php if ((bool) $module->showtitle) : ?>
							<div class="row">
							<div class="col-xs-12">
								<<?php echo $headerTag  . '>' . $module->title; ?></<?php echo $headerTag; ?>>
							</div>
							</div>
						<?php endif; ?>		
					<?php if ($headerClass != '' ) : ?><div class="<?php echo $headerClass; ?>"><?php endif; ?>	
					<?php echo $module->content; ?>
					<?php if ($headerClass != '' ) : ?></div><?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif;
}
function modChrome_id_row($module, &$params, &$attribs)
{
	/* div.id div.container div.row */
	$moduleTag      = htmlspecialchars($params->get('module_tag', 'div'), ENT_QUOTES, 'UTF-8');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize !== 0 ? ' span' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass    = $params->get('header_class');
	//$headerClass    = $headerClass ? ' class="' . htmlspecialchars($headerClass, ENT_COMPAT, 'UTF-8') . '"' : '';
	$headerClass    = $headerClass ?  htmlspecialchars($headerClass, ENT_COMPAT, 'UTF-8') : '';

	if (!empty ($module->content)) : ?>
		<div class="<?php echo htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8'); ?>">
			<div class="row">
				<?php if ((bool) $module->showtitle) : ?>
					<div class="col-xs-12">
						<<?php echo $headerTag . '>' . $module->title; ?></<?php echo $headerTag; ?>>
					</div>
				<?php endif; ?>
				<?php if ($headerClass != '' ) : ?><div class="<?php echo $headerClass; ?>"><?php endif; ?>	
				<?php echo $module->content; ?>
				<?php if ($headerClass != '' ) : ?></div><?php endif; ?>
			</div>
		</div>
	<?php endif;
}
function modChrome_id_containter_row_col($module, &$params, &$attribs)
{
	/* div.id div.container div.row */
	$moduleTag      = htmlspecialchars($params->get('module_tag', 'div'), ENT_QUOTES, 'UTF-8');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize !== 0 ? ' col-xs-' . $bootstrapSize : 'col-xs-12';

	// Temporarily store header class in variable
	$headerClass    = $params->get('header_class');
	// $headerClass    = $headerClass ? ' class="' . htmlspecialchars($headerClass, ENT_COMPAT, 'UTF-8') . '"' : '';
	$headerClass    = $headerClass ?  htmlspecialchars($headerClass, ENT_COMPAT, 'UTF-8') : '';

	if (!empty ($module->content)) : ?>
		<div class="<?php echo htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8'); ?>">
			<div class="container">
				<div class="warp">
					<?php if ((bool) $module->showtitle) : ?>
						<div class="row">
							<div class="col-xs-12">
								<<?php echo $headerTag . '>' . $module->title; ?></<?php echo $headerTag; ?>>
							</div>
						</div>
					<?php endif; ?>
					<div class="<?php echo $moduleClass; ?> <?php echo $headerClass; ?>">
					<?php echo $module->content; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif;
}
function modChrome_id_row_col($module, &$params, &$attribs)
{
	/* div.id div.container div.row */
	$moduleTag      = htmlspecialchars($params->get('module_tag', 'div'), ENT_QUOTES, 'UTF-8');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize !== 0 ? ' col-xs-' . $bootstrapSize : 'col-xs-12';

	// Temporarily store header class in variable
	$headerClass    = $params->get('header_class');
	$headerClass    = $headerClass ? ' class="' . htmlspecialchars($headerClass, ENT_COMPAT, 'UTF-8') . '"' : '';

	if (!empty ($module->content)) : ?>
		<div class="<?php echo htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8'); ?>">
				<div class="row">
					<?php if ((bool) $module->showtitle) : ?>
						<div class="col-xs-12">
							<<?php echo $headerTag . $headerClass . '>' . $module->title; ?></<?php echo $headerTag; ?>>
						</div>
					<?php endif; ?>
					<div class="<?php echo $moduleClass; ?>">
					<?php echo $module->content; ?>
					</div>
				</div>
		</div>
	<?php endif;
}

function modChrome_id_containter_owl($module, &$params, &$attribs)
{
	/* div.id div.container div.row */
	$moduleTag      = htmlspecialchars($params->get('module_tag', 'div'), ENT_QUOTES, 'UTF-8');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize !== 0 ? ' span' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass    = $params->get('header_class');
	$headerClass    = $headerClass ? htmlspecialchars($headerClass, ENT_COMPAT, 'UTF-8') : '';
	$document = JFactory::getDocument();
	$document->addStyleSheet('templates/gigacms/css/owl/owl.carousel.min.css');
	$document->addStyleSheet('templates/gigacms/css/owl/owl.theme.default.min.css');
	$document->addScript('templates/gigacms/js/owl.carousel.min.js');
	$document->addScript('templates/gigacms/js/owl.config.js');

	if (!empty ($module->content)) : ?>
		<div class="<?php echo htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8'); ?>">
			<div class="container">
				<div class="warp">
					<?php if ((bool) $module->showtitle) : ?>
					<div class="row">					
							<div class="col-xs-12">
								<<?php echo $headerTag  . '>' . $module->title; ?></<?php echo $headerTag; ?>>
							</div>
					</div>
					<?php endif; ?>
					<div class="<?php echo $headerClass; ?> owl-carousel owl-theme">
					<?php echo $module->content; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif;
}