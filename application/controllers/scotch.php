<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scotch extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->stencil->slice('head');
	}

	public function index()
	{
		$this->stencil->title('Stencil by Scotch.io');
		$this->stencil->layout('home_layout');
		$this->stencil->paint('home_view');
	}
	
	public function example()
	{
		$this->stencil->title('Example Page');
		$this->stencil->css('style1');
		$this->stencil->css('style2.css');
		$this->stencil->css(array('style3', 'style4.css', 'www.somesite.com/some.css'));
		$this->stencil->css('http://somesite.com/assets/style.css');
		
		$this->stencil->js('plugin1');
		$this->stencil->js('plugin2.js');
		$this->stencil->js(array('plugin3', 'plugin4.css', '//google.com/somelib/whatever.js'));
		
		$this->stencil->layout('subpage_layout');
		$this->stencil->slice('facebook_like_box');
		
		$this->stencil->paint('example_view');
		
		
	}
}

/* End of file scotch.php */
/* Location: ./application/controllers/scotch.php */
