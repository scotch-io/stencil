<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slices {

	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	public function sidebar()
	{
		return array('recent_posts' => array('one', 'two', 'three', 'four'));
	}
}

/* End of file Slices.php */
/* Location: ./application/libararies/Slices.php */