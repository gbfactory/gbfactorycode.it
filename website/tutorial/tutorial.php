<?php
// Database
include('./components/database.php');

// Parametri url
$tutorial = explode('/', $request)[2];
$articolo = explode('/', $request)[3];

if (isset($tutorial) && $tutorial != "") {

    // =================================================
    // Richiesta controllo TUTORIAL
    $stmt = $conn->prepare("SELECT title, slug, description FROM guide WHERE slug = ?");
    $stmt->bind_param("s", $tutorial);
    $stmt->execute();

    $result = $stmt->get_result();

    // Controlla se esiste la playlist
    if ($result->num_rows === 0) {
        header("Location: /errore");
        die();
    }

    // Informazioni sulla playlist
    $assoc = $result->fetch_assoc();

    $tutorial_title = $assoc['title'];
    $tutorial_slug = $assoc['slug'];
    $tutorial_description = $assoc['description'];

    // Chiusura connessione
    $stmt->close();

    // =================================================
    // Richiesta controllo ARTICOLO
    if (isset($articolo) && $articolo != "") {
        $query = "SELECT * FROM articoli WHERE guide = ? AND slug = ? AND NOT chapter = 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $tutorial_slug, $articolo);
    } else {
        $query = "SELECT * FROM articoli WHERE guide = ? AND NOT chapter = 1 LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $tutorial_slug);
    }

    $stmt->execute();

    $result = $stmt->get_result();

    // Controlla se esiste l'articolo
    if ($result->num_rows === 0) {
        header("Location: /errore");
        die();
    }

    // Informazioni sull'articolo
    $assoc = $result->fetch_assoc();

    $articolo_title = $assoc['title'];
    $articolo_slug = $assoc['slug'];
    $articolo_content = $assoc['content'];

    // echo '<pre>';
    // print_r($assoc);
    // echo '</pre>';

    // Chiusura connessione
    $stmt->close();

    // return;

    // =================================================
    // Titolo pagina
    $pagina = $articolo_title;

    // Header
    include('./components/header.php');

    // Barra tutorial
    include('./website/tutorial/barra_tutorial.php');
?>

    <div id="download">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-3">
                    <ul class="list-group">
                        <?php
                        // Ottieni articoli del tutorial
                        $stmt = $conn->prepare("SELECT * FROM articoli WHERE guide = ?");
                        $stmt->bind_param("s", $tutorial_slug);
                        $stmt->execute();

                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row['chapter'] === 1) { ?>
                                    <li class="list-group-item">
                                        <h5><?= $row['title'] ?></h5>
                                    </li>
                                <?php } else { ?>
                                    <a href="/tutorial/<?= $tutorial_slug ?>/<?= $row['slug'] ?>" class="list-group-item list-group-item-action <?= $row['slug'] === $articolo_slug ? 'active' : '' ?>"><?= $row['title'] ?></a>
                            <?php }
                            }
                        } else {
                            ?>
                            <h3 class="text-center">Nessun tutorial trovato</h3>
                        <?php
                        }

                        $stmt->close();
                        ?>
                    </ul>
                </div>
                <div class="col-md-9">
                    <h1><?= $articolo_title ?></h1>
                    <p><?= $articolo_content ?></p>


                </div>
            </div>
        </div>
    </div>
<?php
} else {
    // Titolo pagina
    $pagina = 'Tutorial';

    // Header
    include('./components/header.php');

    // Barra tutorial
    include('./website/tutorial/barra_tutorial.php');

    // Tutorial
    include('./website/tutorial/home_tutorial.php');
}

include('./components/footer.php');
