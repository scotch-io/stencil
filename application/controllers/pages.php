<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->stencil->slice(array('head', 'sidebar'));
		$this->stencil->layout('subpage_layout');
	}

  	function index()
 	{
		switch ($this->uri->segment(1)) 
		{
			//This is used for quick pages
			case 'example' :
				$this->stencil->title('Example');
				$this->stencil->paint('example_view');
				break;
			
			default :
				$this->output->set_status_header('404');
				$this->stencil->title('404 Page Not Found');
				$this->stencil->paint('404_view');
				break;
		}
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */