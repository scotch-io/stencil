<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

  	function index()
 	{
		switch ($this->uri->segment(1)) 
		{	
			default :
				$this->output->set_status_header('404');
				
				echo '404';
				exit;

				$this->stencil->title('404 Page Not Found');
				$data['subpage_text'] = '404 Page Does not Exist!';
				$this->stencil->data($data);
				$this->stencil->paint('404_view');
				break;
		}
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */