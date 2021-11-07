<?php
$inviato = false;

// Elaborazione form
if (isset($_POST['submit'])) {
    $to = "info@gbfactory.net";
    $oggetto = $_POST['oggetto'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $messaggio = $_POST['messaggio'];

    // Invia email
    $messaggio_admin = "
        ======================
        Nome: $nome
        Email: $email
        Oggetto: $oggetto
        ======================

        $messaggio
    ";
    mail('info@gbfactory.net', 'Modulo di Contatto', $messaggio_admin, "From: $nome <$email>");

    // Invia mail all'utente
    $messaggio_utente = "
        Ciao $nome,
        grazie per aver contattato GB Factory Code, ti risponderemo il prima possibile.
        Intanto ecco una copia del messaggio che hai inviato attraverso il modulo:

        $messaggio

        <hr>
        <a href='https://www.gbfactorycode.it/'>gbfactorycode.it</a>
    ";

    mail($email, 'Modulo di Contatto', $messaggio, "From: GB Factory Code <info@gbfactory.net>");

    // Mostra conferma invio
    $inviato = true;
}

// Database
include('./components/database.php');

// Titolo pagina
$pagina = 'Contatti';

// Header
include('./components/header.php');

// Testata
include('./components/pageheader.php');
?>

<div id="contatti">
    <div class="container py-4">
        <div class="col-md-8 mx-auto">
            <?php if (!$inviato) { ?>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="oggetto" class="form-label">Oggetto</label>
                        <input type="text" class="form-control" id="oggetto" name="oggetto" required>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="messaggio" class="form-label">Messaggio</label>
                        <textarea class="form-control" id="messaggio" rows="3" name="messaggio" required></textarea>
                    </div>
                    <div class="mb-3 text-center">
                        <input type="submit" name="submit" value="Invia" class="btn btn-primary btn-lg px-5">
                    </div>
                </form>

                <div class="alert alert-success">
                    <b>Discord:</b> per avere supporto con il tuo codice puoi unirti al server Discord ufficiale di GB Factory Code. Trovi il link su questo sito.
                </div>

                <div class="alert alert-warning">
                    <b>Email:</b> puoi contattarmi anche scrivendo all'indirizzo <a href="mailto:info@gbfactory.net">info@gbfactory.net</a>
                </div>
            <?php } else { ?>
                <div class="alert alert-success">
                    Il tuo messaggio è stato inviato con successo! Grazie per aver contattato GB Factory Code, ti risponderemo il prima possibile.
                    Intanto una copia del messaggio è stata inviata all'indirizzo email fornito.
                </div>
            <?php } ?>
        </div>

        <section id="ad">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9049796387311792" crossorigin="anonymous"></script>
            <!-- Home Fondo -->
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9049796387311792" data-ad-slot="9419984087" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </section>
    </div>
</div>

<?php include('./components/footer.php'); ?>