<?php
    include "header.php";
    if (!isset($_GET['id']) || empty($_GET['id']) || !$logged) {
        header('Location: ' . get_url('profile.php'));
	}
    $id = $_GET['id'];
    $link = db_query("SELECT * FROM `links` WHERE `id` = $id;")->fetch();

	$error = get_messages('error');
	$success = get_messages('success');
?>
    <main class="container">
        <div class="row mt-3">
			<div class="col-4 offset-4">
				<form action="edit-link.php" method="POST">
					<div class="mb-3">
						<label for="login-input" class="form-label">Редактировать ссылку</label>
						<input name="new_link" type="text" class="form-control" id="login-input" value="<?php echo $link['long_link']; ?>" required>
                        <input name="new_link_id" type="hidden" value="<?php echo $id; ?>">
					</div>
					<button type="submit" class="btn btn-primary">Пыщь!</button>
				</form>
			</div>
		</div>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>