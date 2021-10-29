<?php
    include "config.php";
    include "functions.php";
    if (isset($_POST['link']) && !empty($_POST['link']) && $logged) {
        if (add_link($_POST['link'])) {
            $_SESSION['success'] = 'Ссылка добавлена!';
        } else {
            $_SESSION['error'] = 'Что-то пошло не так!';
        }
	}
    header('Location: ' . get_url('profile.php'));