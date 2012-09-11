<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VButtonHelp extends VButton
{
    
	protected $_name = 'Help';

	public function fetchButton($type = 'Help', $url = '')
	{
		$text	= "Help";
		$class	= $this->fetchIconClass('help');
		$doTask	= $this->_getCommand($url);

		$html = "<a href=\"#\" onclick=\"$doTask\" rel=\"help\" class=\"toolbar\">\n";
		$html .= "<span class=\"$class\">\n";
		$html .= "</span>\n";
		$html .= "$text\n";
		$html .= "</a>\n";

		return $html;
	}

	public function fetchId()
	{
		return $this->_parent->getName().'-'."help";
	}

	protected function _getCommand($url)
	{
		// Get Help URL
        $cmd = "popupWindow('".$url."', 'Help', 700, 500, 1)";
		return $cmd;
	}
}
