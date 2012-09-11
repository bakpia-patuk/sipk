<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class forum extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->library('phpbb_library');
	}
    
    public function index()
    {
		$this->phpbb_library->user_login('admin', 'admin123');
        if ($this->phpbb_library->isLoggedIn() === TRUE)
        {
            $userId = $this->phpbb_library->getUserInfo('user_id');
            $username = $this->phpbb_library->getUserInfo('username');

            echo "Welcome $username (" . ($this->phpbb_library->isAdministrator() === TRUE ? "administrator" : "user") . "), your ID is $userId and you are member of the following groups";

            foreach ($this->phpbb_library->getUserGroupMembership() as $group)
            {
                echo "$group <br />";
            }
			redirect(base_url('forum/index.php'));
        }
        else
        {
           // echo "You are not logged-in.";
        }
    }
}

/* End of file forum.php */
/* Location: ./application/controllers/forum.php */

?>