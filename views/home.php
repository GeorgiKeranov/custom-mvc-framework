<div class="container mt-5">
	<?php if ($params['user_authenticated']) : ?>
		<h1>Hello, you can check all of the users from <a href="users">here</a></h1>
	<?php else : ?>
		<h1>Hello, please log in to view all of the users!</h1>
	<?php endif; ?>
</div><!-- /.container -->