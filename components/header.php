<?php
// Config
$link_youtube = 'https://www.youtube.com/channel/UCO8qGdzY_vZuBzri8bC7dOQ';
$link_discord = 'https://discord.gg/rHk3hgqU5t';

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <title><?= $pagina ?> | GB Factory Code</title>
    <meta name="description" content="Nuovi tutorial di programmazione su moltissimi argomenti!">
    <meta name="keywords" content="gb factory, gb factory code, tutorial, programmazione, discord.js, bot discord, java swing, plugin minecraft, corsi programmazione, tutorial programmazione">
    <meta name="author" content="GB Factory">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:site_name" content="GB Factory Code">
    <meta property="og:title" content="<?= $pagina ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:description" content="Nuovi tutorial di programmazione su moltissimi argomenti!">
    <meta property="og:image" content="">
    <meta property="og:locale" content="it_IT">

    <link rel="manifest" href="https://<?= $_SERVER['HTTP_HOST'] ?>/site.webmanifest">
    <link rel="apple-touch-icon" href="https://<?= $_SERVER['HTTP_HOST'] ?>/icon.png">
    <link rel="icon" href="https://<?= $_SERVER['HTTP_HOST'] ?>/favicon.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-usVBAd66/NpVNfBge19gws2j6JZinnca12rAe2l+d+QkLU9fiG02O1X8Q6hepIpr/EYKZvKx/I9WsnujJuOmBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://<?= $_SERVER['HTTP_HOST'] ?>/assets/css/modal-video.min.css" rel="stylesheet">
    <link href="https://<?= $_SERVER['HTTP_HOST'] ?>/assets/css/style.css" rel="stylesheet">

    <?php if ($pagina === 'Aggiungi un Tutorial' || $pagina === 'Modifica un Tutorial') { ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php } ?>

    <meta name="theme-color" content="#ffca26" />
</head>

<body>
    <section id="navbar">
        <nav class="navbar navbar-light navbar-default navbar-expand-md navbar-dark justify-content-center py-4" style="transition: all .3s;">
            <div class="container">
                <a href="/">
                    <img src="https://<?= $_SERVER['HTTP_HOST'] ?>/assets/img/logo_wide_1.jpg" alt="logo" class="logo rounded">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3" aria-label="Navigazione">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
                    <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Download
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                $sql = "SELECT nome, slug FROM serie";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<li><a class="dropdown-item" href="https://' . $_SERVER['HTTP_HOST']  . '/playlist/' . $row["slug"] . '">' . $row["nome"] . '</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tutorial
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                $sql = "SELECT title, slug FROM guide";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<li><a class="dropdown-item" href="https://' . $_SERVER['HTTP_HOST']  . '/playlist/' . $row["slug"] . '">' . $row["title"] . '</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="https://<?= $_SERVER['HTTP_HOST'] ?>/contatti">Contatti</a></li>

                        <a href="<?= $link_discord ?>" class="btn btn-discord ms-3"><i class="fab fa-discord me-1"></i> Discord</a>
                    </ul>
                </div>
            </div>
        </nav>
    </section>