<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VButtonPopup extends VButton
{
    
	protected $_name = 'Popup';

	public function fetchButton($type='Popup', $name = '', $text = '', $url = '', $width=640, $height=480, $top=0, $left=0, $onClose = '')
	{
		$text	= $text;
		$class	= $this->fetchIconClass($name);
		$doTask	= $this->_getCommand($name, $url, $width, $height, $top, $left);

		$html	= "<a class=\"modal\" href=\"$doTask\" rel=\"{handler: 'iframe', size: {x: $width, y: $height}, onClose: function() {".$onClose."}}\">\n";
		$html .= "<span class=\"$class\">\n";
		$html .= "</span>\n";
		$html	.= "$text\n";
		$html	.= "</a>\n";

		return $html;
	}

	public function fetchId($type, $name)
	{
		return $this->_parent->getName().'-'."popup-$name";
	}

	protected function _getCommand($name, $url, $width, $height, $top, $left)
	{
		if (substr($url, 0, 4) !== 'http') {
			$url = $url; //JURI::base().$url;
		}
		return $url;
	}
    
}
