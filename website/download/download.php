<?php
// Database
include('./components/database.php');

// Parametri url
$codice_file = explode('/', $request)[2];

// Richiesta sql
$sql = "SELECT nome_file FROM file WHERE id = '" . $codice_file . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $nome_file = $result->fetch_assoc()["nome_file"];
} else {
    header("Location: /");
    die();
}

// Titolo pagina
$pagina = 'Download > ' . $nome_file;

// Header
include('./components/header.php');

// Testata
include('./components/pageheader.php');
?>

<div id="file">
    <div class="container">
        <div class="card my-5 py-2">
            <div class="card-body text-center">
                <h5 class="card-title mb-4">
                    <i class="fas fa-download"></i> Stai scaricando <?= $nome_file ?>
                </h5>
                <a href="https://<?= $_SERVER['HTTP_HOST'] ?>/website/download/get_file.php?nomeFile=<?= $nome_file ?>&codiceFile=<?= $codice_file ?>" class="btn btn-download" id="downloadr"><i class="fa fa-download fa-fw" aria-hidden="true"></i> Download</a>
            </div>
        </div>
    </div>
</div>

<?php include('./components/footer.php'); ?>