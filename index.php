<?php
$request = $_SERVER['REQUEST_URI'];

switch (explode('/', $request)[1]) {
    case '/':
        require './home.php';
        break;

    case '':
        require './home.php';
        break;

    case 'playlist':
        require './playlist.php';
        break;

    case 'download':
        require './download.php';
        break;

    // Admin panel

    case 'login':
        require './admin/login.php';
        break;

    case 'logout':
        require './admin/logout.php';
        break;

    case 'admin':
        require './admin/admin.php';
        break;






    default:
        require './errore.php';
        break;
}
