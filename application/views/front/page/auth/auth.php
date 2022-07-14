<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign In/Sign Up</title>

	<link rel="stylesheet" href="<?= base_url('assets/front/front-login/css/')?>style.css">
</head>
<body>
	<div class="form-structor">

		<div class="signup">
			<h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
			<form action="<?= site_url('front/Auth/signup')?>" method="post">
				<div class="form-holder">
					<input type="text" name="name" class="input" placeholder="Name" />
					<input type="email" name="email" class="input" placeholder="Email" />
					<input type="password" name="password" class="input" placeholder="Password" />
				</div>
			<button class="submit-btn" type="submit">Sign up</button>
			</form>
		</div>


		<div class="login slide-up">
			<div class="center">
				<h2 class="form-title" id="login"><span>or</span>Log in</h2>
				<form action="<?= site_url('front/Auth/signin')?>" method="post">
					<div class="form-holder">
						<input type="email" name="email" class="input" placeholder="Email" />
						<input type="password" name="password" class="input" placeholder="Password" />
					</div>
					<button class="submit-btn">Log in</button>
				</form>
				
			</div>
		</div>
	</div>
	<?php
		if ($this->session->userdata("message")) {
			$msg = $this->session->userdata("message");
			echo "
			<script>
				alert('".$msg."');
			</script>
			";
		}
	?>
	
	<script src="<?= base_url('assets/front/front-login/js/')?>main.js"></script>
</body>
</html>
