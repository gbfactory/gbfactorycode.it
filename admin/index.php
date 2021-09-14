<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: /login');
    die();
}
?>

<?php $pagina = 'Admin' ?>
<?php include('../components/database.php'); ?>
<?php include('../components/header.php'); ?>
<?php include('../components/pageheader.php'); ?>

<style>
    .icon-square {
        font-size: 25px;
    }
</style>

<div class="container px-4 py-5">
    <h2>Gestione Video</h2>
    <hr>

    <div class="row">
        <div class="col d-flex align-items-start">
            <div class="icon-square text-dark flex-shrink-0 me-3">
                <i class="fas fa-film"></i>
            </div>
            <div>
                <h2>Video</h2>
                <p>Video caricato su YouTube con annesso download del codice.</p>
                <a href="./aggiungi_video.php" class="btn btn-primary">
                    Aggiungi Video
                </a>
                <a href="./gestione_video.php" class="btn btn-primary">
                    Gestione Video
                </a>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <div class="icon-square text-dark flex-shrink-0 me-3">
                <i class="fas fa-list"></i>
            </div>
            <div>
                <h2>Playlist</h2>
                <p>Playlist di YouTube per raggruppare i video.</p>
                <a href="./aggiungi_playlist.php" class="btn btn-primary">
                    Aggiungi Playlist
                </a>
                <a href="./gestione_playlist.php" class="btn btn-primary">
                    Gestione Playlist
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container px-4 py-5">
    <h2>Gestione Tutorial</h2>
    <hr>

    <div class="row">
        <div class="col d-flex align-items-start">
            <div class="icon-square text-dark flex-shrink-0 me-3">
                <i class="fas fa-film"></i>
            </div>
            <div>
                <h2>Articolo</h2>
                <!-- <p>Aggiungi un video tutorial singolo.</p>
        <a href="./add-tutorial.php" class="btn btn-primary">
          Aggiungi un Tutorial
        </a>
        <a href="./list-tutorial.php" class="btn btn-primary">
          Elenco Tutorial
        </a> -->
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <div class="icon-square text-dark flex-shrink-0 me-3">
                <i class="fas fa-list"></i>
            </div>
            <div>
                <h2>Tutorial</h2>
                <!-- <p>Aggiungi una serie, ovvero una playlist di tutorial.</p>
        <a href="./add-serie.php" class="btn btn-primary">
          Aggiungi una Serie
        </a> -->
            </div>
        </div>
    </div>
</div>

<?php include('../components/footer.php'); ?>