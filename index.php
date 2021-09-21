<?php
$request = $_SERVER['REQUEST_URI'];

switch (explode('/', $request)[1]) {
    // Index
    case '/':
        require './website/pagine/home.php';
        break;

    case '':
        require './website/pagine/home.php';
        break;

    // Sezione download
    case 'playlist':
        require './website/download/playlist.php';
        break;

    case 'download':
        require './website/download/download.php';
        break;

    // Sezione tutorial

    // Sezione pagine
    case 'contatti':
        require './website/pagine/contatti.php';
        break;

    // Sezione admin
    case 'login':
        require './admin/login.php';
        break;

    case 'logout':
        require './admin/logout.php';
        break;

    case 'admin':
        require './admin/admin.php';
        break;

    // Errore
    default:
        require './errore.php';
        break;
}
