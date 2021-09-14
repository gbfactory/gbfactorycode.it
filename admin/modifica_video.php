<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('LOCATION:login.php');
    die();
}

if (isset($_GET['id']) && strlen($_GET['id']) > 0) {
    $id = $_GET['id'];
} /*else {
    header("Location: list-tutorial.php");
    die();
}*/
?>
<?php $pagina = 'Modifica un Tutorial' ?>
<?php include('header.php'); ?>
<?php include('pageheader.php'); ?>

<div id="aggiungi-tutorial">
    <div class="container py-5">
        <form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <?php
            $sql = "SELECT * FROM tutorial WHERE id = " . $id;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $tutorial = $result->fetch_assoc();
            ?>

                <div class="col-md-6">
                    <label for="titolo" class="form-label">Titolo del tutorial</label>
                    <input type="text" name="titolo" id="titolo" class="form-control" value="<?= $tutorial["titolo"] ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="inputState" class="form-label">Serie</label>
                    <select name="serie" id="inputState" class="form-select form-control" required>
                        <option>Scegli...</option>
                        <?php
                        $sql = "SELECT nome, slug FROM serie";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $selected = $tutorial["serie"] === $row["slug"] ? "selected" : "";
                                echo "<option " . $selected . " value='" . $row["slug"] . "'>" . $row["nome"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="link" class="form-label">Link al video</label>
                    <input type="text" name="link" id="link" class="form-control" value="<?= $tutorial["video"] ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="date" class="form-label">Data di caricamento</label>
                    <?php
                    $data_split = explode('-', $tutorial["data"]);
                    $data = $data_split[2] . '/' . $data_split[1] . '/' . $data_split[0];
                    ?>
                    <input type="text" name="date" id="date" class="form-control" placeholder="giorno/mese/anno" value="<?= $data ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="file" class="form-label">Nome del file su AWS</label>
                    <input type="text" name="file" id="file" class="form-control" value="<?= $tutorial["file"] ?>" required>
                </div>

                <!-- <div class="col-md-12">
        <label for="file" class="form-label">File con il codice</label>
        <input type="file" name="file" id="file" class="form-control" required>
      </div> -->

                <div class="col-md-12 pt-3">
                    <button type="submit" class="btn btn-primary">Modifica Tutorial</button>
                </div>

            <?php
            }
            ?>
        </form>
    </div>

</div>
<?php include('footer.php'); ?>

<?php
$titolo = $serie = $link = $data = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // testo
    $titolo = test_input($_POST["titolo"]);
    $serie = test_input($_POST["serie"]);
    $link = substr(test_input($_POST["link"]), -11);
    $file = test_input($_POST["file"]);
    $data_split = explode('/', test_input($_POST["date"]));
    $data = $data_split[2] . '-' . $data_split[1] . '-' . $data_split[0];

    // file
    // $file_name = $_FILES['file']['name'];
    // $temp_file_location = $_FILES['file']['tmp_name'];

    // $path = './files/' . $file_name;
    // move_uploaded_file($temp_file_location, $path);

    // db
    $sql = "UPDATE tutorial SET titolo = '" . $titolo . "', video = '" . $link . "', file = '" . $file . "', data = '" . $data . "', serie = '" . $serie . "' WHERE id = " . $id;

    if ($conn->query($sql) === TRUE) {
        echo "<script>toastr.success('Tutorial aggiunto con successo.')</script>";
    } else {
        echo "<script>toastr.error('Errore durante inserimento.')</script>";
    }

    $conn->close();
}

// funzione
function test_input($data) {
    $data = trim($data);
    // $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>