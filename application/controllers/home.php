<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->stencil->slice('head');
	}

	public function index()
	{
		$this->stencil->js('chart');
		$this->stencil->layout('home_layout');
		$this->stencil->paint('home_view');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */