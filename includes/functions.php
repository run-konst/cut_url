<?php

include "config.php";

function get_url($page = '') {
    return HOST . "/$page";
}

function db() {
    try {
        return new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME . "; charset=utf8", DB_USER, DB_PASS, [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    } catch(PDOException $e) {
        die($e->getMessage());
    }
}

function db_query($sql = '', $exec = false) {
    if(empty($sql)) return false;
    if ($exec) {
        return db() -> exec($sql);
    }
    return db() -> query($sql);
}

function get_user_count() {
    return db_query("SELECT COUNT(id) FROM `users`;") -> fetchColumn();
}

function get_links_count() {
    return db_query("SELECT COUNT(id) FROM `links`;") -> fetchColumn();
}

function get_views_count() {
    return db_query("SELECT SUM(views) FROM `links`;") -> fetchColumn();
}

function get_link($url) {
    if(empty($url)) return [];
    return db_query("SELECT * FROM `links` WHERE `short_link` = '$url';") -> fetch();
}

function get_user($user) {
    if(empty($user)) return [];
    return db_query("SELECT * FROM `users` WHERE `login` = '$user';") -> fetch();
}

function update_views($url) {
    if(empty($url)) return false;
    return db_query("UPDATE `links` SET `views` = `views` + 1 WHERE `short_link` = '$url';", true);
}

function add_user($login, $pass) {
    $password = password_hash($pass, PASSWORD_DEFAULT);
    return db_query("INSERT INTO `users` (`id`, `login`, `pass`) VALUES (NULL, '$login', '$password');", true);
}

function get_messages($str) {
    $$str = '';
	if (isset($_SESSION[$str]) && !empty($_SESSION[$str])) {
		$$str = $_SESSION[$str];
		$_SESSION[$str] = '';
	}
    return $$str;
}

function register_user($auth_data) {

    if(empty($auth_data) || !isset($auth_data['login']) || empty($auth_data['login']) || !isset($auth_data['pass']) || !isset($auth_data['pass2'])) return false;
    
    $user = get_user($auth_data['login']);
    if (!empty($user)) {
        $_SESSION['error'] = 'Пользователь ' . $auth_data['login'] . ' уже существует!';
        header('Location: ' . get_url('register.php'));
        die;
    }
    if ($auth_data['pass'] !== $auth_data['pass2']) {
        $_SESSION['error'] = 'Пароли не совпадают!';
        header('Location: ' . get_url('register.php'));
        die;
    }

    if(add_user($auth_data['login'], $auth_data['pass'])) {
        $_SESSION['success'] = 'Регистрация прошла успешно!';
        header('Location: ' . get_url('login.php'));
        die;
    }

    return true;
}

function login($auth_data) {

    if(empty($auth_data) || !isset($auth_data['login']) || empty($auth_data['login']) || empty($auth_data['pass']) || !isset($auth_data['pass']))
    {
        $_SESSION['error'] = 'Логин или пароль не могут быть пустыми!';
        header('Location: ' . get_url('login.php'));
        die;
    }
    
    $user = get_user($auth_data['login']);
    if (empty($user)) {
        $_SESSION['error'] = 'Логин или пароль неверен!';
        header('Location: ' . get_url('login.php'));
        die;
    }

    if (password_verify($auth_data['pass'], $user['pass'])) {
        $_SESSION['user'] = $user;
        header('Location: ' . get_url('profile.php'));
        $_SESSION['success'] = 'Здрасте!';
        die;
    } else {
        $_SESSION['error'] = 'Пароль неверен!';
        header('Location: ' . get_url('login.php'));
        die;
    }

    return true;
}

function get_user_links($user_id) {
    if (empty($user_id)) return [];
    return db_query("SELECT * FROM `links` WHERE `user_id` = $user_id;")->fetchAll();
}

function delete_link($id) {
    if (empty($id)) return false;
    return db_query("DELETE FROM `links` WHERE `id` = $id;", true);
}

function generate_short_link() {
    $link = '';
    for ($i = 0; $i < 6; $i++) {
        $link .= substr(str_shuffle(CHARS), 0, 1);
    }
    return $link;
}

function add_link($link) {
    $user = $_SESSION['user']['id'];
    $short_link = generate_short_link();
    if (empty($link)) return false;
    return db_query("INSERT INTO `links` (`id`, `user_id`, `long_link`, `short_link`, `views`) VALUES (NULL, '$user', '$link', '$short_link', '0');", true);
}