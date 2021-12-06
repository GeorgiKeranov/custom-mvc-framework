<div class="container mt-5">
	<?php if (!empty($params['registered'])) : ?>
		<div class="alert alert-success" role="alert">
			You have been registered successfully, you will have to log in now!
		</div>
	<?php endif; ?>

	<?php if (!empty($params['errors']['error'])) : ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $params['errors']['error'] ?>
		</div>
	<?php endif; ?>

	<form method="POST">
		<div class="form-group">
			<?php $is_username_error = !empty($params['errors']['username']); ?>

			<label for="exampleInputUsername">Username</label>
			<input type="username" name="username" class="form-control<?php echo $is_username_error ? ' is-invalid' : '' ?>" id="exampleInputUsername" aria-describedby="usernameHelp" placeholder="Username" value="<?php echo !empty($params['username']) ? $params['username'] : '' ?>">

			<?php if ($is_username_error) : ?>
				<div class="invalid-feedback">
					<?php echo $params['errors']['username']; ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="form-group">
			<?php $is_password_error = !empty($params['errors']['password']); ?>

			<label for="exampleInputPassword1">Password</label>
			<input type="password" name="password" class="form-control<?php echo $is_password_error ? ' is-invalid' : '' ?>" id="exampleInputPassword1" placeholder="Password">

			<?php if ($is_password_error) : ?>
				<div class="invalid-feedback">
					<?php echo $params['errors']['password']; ?>
				</div>
			<?php endif; ?>
		</div>
		
		<button type="submit" class="btn btn-primary">Login</button>
	</form>
</div><!-- /.login-form -->