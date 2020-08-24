<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$document = JFactory::getDocument();
$document->addStyleSheet('templates/gigacms/css/giga-admin.css');

$id = '';

if ($tagId = $params->get('tag_id', ''))
{
	$id = ' id="' . $tagId . '"';
}

// The menu class is deprecated. Use nav instead
?>
<div class="giga-button-admin-floating-action">
	<a href="javascript:void(0);" data-target="giga_admin_sidebar" data-placement="left" data-position="fixed" is-open="false" class="pmd-floating-action-btn  pmd-btn-raised  btn btn-sm pmd-btn-fab btn-mauxam pmd-btn-flat pmd-ripple-effect pull-left margin-r8 pmd-sidebar-toggle"><i class="material-icons md-light">menu</i></a>
</div>

      <nav class="navbar navbar-inverse navbar-static-top pmd-z-depth">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="javascript:void(0);" data-target="giga_admin_sidebar" data-placement="left" data-position="fixed" is-open="false" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect pull-left margin-r8 pmd-sidebar-toggle"><i class="material-icons md-light">menu</i></a>
            <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="#">Menu Admin</a>
          </div>
          <div id="navbar_menu_top_admin" class="navbar-collapse collapse">
<ul class="nav navbar-nav <?php echo $class_sfx; ?>"<?php echo $id; ?>>
<?php foreach ($list as $i => &$item)
{

	$class = 'item-' . $item->id;

	if ($item->id == $default_id)
	{
		$class .= ' default';
	}

	if ($item->id == $active_id || ($item->type === 'alias' && $item->params->get('aliasoptions') == $active_id))
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type === 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type === 'separator')
	{
		$class .= ' divider';
	}



	if ($item->parent)
	{
		$class .= ' parent dropdown';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
		echo '<li class="dropdown">';
                require JModuleHelper::getLayoutPath('mod_menu', 'menu-top-admin_dropdown');
	} else {

		echo '<li class="' . $class . '">';

		switch ($item->type) :
			case 'separator':
			case 'component':
			case 'heading':
			case 'url':
				require JModuleHelper::getLayoutPath('mod_menu', 'menu-top-admin_' . $item->type);
				break;

			default:
				require JModuleHelper::getLayoutPath('mod_menu', 'menu-top-admin_url');
				break;
		endswitch;
	} // end if ($item->deeper)
	// The next item is deeper.
	if ($item->deeper)
	{
		echo '<ul class="dropdown-menu">';
	}
	// The next item is shallower.
	elseif ($item->shallower)
	{
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else
	{
		echo '</li>';
	}
}
?></ul>
</div>
</div>
</nav>