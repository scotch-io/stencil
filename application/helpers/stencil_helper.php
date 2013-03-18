<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('add_css'))
{
	function add_css($css = NULL)
	{
		if (is_null($css))
		{
			return FALSE;
		}

		if (!is_array($css))
		{
			$file_type = (preg_match('/\.css$/i', $css) ? NULL : '.css');
			$url = (!preg_match('#^www|^http|^//#', $css)) ? base_url('assets/css/'.$css.$file_type) : $css;
			return '<link rel="stylesheet" href="'.$url.'">'."\n";
		}
		else
		{
			$items = array();
			$i = 0;
			$tab = "\t";
			foreach ($css as $item)
			{
				if ($i == count($css) - 1)
				{
					$tab = '';
				}
				$file_type = (preg_match('/\.css$/i', $item) ? NULL : '.css');
				$url = (!preg_match('#^www|^http|^//#', $item)) ? base_url('assets/css/'.$item.$file_type) : $item;
				$items[] = '<link rel="stylesheet" href="'.$url.'">'."\n".$tab;
				$i++;
			}
			return implode('', $items);
		}
	}
}

if (!function_exists('add_js'))
{
	function add_js($js = NULL)
	{
		if (is_null($js))
		{
			return FALSE;
		}

		if (!is_array($js))
		{
			$file_type = (preg_match('/\.js$/i', $js) ? NULL : '.js');
			$url = (!preg_match('#^www|^http|^//#', $js)) ? base_url('assets/js/'.$js.$file_type) : $js;
			return '<script src="'.$url.'"></script>'."\n";
		}
		else
		{
			$items = array();
			$i = 0;
			$tab = "\t";
			foreach ($js as $item)
			{
				if ($i == count($js) - 1)
				{
					$tab = '';
				}
				$file_type = (preg_match('/\.js$/i', $item) ? NULL : '.js');
				$url = (!preg_match('#^www|^http|^//#', $item)) ? base_url('assets/js/'.$item.$file_type) : $item;
				$items[] = '<script src="'.$url.'"></script>'."\n".$tab;
				$i++;
			}
			return implode('', $items);
		}
	}
}

if (!function_exists('add_meta'))
{
	function add_meta($meta = NULL)
	{
		if (is_null($meta))
		{
			return FALSE;
		}
		
		$items = array();
		$i = 0;
		$tab = "\t";
		foreach ($meta as $key => $value)
		{
			if ($i == count($meta) - 1)
			{
				$tab = '';
			}

			$items[] = '<meta name="'.$key.'" content="'.$value.'">'."\n".$tab;
			$i++;
		}		
		return implode('', $items);
	}
}

if (!function_exists('shiv'))
{
	function shiv()
	{
		return '<!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->'."\n";
	}
}

if (!function_exists('chrome_frame'))
{
	function chrome_frame()
	{
		return '<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"><![endif]--><!-- Force IE to use the latest rendering engine -->'."\n";
	}
}

if (!function_exists('view_port'))
{
	function view_port()
	{
		return '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><!-- Optimize mobile viewport -->'."\n";
	}
}

if (!function_exists('apple_mobile'))
{
	function apple_mobile($style = NULL)
	{
		if (is_null($style))
		{	
			$style = 'default';
		}

		return '<meta name="apple-mobile-web-app-capable" content="yes">'."\n\t".'<meta name="apple-mobile-web-app-status-bar-style" content="'.$style.'">'."\n";
	}
}

if (!function_exists('windows_tile'))
{
	function windows_tile($meta = array())
	{
		if (is_null($meta))
		{	
			return FALSE;
		}

		$tile = array();
		if (array_key_exists('name', $meta))
			$tile[] = '<meta name="application-name" content="'.$meta['name'].'"><!-- Windows 8 Tile Name -->';
		if (array_key_exists('image', $meta))
			$tile[] = '<meta name="msapplication-TileImage" content="'.$meta['image'].'"><!-- Windows 8 Tile Image -->';
		if (array_key_exists('color', $meta))
			$tile[] = '<meta name="msapplication-TileColor" content="'.$meta['color'].'"><!-- Windows 8 Tile Color -->';
		
		$i = 0;
		$tab = "\t";
		$result = array();
		foreach ($tile as $item) {
			if ($i == count($tile) - 1)
			{
				$tab = '';
			}
			$result[] = $item."\n".$tab;
		$i++;
		}
		
		return implode('', $result);
	}
}

