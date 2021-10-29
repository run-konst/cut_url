<?php
    define('SITE_NAME', 'Cut your URL');
    define('HOST', 'http://' . $_SERVER['HTTP_HOST']);

    const DB_HOST = '127.0.0.1';
    const DB_NAME = 'cut_url';
    const DB_USER = 'root';
    const DB_PASS = '';
    const CHARS = 'qwertyuiopasdfghjklzxcvbnm1234567890-';

    session_start();
    
	$logged = isset($_SESSION['user']['id']);
    