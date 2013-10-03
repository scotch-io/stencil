![Stencil Logo](http://scotch.io/wp-content/uploads/2013/09/codeigniter-stencil-1024x426.jpg "Stencil Logo")

Stencil :fire: :pencil2:
=========================== 

Stencil is a Codeigniter template engine for generating HTML pages in a simple yet very robust and powerful way.

It's awesome template system for Codeigniter. Stencil is the perfect out-of-the-box solution for all your Codeigniter projects.

### [View the Official Docs](http://scotch.io/docs/stencil)
### [Play with the Demo](http://stencil.scotch.io)

nick@scotch.io or chris@scotch.io
 
## Features

##### Layouts
##### Codeigniter 2.1.3 Ready
##### Slices
`Child Views`
`Partials`
`Nested Views`
`Elements`
`Includes`
##### HTML5 Helpers 
`add_css()`
`add_js()`
`add_meta()`
`shiv()`
`chrome_frame()`
`view_port()`
`apple_mobile()`
`windows_tile()`
`favicons()`
`jquery()`
`asset_url()`
##### Load Page Specific Assets
`JS`
`CSS`
`Perfect for jQuery Plugins`
##### Slice Callbacks
`Run or return a block of code everytime a view is called`
##### Asset Management
##### Smart Data Binding to Views
`$this->stencil->data('key', 'value')`
`$this->stencil->data(array('key' => 'value'))`

## Example Use

![Stencil Default Layout](http://scotch.io/images/stencil-demo.png "Stencil Logo")

### Controller
```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->stencil->layout('home_layout');
        $this->stencil->slice('header');
        $this->stencil->slice('footer');
    }
 
    public function index()
    {
        $this->stencil->title('Home Page');
       
        $this->stencil->js('some-plugin');
        $this->stencil->js('home-slider');
        $this->stencil->css('home-slider');
        
        $this->stencil->meta(array(
            'author' => 'Nicholas Cerminara',
            'description' => 'This is the home page of my website!',
            'keywords' => 'stencil, example, fun stuff'
        ));

        $data['welcome_message'] = 'Welcome to my website using Stencil!';
        $this->stencil->paint('home_view', $data);
    }
}
 
/* End of file home.php */
/* Location: ./application/controllers/home.php */
```

### Layout
#### (/views/layouts/..)
```php
<!doctype html>
<html>
<head>
    <!-- robot speak -->    
    <meta charset="utf-8">
    <title><?php echo $title; ?> | My Stencil Website</title>
    <?php echo chrome_frame(); ?>
    <?php echo view_port(); ?>
    <?php echo apple_mobile('black-translucent'); ?>
    <?php echo $meta; ?><!-- //loads data from $this->stencil->meta($args) in controller -->
    
    <!-- icons and icons and icons and icons and icons -->
    <?php echo favicons(); ?>
    
    <!-- crayons and paint -->  
    <?php echo add_css(array('bootstrap', 'style')); ?>
    <?php echo $css; ?><!-- //loads data from $this->stencil->css($args) in controller -->
    
    <!-- magical wizardry -->
    <?php echo jquery('1.9.1'); ?>
    <?php echo shiv(); ?>
    <?php echo add_js(array('bootstrap.min', 'scripts')); ?>
    <?php echo $js; ?><!--  //loads page specific $this->stencil->js($args) from Controller (see docs) -->
</head>
<!-- $body_class will always be the class name -->
<body class="<?php echo $body_class; ?>">
    
    <header>
        <?php echo $header; ?>
    </header>
    
    <h1><?php echo $welcome_message; ?></h1>
    
    <section class="content">
        <?php echo $content; ?><!-- This loads home_view -->
    </section>
    
    <footer>
        <?php echo $footer; ?>
    </footer>
 
</body>
</html>
```


### Result

```php
<!doctype html>
<html>
<head>
    <!-- robot speak -->    
    <meta charset="utf-8">
    <title>Home Page | My Stencil Website</title>
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"><![endif]--><!-- Force IE to use the latest rendering engine -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><!-- Optimize mobile viewport -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="author" content="Nicholas Cerminara">
    <meta name="description" content="This is the example page!">
    <meta name="keywords" content="stencil, example, fun stuff">
    
    <!-- icons and icons and icons and icons and icons -->
    <link rel="icon" href="http://scotch.io/assets/img/icons/favicon-32.png" type="image/png"><!-- default favicon -->
    <link rel="shortcut icon" href="http://scotch.io/favicon.ico"><!-- legacy default favicon (in root, 32x32) -->
    <link rel="apple-touch-icon" sizes="57x57" href="http://scotch.io/assets/img/icons/favicon-57.png"><!-- iPhone low-res and Android -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="http://scotch.io/assets/img/icons/favicon-57.png"><!-- legacy Android -->
    <link rel="apple-touch-icon" sizes="72x72" href="http://scotch.io/assets/img/icons/favicon-72.png"><!-- iPad -->
    <link rel="apple-touch-icon" sizes="114x114" href="http://scotch.io/assets/img/icons/favicon-114.png"><!-- iPhone 4 -->
    <link rel="apple-touch-icon" sizes="144x144" href="http://scotch.io/assets/img/icons/favicon-144.png"><!-- iPad hi-res -->
    
    <!-- crayons and paint -->  
    <link rel="stylesheet" href="http://scotch.io/assets/css/bootstrap.css">
    <link rel="stylesheet" href="http://scotch.io/assets/css/style.css">
    <link rel="stylesheet" href="http://scotch.io/assets/css/home-slider.css">
    
    <!-- magical wizardry -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script src="http://scotch.io/assets/js/bootstrap.min.js"></script>
    <script src="http://scotch.io/assets/js/scripts.js"></script>
    <script src="http://scotch.io/assets/js/some-plugin.js"></script>
    <script src="http://scotch.io/assets/js/home-slider.js"></script>
</head>
<!-- $body_class will always be the class name -->
<body class="home">
    
    <header>
        This came from "/views/slices/header.php"
    </header>
    
    <h1>Welcome to my website using Stencil!</h1>
    
    <section class="content">
        This content came from "/views/pages/home_view.php" <!-- This loads home_view -->
    </section>
    
    <footer>
        This is my footer!
    </footer>
 
</body>
</html>  
```

## License 
Copyright (c) 2013. scotch.io

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

## Need Help? Questions? Have a bug?
Open an issue in the Github tab. Send a pull request. Thanks.
