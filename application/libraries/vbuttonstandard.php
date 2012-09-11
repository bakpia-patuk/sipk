<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VButtonStandard extends VButton
{
    
	protected $_name = 'Standard';

	public function fetchButton($type='Standard', $name = '', $text = '', $task = '', $list = true)
	{
		$i18n_text	= $text;
		$class	= $this->fetchIconClass($name);
		$doTask	= $this->_getCommand($text, $task, $list);

		$html	= "<a href=\"#\" onclick=\"$doTask\" class=\"toolbar\">\n";
		$html .= "<span class=\"$class\">\n";
		$html .= "</span>\n";
		$html	.= "$i18n_text\n";
		$html	.= "</a>\n";

		return $html;
	}

	public function fetchId($type='Standard', $name = '', $text = '', $task = '', $list = true, $hideMenu = false)
	{
		return $this->_parent->getName().'-'.$name;
	}

	protected function _getCommand($name, $task, $list)
	{
		$message = 'Please first make a selection from the list';
		$message = addslashes($message);
		if ($list) {
			$cmd = "javascript:if (document.adminForm.boxchecked.value==0){alert('$message');}else{ Joomla.submitbutton('$task')}";
		}
		else {
			$cmd = "javascript:Joomla.submitbutton('$task')";
		}
		return $cmd;
	}
    
}
