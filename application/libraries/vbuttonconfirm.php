<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VButtonConfirm extends VButton
{
    
	protected $_name = 'Confirm';

	public function fetchButton($type='Confirm', $msg='', $name = '', $text = '', $task = '', $list = true, $hideMenu = false)
	{
		$text	= $text;
		$msg	= $msg;
		$class	= $this->fetchIconClass($name);
		$doTask	= $this->_getCommand($msg, $name, $task, $list);

		$html	= "<a href=\"#\" onclick=\"$doTask\" class=\"toolbar\">\n";
		$html .= "<span class=\"$class\">\n";
		$html .= "</span>\n";
		$html	.= "$text\n";
		$html	.= "</a>\n";

		return $html;
	}

	public function fetchId($type='Confirm', $name = '', $text = '', $task = '', $list = true, $hideMenu = false)
	{
		return $this->_parent->getName().'-'.$name;
	}

	protected function _getCommand($msg, $name, $task, $list)
	{
		$message	= 'Please first make a selection from the list';
		$message	= addslashes($message);

		if ($list) {
			$cmd = "javascript:if (document.adminForm.boxchecked.value==0){alert('$message');}else{if (confirm('$msg')){Joomla.submitbutton('$task');}}";
		} else {
			$cmd = "javascript:if (confirm('$msg')){Joomla.submitbutton('$task');}";
		}
		return $cmd;
	}
}