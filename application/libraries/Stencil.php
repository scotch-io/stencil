<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stencil {

	protected $CI;
	protected $title  		= '';
	protected $layout  		= '';
	protected $body_class 	= '';
	protected $data			= array();
	protected $meta 		= array();
	protected $css    		= array();
	protected $js     		= array();
	protected $slice		= array();

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	public function paint($page, $data = NULL)
	{
		$this->data['css']   		= add_css($this->css);
		$this->data['meta']  		= add_meta($this->meta);
		$this->data['js']    		= add_js($this->js);
		$this->data['title'] 		= $this->title;
		$this->data['body_class'] 	= $this->CI->router->fetch_class();

		if (!is_null($data))
			foreach ($data as $key => $value)
				$this->data[$key] = $value;

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
								$this->data[$restult_k] = $result_v;
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
							$this->data[$k] = $v;
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
							$this->data[$restult_k] = $result_v;
					}	
				}
				$this->data[$value] = $this->CI->load->view('slices/'.$value, $this->data, TRUE)."\n";
			}
		}
		$this->data['content'] = $this->CI->load->view('pages/'.$page, $this->data, TRUE)."\n";
		$this->CI->load->view('layouts/'.$this->layout, $this->data);
	}

	public function layout($layout)
	{
		$this->layout = $layout;
	}

	public function css($css)
	{
		$this->css = array_merge($this->css, (array)$css);
	}

	public function js($js)
	{
		$this->js = array_merge($this->js, (array)$js);
	}

	public function meta($meta)
	{
		$this->meta = array_merge($this->meta, (array)$meta);
	}

	public function title($title)
	{
		$this->title = $title;
	}

	public function slice($slice)
	{
		$this->slice = array_merge($this->slice, (array)$slice);
	}

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
}

/* End of file Stencil.php */ 
/* Location: ./application/libararies/Stencil.php */