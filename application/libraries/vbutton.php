<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VButton
{

	protected $_name = null;
	protected $_parent = null;

	public function __construct($parent = null)
	{
		$this->_parent = $parent;
	}

	public function getName()
	{
		return $this->_name;
	}

	public function render(&$definition)
	{
		$html	= null;
		$id		= call_user_func_array(array(&$this, 'fetchId'), $definition);
		$action	= call_user_func_array(array(&$this, 'fetchButton'), $definition);

		if ($id) {
			$id = "id=\"$id\"";
		}
        
        $class = $this->_class ? $this->_class : 'button';

		$html	.= "<li class=\"".$class."\" $id>\n";
		$html	.= $action;
		$html	.= "</li>\n";

		return $html;
	}

	public function fetchIconClass($identifier)
	{
		return "icon-32-$identifier";
	}

	public function fetchButton() {}
    
    public function setClass($class) {
		$this->_class = $class;
	}
    
}
