<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		//$this->stencil->data('fdsafds', 'fafdsafd');
	}

	public function index()
	{

		$this->stencil->title('woot');
		//$this->stencil->slice('head');
		//$this->stencil->slice('sidebar');
		$this->stencil->layout('subpage_layout');
		
		$this->stencil->slice(array('head', 'one', array('sidebar' => 'sidebar')));


		$data['recent_fffposts'] = array('title 1', 'title 2', 'title 3');
				

		$this->stencil->paint('home_view', $data);


	



	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */