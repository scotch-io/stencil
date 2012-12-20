<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scotch extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->stencil->slice('head');
	}

	//example of home
	public function index()
	{
		$this->stencil->layout('home_layout');
		$this->stencil->paint('home_view');
	}
	
	//sample of subpage
	public function subpage()
	{
		$this->stencil->title('Some Subpage');
		//$this->stencil->slice('sidebar' => 'sidebar1');
		$this->stencil->slice('sidebar' => 'sidebar2');
		
		/*
		*	Variables from slices and data passed 
		*	to the view are ALL made available
		*	in your layouts, slices, and pages.
		*/
		$data = array();
		$data['somevar'] = 'This is $somevar!';
		
		$this->stencil->paint('sample_subpage_view', $data);
	}
}

/* End of file scotch.php */
/* Location: ./application/controllers/scotch.php */
