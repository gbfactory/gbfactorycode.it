<?php
// Database
include('./components/database.php');

// Parametri url
$codice_file = explode('/', $request)[2];

// Richiesta sql
$stmt = $conn->prepare("SELECT nome_file FROM file WHERE id = ?");
$stmt->bind_param("s", $codice_file);
$stmt->execute();

$result = $stmt->get_result();

// Controlla se esiste il file
if ($result->num_rows === 0) {
    header("Location: /errore");
    die();
}

// Nome del file
$nome_file = $result->fetch_assoc()["nome_file"];

// Titolo pagina
$pagina = 'Download > ' . $nome_file;

// Header
include('./components/header.php');

// Testata
include('./components/pageheader.php');

// Chiusura connessione
$stmt->close();
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

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9049796387311792" crossorigin="anonymous"></script>
        <!-- Download Singolo -->
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9049796387311792" data-ad-slot="9670237854" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div>

<?php include('./components/footer.php'); ?>