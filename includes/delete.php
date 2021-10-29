<?php
    include "config.php";
    include "functions.php";
    if (!isset($_GET['id']) || empty($_GET['id'])) {
		header('Location: ' . get_url('profile.php'));
        die;
	}

    delete_link($_GET['id']);
    $_SESSION['success'] = 'Ссылка удалена!';
    header('Location: ' . get_url('profile.php'));
    die;