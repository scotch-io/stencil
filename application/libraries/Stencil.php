<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stencil {

	// {{{ class_properties

	/**
	 * CodeIgniter Super Global
	 *
	 * CodeIgniter Super Global Object
	 *
	 * @var object
	 */
	protected $CI;

	/**
	 * Page Title
	 *
	 * This is the page title of the rendered
	 * page.
	 *
	 * @var string
	 */
	protected $title  		= '';

	/**
	 * Layout
	 *
	 * What layout shall we use?
	 *
	 * @var string
	 */
	protected $layout  		= '';

	/**
	 * Body Class
	 *
	 * Give our body a special class
	 *
	 * @var string
	 */
	protected $body_class 	= '';

	/**
	 * Data
	 *
	 * This is the data that will be sent to the view
	 *
	 * @var array
	 */
	protected $data			= array();

	/**
	 * Meta Data
	 *
	 * This is the HTML Meta data
	 *
	 * @var array
	 */
	protected $meta 		= array();

	/**
	 * CSS Data
	 *
	 * This is the CSS data
	 *
	 * @var array
	 */
	protected $css    		= array();

	/**
	 * JS Data
	 *
	 * This is the Javascript Data
	 *
	 * @var array
	 */
	protected $js     		= array();

	/**
	 * Slice data
	 *
	 * @var array
	 */
	protected $slice		= array();

	// }}} class_properties

	// {{{ class_methods

	/**
	 * Class Construct
	 *
	 * Executed during the setup of this class
	 * Lets set the CodeIgniter Super Global Object
	 *
	 * @access public
	 */
	public function __construct()
	{
		$this->CI =& get_instance();
	}

	/**
	 * Paint
	 *
	 * This is the workhorse of this library
	 * and it puts all the pieces together
	 *
	 * @access public
	 */
	public function paint($page, $data = NULL)
	{
		$this->data['css']   		= add_css($this->css);
		$this->data['meta']  		= add_meta($this->meta);
		$this->data['js']    		= add_js($this->js);
		$this->data['title'] 		= $this->title;
		$this->data['body_class'] 	= $this->CI->router->fetch_class();

		if (!is_null($data))
		{
			foreach ($data as $key => $value)
			{
				$this->data[$key] = $value;
			}
		}

		foreach ($this->slice as $key => $value)
		{
			if (is_array($value))
			{
				foreach ($value as $k => $v)
				{
					if (method_exists($this->CI->slices, $v))
					{
						$result = call_user_func_array(array($this->CI->slices, $v), array());
						foreach ($result as $restult_k => $result_v)
						{
							if (!isset($this->data[$restult_k]))
							{
								$this->data[$restult_k] = $result_v;
							}
						}	
					}
					$this->data[$k] = $this->CI->load->view('slices/'.$v, $this->data, TRUE)."\n";
				}
			}
			elseif (!is_numeric($key))
			{
				if (method_exists($this->CI->slices, $key))
				{
					$result = call_user_func_array(array($this->CI->slices, $key), array());
					foreach ($result as $k => $v)
					{
						if (!isset($this->data[$k]))
						{
							$this->data[$k] = $v;
						}
					}	
				}
				$this->data[$key] = $this->CI->load->view('slices/'.$value, $this->data, TRUE)."\n";
			}
			else
			{
				if (method_exists($this->CI->slices, $value))
				{
					$result = call_user_func_array(array($this->CI->slices, $value), array());
					foreach ($result as $restult_k => $result_v)
					{
						if (!isset($this->data[$restult_k]))
						{
							$this->data[$restult_k] = $result_v;
						}
					}	
				}
				$this->data[$value] = $this->CI->load->view('slices/'.$value, $this->data, TRUE)."\n";
			}
		}
		$this->data['content'] = $this->CI->load->view('pages/'.$page, $this->data, TRUE)."\n";
		$this->CI->load->view('layouts/'.$this->layout, $this->data);
	}

	/**
	 * Layout
	 *
	 * Set the page layout
	 *
	 * @access public
	 */
	public function layout($layout)
	{
		$this->layout = $layout;
	}

	/**
	 * CSS
	 *
	 * Add some css stuff
	 *
	 * @access public
	 */
	public function css($css)
	{
		$this->css = array_merge($this->css, (array)$css);
	}

	/**
	 * JS
	 *
	 * Add some javascript stuff
	 *
	 * @access public
	 */
	public function js($js)
	{
		$this->js = array_merge($this->js, (array)$js);
	}

	/**
	 * Meta
	 *
	 * Add some meta data stuff
	 *
	 * @access public
	 */
	public function meta($meta)
	{
		$this->meta = array_merge($this->meta, (array)$meta);
	}

	/**
	 * Title
	 *
	 * Set the page title
	 *
	 * @access public
	 */
	public function title($title)
	{
		$this->title = $title;
	}

	/**
	 * Slices
	 *
	 * Set some slices
	 *
	 * @access public
	 */
	public function slice($slice)
	{
		$this->slice = array_merge($this->slice, (array)$slice);
	}

	/**
	 * Data
	 *
	 * Some some key pair data to your view
	 *
	 * @access public
	 */
	public function data($key, $value = NULL)
	{
		if (!is_null($value))
		{
			$this->data[$key] = $value;
		}
		else
		{
			foreach ($key as $k => $v)
			{
				$this->data[$k] = $v;
			}
		}
	}

	// }}} class_methods
}

/* End of file Stencil.php */
/* Location: ./application/libararies/Stencil.php */