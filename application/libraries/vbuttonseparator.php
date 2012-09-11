<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VButtonSeparator extends VButton
{
    
	protected $_name = 'Separator';

	public function render(&$definition)
	{
		$class	= null;
		$style	= null;

		$class = (empty($definition[1])) ? 'spacer' : $definition[1];
		$style = (empty($definition[2])) ? null : ' style="width:' .  intval($definition[2]) . 'px;"';

		return '<li class="' . $class . '"' . $style . ">\n</li>\n";
	}

	public function fetchButton()
	{
	}
    
}
