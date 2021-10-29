<?php
    include "config.php";
    include "functions.php";
    if (!isset($_POST['new_link']) || empty($_POST['new_link']) || !$logged) {
		header('Location: ' . get_url('profile.php'));
        die;
	}
    edit_link($_POST['new_link_id'], $_POST['new_link']);
    header('Location: ' . get_url('profile.php'));