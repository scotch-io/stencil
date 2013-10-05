<!-- robot speak -->	
<meta charset="utf-8">
<title><?php if (!empty($title)) echo $title.' | '; ?> Stencil by Scotch.io</title>
<?php echo chrome_frame(); ?>
<?php echo view_port(); ?>
<?php echo apple_mobile('black-translucent'); ?>
<?php echo $meta; ?>

<!-- icons and icons and icons and icons and icons and a tile -->
<?php echo windows_tile(array('name' => 'Stencil', 'image' => base_url().'/assets/img/icons/tile.png', 'color' => '#4eb4e5')); ?>
<?php echo favicons(); ?>

<!-- crayons and paint -->	
<?php echo add_css(array('bootstrap', 'bootstrap-responsive', 'style')); ?>
<?php echo $css; ?>

<!-- magical wizardry -->
<?php echo jquery('1.9.1'); ?>
<?php echo shiv(); ?>
<?php echo add_js(array('bootstrap.min', 'scripts')); ?>
<?php echo $js; ?>