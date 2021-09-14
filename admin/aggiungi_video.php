<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('LOCATION:login.php');
    die();
}
?>

<?php $pagina = 'Aggiungi un Tutorial' ?>
<?php include('../components/database.php'); ?>
<?php include('../components/header.php'); ?>
<?php include('../components/pageheader.php'); ?>

<div id="aggiungi-tutorial">
    <div class="container py-5">
        <form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="titolo" class="form-label">Titolo del tutorial</label>
                <input type="text" name="titolo" id="titolo" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="inputState" class="form-label">Serie</label>
                <select name="serie" id="inputState" class="form-select form-control" required>
                    <option selected>Scegli...</option>
                    <?php
                    $sql = "SELECT nome, slug FROM serie";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["slug"] . "'>" . $row["nome"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-6">
                <label for="link" class="form-label">Link al video</label>
                <input type="text" name="link" id="link" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="date" class="form-label">Data di caricamento</label>
                <input type="text" name="date" id="date" class="form-control" placeholder="giorno/mese/anno" required>
            </div>

            <div class="col-md-12">
                <label for="file" class="form-label">File con il codice (<b>.zip</b>)</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>

            <div class="col-md-12 pt-3">
                <button type="submit" class="btn btn-primary">Aggiungi Tutorial</button>
            </div>
        </form>
    </div>

</div>
<?php include('../components/footer.php'); ?>

<?php
$titolo = $serie = $link = $data = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // testo
    $titolo = test_input($_POST["titolo"]);
    $video = substr(test_input($_POST["link"]), -11);
    $file = test_input($_POST["file"]);
    $data_split = explode('/', test_input($_POST["date"]));
    $data = $data_split[2] . '-' . $data_split[1] . '-' . $data_split[0];
    $serie = test_input($_POST["serie"]);
    
    // file
    $file_name = $_FILES['file']['name'];
    $file_md5 = md5($file_name);

    $temp_file_location = $_FILES['file']['tmp_name'];

    $path = '../uploads/' . $file_md5;
    move_uploaded_file($temp_file_location, $path);

    // db
    $sql = "INSERT INTO tutorial (titolo, video, file, data, serie) VALUES ('" . $titolo . "', '" . $video . "', '" . $file_md5 . "', '" . $data . "', '" . $serie . "')";
    $sql_file = "INSERT INTO file (id, nome_file) VALUES ('".$file_md5."', '".$file_name."')";
    
    if ($conn->query($sql) === TRUE && $conn->query($sql_file)) {
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