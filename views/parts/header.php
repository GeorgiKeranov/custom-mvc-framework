<!DOCTYPE html>
<html>
	<head>
		<title>MVC Framework</title>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="resources/css/bootstrap.min.css">
	</head>

	<body>
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="<?php echo HOME_URL ?>">Navbar</a>
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<?php if ($params['user_authenticated']) : ?>
							<li class="nav-item">
								<a class="nav-link" href="users">Users</span></a>
							</li>

							<li class="nav-item">
								<form action="logout" method="POST">
									<input class="nav-link" type="submit" value="Logout">
								</form>
							</li>
						<?php else : ?>
							<li class="nav-item">
								<a class="nav-link" href="login">Login</span></a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="register">Register</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</nav>
		</header>

		<main>