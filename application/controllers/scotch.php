<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scotch extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->stencil->title('Stencil by Scotch.io');
		$this->stencil->layout('home_layout');

	
		$this->stencil->paint('home_view');
	}

}

/* End of file scotch.php */
/* Location: ./application/controllers/scotch.php */
