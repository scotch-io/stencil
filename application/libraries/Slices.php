<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Slice Callbacks
|--------------------------------------------------------------------------
|
| By default, any data you bind or send to the views using Stencil will already
| be available in your slices, however,this may have you rewriting code over and
| over again everytime you want to use a Slice that has a variable in it.
|
| Callbacks elimate that problem.
|
| Slice Callbacks are callbacks or class methods that are called when a Slice is created.
| If you have data that you want bound to a given view each time that view is created
| throughout your application, a Slice Callback can organize that code into a single 
| location. Therefore, view Slice Callbacks may function like "view models" or "presenters".
| This will maintain an MVC approach to your Views without you having to write redundant code.
| This is inspired by Laravel's View Composers.
|
| Example:
|
|
|		public function sidebar()
|		{
|			return array('recent_posts' => array('one', 'two', 'three', 'four'));
|		}
|
|		Makes $recent_posts available in /views/slices/sidebar.php
|
| The function name must be the same as the slice name. You must return an associative array.
|
| For more information, please visit the docs: http://scotch.io/development/stencil#callbacks
*/

class Slices {

	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}
}
/* End of file Slices.php */
/* Location: ./application/libararies/Slices.php */