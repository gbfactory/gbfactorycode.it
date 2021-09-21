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

<div id="lista-tutorial">
    <div class="container py-5">
        <ol class="list-group list-group-numbered">

            <?php
            $sql = "SELECT * FROM tutorial";
            $result = $conn->query($sql);
            $i = 1;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ds = explode('-', $row["data"]);
            ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?= $row["titolo"] ?></div>
                            <span class="badge bg-primary rounded-pill"><?= $row["serie"] ?></span>
                        </div>
                        <a href="./edit-tutorial.php?id=<?= $row["id"] ?>" class="btn btn-primary btn-sm me-2">Modifica tutorial</a>
                        <a href="" class="btn btn-danger btn-sm">Elimina tutorial</a>
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

<?php include('footer.php'); ?>