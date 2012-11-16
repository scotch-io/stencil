	
	<!-- Meta -->
	<meta charset="utf-8">
	<title><?php if (!empty($title)) echo $title.' | Stencil by Scotch'; ?></title>
	<?php echo view_port(); ?>
	<?php echo chrome_frame(); ?>
	<?php echo apple_mobile('black-translucent'); ?>
	<?php echo $meta; ?>

	<!-- Icons -->
	<?php echo windows_tile(array('name' => 'Stencil by Scotch.io', 'image' => base_url().'/assets/img/icons/tile.png', 'color' => 'black')); ?>
	<?php echo favicons(); ?>

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/reset.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	<?php echo $css; ?>

	<!-- JS -->
	<?php echo jquery('1.8.2'); ?>
	<?php echo shiv(); ?>
	<script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
	<?php echo $js; ?>
