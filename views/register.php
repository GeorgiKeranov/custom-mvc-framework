<div class="container mt-5">
	<form method="POST">
		<div class="form-row">
			<div class="form-group col-md-6">
				<?php $is_username_error = !empty($params['errors']['username']); ?>

				<label for="inputUsername">Username</label>
				<input type="text" name="username" class="form-control<?php echo $is_username_error ? ' is-invalid' : '' ?>" id="inputUsername" placeholder="Username" value="<?php echo !empty($params['username']) ? $params['username'] : '' ?>">

				<?php if ($is_username_error) : ?>
					<div class="invalid-feedback">
						<?php echo $params['errors']['username']; ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="form-group col-md-6">
				<?php $is_password_error = !empty($params['errors']['password']); ?>

				<label for="inputPassword4">Password</label>
				<input type="password" name="password" class="form-control<?php echo $is_password_error ? ' is-invalid' : '' ?>" id="inputPassword4" placeholder="Password">

				<?php if (!empty($params['errors']['password'])) : ?>
					<div class="invalid-feedback">
						<?php echo $params['errors']['password']; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="form-group">
			<?php $is_email_error = !empty($params['errors']['email']); ?>

			<label for="inputEmail4">Email</label>
			<input type="email" name="email" class="form-control<?php echo $is_email_error ? ' is-invalid' : '' ?>" id="inputEmail4" placeholder="Email"  value="<?php echo !empty($params['email']) ? $params['email'] : '' ?>">

			<?php if (!empty($params['errors']['email'])) : ?>
				<div class="invalid-feedback">
					<?php echo $params['errors']['email']; ?>
				</div>
			<?php endif; ?>
		</div>

		<button type="submit" class="btn btn-primary">Sign in</button>
	</form>
</div><!-- /.register-form -->
