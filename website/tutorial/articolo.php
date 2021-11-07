<?php
// Parametri url
$categoria_tutorial = explode('/', $request)[2];
$nome_tutorial = explode('/', $request)[3];

echo 'articolo: ', $nome_tutorial, '<br>';
echo 'tutorial: ', $categoria_tutorial, '<br>';