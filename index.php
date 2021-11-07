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
    
    case 'errore':
        require './website/pagine/error.php';
        break;
            
    case 'privacy':
        require './website/pagine/privacy.php';
        break;
            
    case 'cookie':
        require './website/pagine/cookie.php';
        break;

    // Sezione download
    case 'playlist':
        require './website/download/playlist.php';
        break;

    case 'download':
        require './website/download/download.php';
        break;

    // Sezione tutorial
    case 'tutorial':
        require './website/tutorial/tutorial.php';
        break;

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
        require './website/pagine/error.php';
        break;
}
