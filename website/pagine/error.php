<?php
// Database
include('./components/database.php');

// Titolo pagina
$pagina = 'Contatti';

// Header
include('./components/header.php');

// Testata
include('./components/pageheader.php');
?>

<div id="error">
    <div class="container">
        <h1>ERRORE</h1>
        <p>Questa pagina non è stata trovata.</p>
        <a href="/">Torna alla home...</a>

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