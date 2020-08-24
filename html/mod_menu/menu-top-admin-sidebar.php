<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$id = '';

if ($tagId = $params->get('tag_id', ''))
{
	$id = ' id="' . $tagId . '"';
}

// The menu class is deprecated. Use nav instead
?>
     <aside id="giga_admin_sidebar" class="pmd-sidebar sidebar-default pmd-z-depth pmd-sidebar-left pmd-sidebar-left-fixed pmd-sidebar-close" role="navigation">
<ul class="nav pmd-sidebar-nav "<?php echo $id; ?>>
	<li class="dropdown pmd-dropdown pmd-user-info">
		<a aria-expanded="false" data-toggle="dropdown" data-sidebar="true" class="btn-user dropdown-toggle media" href="javascript:void(0);">
			<div class="media-body media-middle">MENU ADMIN</div>
		</a>
	</li>

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
		echo '<li class="dropdown pmd-dropdown">';
		require JModuleHelper::getLayoutPath('mod_menu', 'menu-top-admin-sidebar_dropdown');
	} else {

		echo '<li class="' . $class . '">';

		switch ($item->type) :
			case 'separator':
			case 'component':
			case 'heading':
			case 'url':
				require JModuleHelper::getLayoutPath('mod_menu', 'menu-top-admin-sidebar_' . $item->type);
				break;

			default:
				require JModuleHelper::getLayoutPath('mod_menu', 'menu-top-admin-sidebar_url');
				break;
		endswitch;
	} // end if ($item->deeper)
	// The next item is deeper.
	if ($item->deeper)
	{
		// nav-child unstyled small 
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
