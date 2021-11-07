<?php
// Database
include('./components/database.php');

// Parametri url
$tutorial = explode('/', $request)[2];

// Richiesta sql per controllare se la playlist esiste
$stmt = $conn->prepare("SELECT nome FROM serie WHERE slug = ?");
$stmt->bind_param("s", $tutorial);
$stmt->execute();

$result = $stmt->get_result();

// Controlla se esiste la playlist
if ($result->num_rows === 0) {
    header("Location: /errore");
    die();
}

// Nome della playlist
$nomeTutorial = $result->fetch_assoc()["nome"];

// Titolo pagina
$pagina = $nomeTutorial;

// Header
include('./components/header.php');

// Testata
include('./components/pageheader.php');

// Chiusura connessione
$stmt->close();
?>

<div id="download">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-5">

                <?php
                // Ottieni tutti i video con playlist attuale
                $stmt = $conn->prepare("SELECT titolo, video, file, data FROM tutorial WHERE serie = ?");
                $stmt->bind_param("s", $tutorial);
                $stmt->execute();

                $result = $stmt->get_result();

                // Contatore episodi
                $i = 1;

                // Controlla se ci sono episodi
                if ($result->num_rows > 0) {
                    // Ciclo di visualizzazione episodi
                    while ($row = $result->fetch_assoc()) {
                        // Formattazione data
                        $ds = explode('-', $row["data"]);
                ?>
                        <div class="card shadow-sm mb-4 p-4 download">
                            <div class="row">
                                <div class="col-sm-2 text-center divider">
                                    <span>Episodio</span>
                                    <h2><?= $i ?></h2>
                                </div>
                                <div class="col-sm-3 text-center divider">
                                    <span>Titolo</span>
                                    <h3><?= $row["titolo"] ?></h3>
                                </div>
                                <div class="col-sm-3 text-center divider">
                                    <span>Data</span>
                                    <h3><?= $ds[2] . '/' . $ds[1] . '/' . $ds[0] ?></h3>
                                </div>
                                <div class="col-sm-4 d-flex align-items-center justify-content-center">
                                    <div class="btn-group" role="group" aria-label="downloadandcreate">
                                        <a href="http://adfoc.us/serve/sitelinks/?id=678636&url=https://<?= $_SERVER['HTTP_HOST'] ?>/download/<?= $row["file"] ?>" class="btn btn-download" id="downloadr"><i class="fas fa-download"></i> Download codice</a>
                                        <button type="button" class="js-modal-btn btn btn-create" data-video-id="<?= $row["video"] ?>"><i class="fab fa-youtube"></i> Guarda il video</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($i % 5 == 0) { ?>
                            <div class="card shadow-sm mb-4 p-4 download">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9049796387311792" crossorigin="anonymous"></script>
                                <!-- Download Lista -->
                                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9049796387311792" data-ad-slot="4473751491" data-ad-format="auto" data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                    <?php
                        }

                        $i++;
                    }
                } else {
                    ?>
                    <h1 class="text-center">Nessun tutorial trovato</h1>
                <?php
                }

                // Chiude connessione
                $stmt->close()
                ?>

            </div>
        </div>
    </div>
</div>

<?php include('./components/footer.php'); ?>