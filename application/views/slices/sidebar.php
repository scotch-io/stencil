<aside>
	<h2>Subpage Navigation</h2>
	<table class="table table-striped">
		<tbody>
			<tr><td><?php echo anchor('home', 'Home'); ?></td></tr>
			<tr><td><?php echo anchor('home/subpage', 'Subpage Example'); ?></td></tr>
			<tr><td><?php echo anchor('http://scotch.io/development/stencil', 'Docs', array('target' => '_blank')); ?></td></tr>
			<tr><td><?php echo anchor('http://github.com/scotch-io/stencil', 'Github', array('target' => '_blank')); ?></tr>
			<tr><td><?php echo anchor('http://scotch.io/about', 'Contact', array('target' => '_blank')); ?></tr>
			<tr><td><?php echo anchor('terms-of-service', 'License'); ?></tr>
			<tr><td><?php echo anchor('404', '404 Page'); ?></tr>
		</tbody>
	</table>
</aside>