if (!function_exists('favicons'))
{
	function favicons($icons = NULL)
	{
		if ($icons == NULL)
		{
			
			return '<link rel="icon" href="'.base_url('assets/img/icons/favicon-32.png').'" type="image/png"'.'><!-- default favicon -->'."\n\t".
			'<link rel="shortcut icon" href="'.base_url('favicon.ico').'"><!-- legacy default favicon (in root, 32x32) -->'."\n\t".
			'<link rel="apple-touch-icon" sizes="57x57" href="'.base_url('assets/img/icons/favicon-57.png').'"><!-- iPhone low-res and Android -->'."\n\t".
			'<link rel="apple-touch-icon-precomposed" sizes="57x57" href="'.base_url('assets/img/icons/favicon-57.png').'"><!-- legacy Android -->'."\n\t".
			'<link rel="apple-touch-icon" sizes="72x72" href="'.base_url('assets/img/icons/favicon-72.png').'"><!-- iPad -->'."\n\t".
			'<link rel="apple-touch-icon" sizes="114x114" href="'.base_url('assets/img/icons/favicon-114.png').'"><!-- iPhone 4 -->'."\n\t".
			'<link rel="apple-touch-icon" sizes="144x144" href="'.base_url('assets/img/icons/favicon-144.png').'"><!-- iPad hi-res -->'."\n";
		}
		
		if (!is_array($icons)) 
		{
			return FALSE;
		}
		
		$items = array();
		$tab = "\t";
		$i = 0;
		foreach ($icons as $size => $src)
		{
			if ($i == count($icons) - 1)
			{
				$tab = '';
			}
			switch ($size)
			{
				case '16':
					$items[] = '<link rel="shortcut icon" type="image/png" href="'.base_url($src).'"><!-- default favicon -->'."\n".$tab;
					break;
				case '32':
					$items[] = '<link rel="shortcut icon" type="image/png" href="'.base_url($src).'"><!-- default favicon -->'."\n".$tab;
					break;
				case '57':
					$items[] = '<link rel="apple-touch-icon" sizes="57x57" href="'.base_url($src).'"><!-- iPhone low-res and Android -->'."\n".$tab;
					$items[] = '<link rel="apple-touch-icon-precomposed" sizes="57x57" href="'.base_url($src).'"><!-- Legacy Android -->'."\n".$tab;
					break;
				case '64':
					$items[] = '<link rel="shortcut icon" type="image/png" href="'.base_url($src).'"><!-- default favicon -->'."\n".$tab;
					break;
				case '72':
					$items[] = '<link rel="apple-touch-icon" sizes="72x72" href="'.base_url($src).'"><!-- iPad -->'."\n".$tab;
					break;
				case '114':
					$items[] = '<link rel="apple-touch-icon" sizes="114x114" href="'.base_url($src).'"><!-- iPhone 4 -->'."\n".$tab;
					break;
				case '144':
					$items[] = '<link rel="apple-touch-icon" sizes="144x144" href="'.base_url($src).'"><!-- iPad hi-res -->'."\n".$tab;
					break;
				default:
					$items[] = '<!-- Sorry! This helper does not support the size: '.$size.'. -->'."\n".$tab;
					break;
			}
			$i++;
		}
		return implode('', $items);
	}
}

if (!function_exists('jquery'))
{
	function jquery($version = NULL)
	{

		if (is_null($version))
		{
			return '<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>'."\n";
		} 
		else
		{
			return '<script src="//ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js"></script>'."\n";
		}
	}
}

if (!function_exists('asset_url'))
{
	function asset_url($src = NULL)
	{
		if (is_null($src)) 
		{
			return base_url().'assets/';
		}
		
		return base_url().'assets/'.$src;
	}
}

/* End of file stencil_helper.php */
/* Location: ./application/helpers/stencil_helper.php */ 