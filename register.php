<?php
	include "includes/header.php";

	if ($logged) {
		header('Location: ' . get_url('profile.php'));
	}	
	
	$error = get_messages('error');
	$success = get_messages('success');

	if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['pass']) && !empty($_POST['pass'])) {
		register_user($_POST);
	}
?>
	<main class="container">
		<?php include "includes/alerts.php"; ?>
		<div class="row mt-5">
			<div class="col">
				<h2 class="text-center">Регистрация</h2>
				<p class="text-center">Если у вас уже есть логин и пароль, <a href="<?php echo get_url('login.php'); ?>">войдите на сайт</a></p>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-4 offset-4">
				<form action="" method="POST">
					<div class="mb-3">
						<label for="login-input" class="form-label">Логин</label>
						<input name="login" type="text" class="form-control is-valid" id="login-input" required>
						<div class="valid-feedback">Все ок</div>
					</div>
					<div class="mb-3">
						<label for="password-input" class="form-label">Пароль</label>
						<input name="pass" type="password" class="form-control is-invalid" id="password-input" required>
						<div class="invalid-feedback">А тут не ок</div>
					</div>
					<div class="mb-3">
						<label for="password-input2" class="form-label">Пароль еще раз</label>
						<input name="pass2" type="password" class="form-control is-invalid" id="password-input2" required>
						<div class="invalid-feedback">И тут тоже не ок</div>
					</div>
					<button type="submit" class="btn btn-primary">Зарегистрироваться</button>
				</form>
			</div>
		</div>
	</main>
<?php include "includes/footer.php"; ?>
