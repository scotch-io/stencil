<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>
	<?php echo $head; ?>
</head>
<body class="<?php echo $body_class; ?>">

	<header>
		<?php echo $header; ?>
	</header>

	<div class="container" style="margin-top: 100px;">
		<section class="row">
			<div class="span8">
				<?php echo $content; ?>
			</div>
			<div class="span4">
				<?php echo $sidebar; ?>
			</div>
		</section>
	</div>

	<hr>

	<footer class="container">
		<p>&copy; scotch.io 2013</p>
	</footer>

</body>
</html>