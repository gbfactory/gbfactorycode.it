<?php
session_start();
echo isset($_SESSION['login']);
if (isset($_SESSION['login'])) {
    header('Location: /admin');
    die();
}
?>

<?php $pagina = 'Login' ?>
<?php include('./components/database.php'); ?>
<?php include('./components/credenziali.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === $credenziali_nome_utente && $password === $credenziali_password) {
        $_SESSION['login'] = true;
        header('Location: /admin');
        die();
    } {
        echo "<div class='alert alert-danger'>Nome utente o password errati!</div>";
    }
}
?>

<?php include('./components/header.php'); ?>
<?php include('./components/pageheader.php'); ?>

<div id="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="" method="post" class="my-5">
                    <div class="form-group mb-2">
                        <label for="username">Nome utente</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pwd">Password</label>
                        <input type="password" class="form-control" id="pwd" name="password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-lg px-4">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('./components/footer.php'); ?>