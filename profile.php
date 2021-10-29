<?php
	include "includes/profile-header.php";

	if (!$logged) {
		header('Location: ' . get_url());
	}

	$links = get_user_links($_SESSION['user']['id']);
	
	$error = get_messages('error');
	$success = get_messages('success');
?>
	<main class="container">
		<?php include "includes/alerts.php"; ?>
		<div class="row mt-5">
			<?php if (empty($links)) : ?>
			<h2 class="col">
				Ссылок пока нет! Для добавления воспользуйтесь формой выше.
			</h2>
			<?php else : ?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Ссылка</th>
						<th scope="col">Сокращение</th>
						<th scope="col">Переходы</th>
						<th scope="col">Действия</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($links as $key => $link) { ?>
						<tr>
							<th scope="row"><?php echo $key + 1; ?></th>
							<td><a href="<?php echo $link['long_link']; ?>" target="_blank"><?php echo $link['long_link']; ?></a></td>
							<td class="short-link"><?php echo get_url($link['short_link']); ?></td>
							<td><?php echo $link['views']; ?></td>
							<td>
								<a href="#" class="btn btn-primary btn-sm copy-btn" title="Скопировать в буфер" data-clipboard-text="<?php echo get_url($link['short_link']); ?>"><i class="bi bi-files"></i></a>
								<a href="<?php echo get_url('includes/edit.php?id=' . $link['id']); ?>" class="btn btn-warning btn-sm" title="Редактировать"><i class="bi bi-pencil"></i></a>
								<a href="<?php echo get_url('includes/delete.php?id=' . $link['id']); ?>" class="btn btn-danger btn-sm" title="Удалить"><i class="bi bi-trash"></i></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php endif; ?>
		</div>
	</main>
	<div aria-live="polite" aria-atomic="true" class="position-relative">
		<div class="toast-container position-absolute top-0 start-50 translate-middle-x">
			<div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="d-flex">
					<div class="toast-body">
						Ссылка скопирована в буфер
					</div>
					<button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
