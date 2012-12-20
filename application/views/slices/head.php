	
	<!-- robot speak -->	
	<meta charset="utf-8">
	<title><?php if (isset($title)) echo $title.' | '; ?> Stencily by Scotch.io</title>
	<?php echo chrome_frame(); ?>
	<?php echo view_port(); ?>
	<?php echo apple_mobile('black-translucent'); ?>
	<?php echo $meta; ?>
	
	<!-- icons and icons and icons and icons and icons and a tile -->
	<?php echo windows_tile(array('name' => 'Stencil by Scotch.io', 'image' => base_url().'/assets/img/icons/tile.png', 'color' => 'black')); ?>
	<?php echo favicons(); ?>

	<!-- crayons and paint -->	
	<?php echo add_css(array('reset', 'style')); ?>
	<?php echo $css; ?>
	
	<!-- magical wizardry -->
	<?php echo jquery('1.8.2'); ?>
	<?php echo shiv(); ?>
	<?php echo add_js('scripts'); ?>
	<?php echo $js; ?>
