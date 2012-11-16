<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->stencil->layout('subpage_layout');
		$this->stencil->slice('head');
	}

  	function index()
 	{
		switch ($this->uri->segment(1)) 
		{
			case 'static-example' :
				$this->stencil->title('Static Page Example');
				$this->stencil->paint('static_page_view');
				break;
		
			case 'license' :
				$this->stencil->title('License');
				$this->stencil->paint('license_view');
				break;
				
			default:
				$this->output->set_status_header('404');
				$this->stencil->title('404 Page Not Found');
				$this->stencil->paint('404_view');
				break;
		}
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */