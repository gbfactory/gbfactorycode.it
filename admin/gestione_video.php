<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('LOCATION:login.php');
    die();
}
?>

<?php $pagina = 'Gestione Video' ?>
<?php include('../components/database.php'); ?>
<?php include('../components/header.php'); ?>
<?php include('../components/pageheader.php'); ?>

<?php
$serie = [];
$serie_nome = [];

$sql = "SELECT nome, slug FROM serie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        array_push($serie, $row);
        $serie_nome[$row['slug']] = $row['nome'];
    }
}
?>

<div id="lista-tutorial">
    <div class="container py-5">
        <div class="card mb-3 d-flex">
            <input type="text" name="" id="ricerca-titolo">
            <select name="serie" id="inputState" class="form-select form-control" required>
                <option selected>Scegli...</option>
                <?php
                foreach ($serie as $row) {
                    echo "<option value='" . $row["slug"] . "'>" . $row["nome"] . "</option>";
                }
                ?>
            </select>
        </div>

        <ol id="lista-video" class="list-group list-group-numbered">
            <?php
            $sql = "SELECT * FROM tutorial";
            $result = $conn->query($sql);
            $i = 1;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ds = explode('-', $row["data"]);
            ?>
                    <li data-serie="<?= $row["serie"] ?>" data-titolo="<?= $row["titolo"] ?>" class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?= $row["titolo"] ?></div>
                            <span class="badge bg-primary rounded-pill"><?= $serie_nome[$row["serie"]] ?></span>
                        </div>
                        <a href="./modifica_tutorial.php?id=<?= $row["id"] ?>" class="btn btn-primary btn-sm me-2">Modifica tutorial</a>
                        <button id="conferma-elimina" data-id="<?= $row["id"] ?>" class="btn btn-danger btn-sm">Elimina tutorial</button>
                    </li>
                <?php
                    $i++;
                }
            } else {
                ?>
                <h1 class="text-center">Nessun tutorial trovato</h1>
            <?php
            }
            ?>

        </ol>

    </div>
</div>

<?php include('../components/footer.php'); ?>