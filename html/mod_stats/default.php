<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_stats
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div class="row thongke-mod stats-module<?php echo $moduleclass_sfx; ?>">
<?php foreach ($list as $item) : ?>
	<div class="col-xs-12 col-sm-4">	
		<div class="item-thongke">		
			<div class="item-thongke__data"><span><?php echo $item->data; ?></span></div >
			<div class="item-thongke__title"><?php echo $item->title; ?></div>
		</div>
	</div>
<?php endforeach; ?>
</div>
