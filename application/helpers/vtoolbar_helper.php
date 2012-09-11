<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class VToolBar_Helper
{
    
    protected $_bar = array();
    
    public static function title($title)
	{
        $html = " <h1>".$title."</h1>";
        return $html;
	}
    
    public static function divider()
	{
		$bar = VToolBar::getInstance('toolbar');
		$bar->appendButton('Separator', 'divider');
	}
    
    public static function addNew($task = 'add', $alt = 'New', $check = false)
	{
		$bar = VToolBar::getInstance('toolbar');
		$bar->appendButton('Standard', 'new', $alt, $task, $check);
	}
    
    public static function help($url)
	{
		$bar = VToolBar::getInstance('help');
		$bar->appendButton('Help', $url);
	}
    
    public static function editList($task = 'edit', $alt = 'Edit')
	{
		$bar = VToolBar::getInstance('toolbar');
		$bar->appendButton('Standard', 'edit', $alt, $task, true);
	}
    
    public static function publish($task = 'publish', $alt = 'Publish', $check = false)
	{
		$bar = VToolBar::getInstance('toolbar');
		$bar->appendButton('Standard', 'publish', $alt, $task, $check);
	}
    
    public static function unpublish($task = 'unpublish', $alt = 'Unpublish', $check = false)
	{
		$bar = VToolBar::getInstance('toolbar');
		$bar->appendButton('Standard', 'unpublish', $alt, $task, $check);
	}
    
    public static function deleteList($msg = '', $task = 'remove', $alt = 'Delete')
	{
		$bar = VToolBar::getInstance('toolbar');
		if ($msg) {
			$bar->appendButton('Confirm', $msg, 'delete', $alt, $task, true);
		} else {
			$bar->appendButton('Standard', 'delete', $alt, $task, true);
		}
	}
    
    public static function trash($task = 'remove', $alt = 'Trash', $check = true)
	{
		$bar = VToolBar::getInstance('toolbar');
		$bar->appendButton('Standard', 'trash', $alt, $task, $check, false);
	}
    
    public static function custom($task = '', $icon = '', $iconOver = '', $alt = '', $listSelect = true)
	{
		$bar = VToolBar::getInstance('toolbar');
		$icon = preg_replace('#\.[^.]*$#', '', $icon);
		$bar->appendButton('Standard', $icon, $alt, $task, $listSelect);
	}
    
    public static function archiveList($task = 'archive', $alt = 'Archive')
	{
		$bar = VToolBar::getInstance('toolbar');
		$bar->appendButton('Standard', 'archive', $alt, $task, true);
	}
    
    public static function checkin($task = 'checkin', $alt = 'Checkin', $check = true)
	{
		$bar = VToolBar::getInstance('toolbar');
		$bar->appendButton('Standard', 'checkin', $alt, $task, $check);
	}
    
    public static function preferences($component, $height = '550', $width = '875', $alt = 'Options', $path = '', $onClose = '')
	{
		$component = urlencode($component);
		$path = urlencode($path);
		$top = 0;
		$left = 0;
		$bar = VToolBar::getInstance('toolbar');
		$bar->appendButton('Popup', 'options', $alt, 'index.php?option=com_config&amp;view=component&amp;component='.$component.'&amp;path='.$path.'&amp;tmpl=component', $width, $height, $top, $left, $onClose);
	}
    
    public static function apply($task = 'apply', $alt = 'Apply')
	{
		$bar = VToolBar::getInstance('toolbar');
		$bar->appendButton('Standard', 'apply', $alt, $task, false);
	}
    
    public static function save($task = 'save', $alt = 'Save &amp; Close')
	{
		$bar = VToolBar::getInstance('toolbar');
		$bar->appendButton('Standard', 'save', $alt, $task, false);
	}
    
    public static function save2new($task = 'save2new', $alt = 'Save &amp; New')
	{
		$bar = VToolBar::getInstance('toolbar');
		$bar->appendButton('Standard', 'save-new', $alt, $task, false);
	}
    
    public static function cancel($task = 'cancel', $alt = 'Cancel')
	{
		$bar = VToolBar::getInstance('toolbar');
		$bar->appendButton('Standard', 'cancel', $alt, $task, false);
	}
    
}

?>
