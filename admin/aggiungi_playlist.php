<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('LOCATION:login.php');
  die();
}
?>
<?php $pagina = 'Aggiungi una Serie' ?>
<?php include('../components/database.php'); ?>
<?php include('../components/header.php'); ?>
<?php include('../components/pageheader.php'); ?>


<div id="aggiungi-tutorial">
  <div class="container py-5">
    <form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="col-md-6">
        <label for="titolo" class="form-label">Titolo della serie</label>
        <input type="text" name="titolo" id="titolo" class="form-control">
      </div>

      <div class="col-md-6">
        <label for="slug" class="form-label">Slug della serie</label>
        <input type="text" name="slug" id="slug" class="form-control">
      </div>

      <div class="col-md-12">
        <label for="link" class="form-label">Link alla playlist</label>
        <input type="text" name="link" id="link" class="form-control">
      </div>

      <div class="col-md-12 pt-3">
        <button type="submit" class="btn btn-primary">Aggiungi Serie</button>
      </div>
    </form>
  </div>
</div>

<?php include('../components/footer.php'); ?>

<?php
$titolo = $slug = $link = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // testo
  $titolo = test_input($_POST["titolo"]);
  $slug = test_input($_POST["slug"]);
  $link = test_input($_POST["link"]);

  $sql = "INSERT INTO serie (nome, slug, playlist) VALUES ('" . $titolo . "', '" . $slug . "', '" . $link . "')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>toastr.success('Serie aggiunta con successo.')</script>";
  } else {
    echo "<script>toastr.error('Errore durante inserimento.')</script>";
  }

  $conn->close();
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>