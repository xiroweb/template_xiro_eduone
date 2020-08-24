<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$attributes = array();
$attributes_2  = array();

if ($item->anchor_title)
{
	$attributes['title'] = $item->anchor_title;
}

$attributes['class']="dropdown-toggle dropdown-main-gigacms dropdown-full-link";
$attributes_2['class']="dropdown-toggle dropdown-main-gigacms dropdown-caret";

if ($item->anchor_css)
{
	$attributes['class'] = $item->anchor_css;
}

if ($item->anchor_rel)
{
	$attributes['rel'] = $item->anchor_rel;
}
//$attributes['data-toggle'] = 'dropdown';
$attributes_2['data-toggle'] = 'dropdown';

$attributes['role'] = 'button';
$attributes['aria-haspopup'] = 'true';
$attributes['aria-expanded'] = 'false';
// $attributes['data-target'] = '#';

$attributes_2['role'] = 'button';
$attributes_2['aria-haspopup'] = 'true';
$attributes_2['aria-expanded'] = 'false';
// $attributes_2['data-target'] = '#';
// https://getbootstrap.com/docs/3.3/javascript/#dropdowns
$linkicon = '';
if ($item->menu_image_css != '') {
	$linkicon = '<span class="glyphicon '.$item->menu_image_css.'" aria-hidden="true"></span> ';
} 
	$linktype = $linkicon.$item->title;


if ($item->menu_image)
{
	if ($item->menu_image_css)
	{
		$image_attributes['class'] = $item->menu_image_css;
		$linktype = JHtml::_('image', $item->menu_image, $item->title, $image_attributes);
	}
	else
	{
		$linktype = JHtml::_('image', $item->menu_image, $item->title);
	}

	if ($item->params->get('menu_text', 1))
	{
		$linktype .= '<span class="image-title">' . $item->title . '</span>';
	}
}

// $linktype .= '<b class="caret"></b>';
$linktype_2 = '<b class="caret"></b>';

if ($item->browserNav == 1)
{
	$attributes['target'] = '_blank';
}
elseif ($item->browserNav == 2)
{
	$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes';

	$attributes['onclick'] = "window.open(this.href, 'targetWindow', '" . $options . "'); return false;";
}

echo JHtml::_('link', JFilterOutput::ampReplace(htmlspecialchars($item->flink, ENT_COMPAT, 'UTF-8', false)), $linktype, $attributes);
echo JHtml::_('link', JFilterOutput::ampReplace(htmlspecialchars('javascript:void(0);', ENT_COMPAT, 'UTF-8', false)), $linktype_2, $attributes_2);
