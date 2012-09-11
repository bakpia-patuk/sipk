<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VToolBar
{
    
    protected $_name = array();
    protected $_bar = array();
    protected $_buttons = array();
    
    public $_actions = array();
    public $_first = array();
    
    public function __construct($name = 'toolbar')
	{
		$this->_name = $name;
	}
    
    public static function getInstance($name = 'toolbar')
	{
		static $instances;

		if (!isset($instances)) {
			$instances = array ();
		}

		if (empty($instances[$name])) {
			$instances[$name] = new VToolBar($name);
		}

		return $instances[$name];
	}
    
    public function getName()
	{
		return $this->_name;
	}
    
    public function appendButton()
	{
		// Push button onto the end of the toolbar array.
		$button = func_get_args();
        if (isset($button[1]) && (strtolower($button[1]) == 'unarchive' or
                      strtolower($button[1]) == 'archive' or
                      strtolower($button[1]) == 'publish' or
                      strtolower($button[1]) == 'unpublish' or
                      strtolower($button[1]) == 'move' or
                      strtolower($button[1]) == 'copy' or
                      strtolower($button[1]) == 'trash' or
                      strtolower($button[1]) == 'delete' or
                      strtolower($button[1]) == 'tag')) {
            array_push($this->_actions, $button);
        }
        elseif (isset($button[1]) && (strtolower($button[1]) == 'new' or
            strtolower($button[1]) == 'apply' or
            strtolower($button[1]) == 'save')) {
            array_push($this->_first, $button);
        }
        else {
            array_push($this->_bar, $button);
        }
		return true;
	}
    
    public function render()
	{
		$html = array ();

		// Start toolbar div.
        $html[] = '<div class="mc-toolbar" id="'.$this->_name.'">';
		$html[] = '<ul>';
        
        foreach ($this->_first as $button) {
			$html[] = $this->renderButton($button, 'button special');
		}
        
        if (count($this->_actions) > 0) {
			if (count($this->_actions) > 1) {
				$html[] = '<li class="button dropdown"><a href="#" id="actionsToggle"><span class="select-active">Actions</span><span class="select-arrow">&#x25BE;</span></a>';
				$html[] = '<ul class="mc-dropdown">';
				foreach ($this->_actions as $button) {
					$html[] = $this->renderButton($button,'sub');
				}
				$html[] = '</ul>';
				$html[] = '</li>';
			} else {
				$html[] = $this->renderButton($this->_actions[0]);
			}
		}

		// Render each button in the toolbar.
		foreach ($this->_bar as $button) {
			$html[] = $this->renderButton($button);
		}

		// End toolbar div.
		$html[] = '</ul>';
		$html[] = '</div>';

		return implode("\n", $html);
	}
    
    public function renderButton(&$node, $class = null)
	{
		// Get the button type.
		$type = $node[0];

		$button = $this->loadButtonType($type);
        $button->setClass($class);

		// Check for error.
		if ($button === false) {
            return "Button not defined for type = $type";
		}
		return $button->render($node);
	}
    
    public function loadButtonType($type, $new = false)
	{
		$signature = md5($type);
		if (isset ($this->_buttons[$signature]) && $new === false) {
			return $this->_buttons[$signature];
		}
        
		$buttonClass = 'VButton'.$type;
		$this->_buttons[$signature] = new $buttonClass($this);

		return $this->_buttons[$signature];
	}
    
}

?>
