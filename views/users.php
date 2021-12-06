<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Username</th>
				<th scope="col">Email</th>
				<th scope="col">Date Created</th>
			</tr>
		</thead>

		<?php if (!empty($params['users'])) : ?>
			<tbody>
				<?php foreach ($params['users'] as $user) : ?>
					<tr>
						<?php foreach ($user as $column => $value) : ?>
							<td><?php echo $value ?></td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		<?php endif; ?>
	</table>
</div><!-- /.container -->