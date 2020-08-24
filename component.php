<?php
/**
 * @package     XiroWeb
 * @subpackage  Templates.XiroWeb
 *
 * @copyright   Copyright (C) 2020 XiroWeb -, Inc. All rights reserved.
 */

defined('_JEXEC') or die;

/** @var JDocumentHtml $this */

$app = JFactory::getApplication();

// Output as HTML5
$this->setHtml5(true);

JHtml::_('bootstrap.framework');
JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

JHtml::_('stylesheet', 'bootstrap.min.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'pope.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'giga-template.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'custom.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'https://fonts.googleapis.com/icon?family=Material+Icons');

$input = JFactory::getApplication()->input;
$tmpl = $input->getString('tmpl','');

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<jdoc:include type="head" />
</head>
<body>
	<?php if ($tmpl != 'component') :
		// khong hien thi message tren trang popup san pham
		// do trung va chong len message thanks 
	 ?>
		<jdoc:include type="message" />
	<?php endif; //if ($tmpl != 'component') : ?>
	<jdoc:include type="component" />
	<script src="<?php echo $this->baseurl; ?>/templates/gigacms/js/pope.js"></script>
	<script src="<?php echo $this->baseurl; ?>/templates/gigacms/js/footer.js"></script>
</body>
</html>
