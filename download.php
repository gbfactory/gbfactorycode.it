<?php
// Database
include('./components/database.php');

// Parametri url
$tutorial = explode('/', $request)[2];

// Richiesta sql
$sql = "SELECT nome FROM serie WHERE slug = '" . $tutorial . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $nomeTutorial = $row = $result->fetch_assoc()["nome"];
} else {
    header("Location: /");
    die();
}

// Titolo pagina
$pagina = $nomeTutorial;

// Header
include('./components/header.php');

// Testata
include('./components/pageheader.php');
?>

<div id="download">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-5">

                <?php
                $sql = "SELECT titolo, video, file, data FROM tutorial WHERE serie = '" . $tutorial . "'";
                $result = $conn->query($sql);
                $i = 1;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
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
                                        <a href="https://<?= $_SERVER['HTTP_HOST'] ?>/get/<?= $row["file"] ?>" class="btn btn-download" id="downloadr"><i class="fas fa-download"></i> Download codice</a>
                                        <button type="button" class="js-modal-btn btn btn-create" data-video-id="<?= $row["video"] ?>"><i class="fab fa-youtube"></i> Guarda il video</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $i++;
                    }
                } else {
                    ?>
                    <h1 class="text-center">Nessun tutorial trovato</h1>
                <?php
                }
                ?>
<!-- http://adfoc.us/serve/sitelinks/?id=678636&url= -->
            </div>
        </div>
    </div>
</div>

<?php include('./components/footer.php'); ?>