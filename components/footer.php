<?php include('discord.php'); ?>

<footer id="footer" class="py-5 footer-dark">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/" aria-label="GB Factory Code">
                        <img src="https://<?= $_SERVER['HTTP_HOST'] ?>/assets/img/logo_round_trans.png" alt="GB Factory Code" width="40" height="32" class="img-fluid me-2">
                        <span class="fs-5 text-light">GB Factory Code</span>
                    </a>
                    <ul class="list-unstyled small text-muted">
                        <li class="mb-2"><a href="/privacy">Privacy Policy</a></li>
                        <li class="mb-3"><a href="/cookie">Cookie Policy</a></li>
                        <li class="mb-2">&copy; <?= date('Y') ?> GB Factory</li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 offset-lg-1 mb-3">
                    <h5 class="text-light">SITO</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/">Home</a></li>
                        <li class="mb-2"><a href="/contatti">Contatti</a></li>
                        <li class="mb-2"><a href="/login">Accedi</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5 class="text-light">DOWNLOAD</h5>
                    <ul class="list-unstyled">
                        <?php
                        $sql = "SELECT nome, slug FROM serie";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<li class="mb-2"><a href="https://' . $_SERVER['HTTP_HOST']  . '/playlist/' . $row["slug"] . '">' . $row["nome"] . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5 class="text-light">TUTORIAL</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="<?= $link_youtube ?>">YouTube</a></li>
                        <li class="mb-2"><a href="<?= $link_discord ?>">Discord</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5 class="text-light">GB FACTORY</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="https://gbfactory.net/">Sito Principale</a></li>
                        <li class="mb-2"><a href="<?= $link_youtube ?>">YouTube</a></li>
                        <li class="mb-2"><a href="<?= $link_discord ?>">Discord</a></li>
                        <li class="mb-2"><a href="https://github.com/gbfactory">GitHub</a></li>
                    </ul>
                </div>
            </div>
        </div>
</footer>

<script id="CookieDeclaration" src="https://consent.cookiebot.com/56f0b80e-3ed0-4b73-bbf5-8a52b3a1d771/cd.js" type="text/javascript" async></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js" integrity="sha512-a6ctI6w1kg3J4dSjknHj3aWLEbjitAXAjLDRUxo2wyYmDFRcz2RJuQr5M3Kt8O/TtUSp8n2rAyaXYy1sjoKmrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://<?= $_SERVER['HTTP_HOST'] ?>/assets/js/modal-video.js"></script>

<?php if ($pagina === 'Aggiungi un Tutorial' || $pagina === 'Modifica un Tutorial') { ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            var date_input = $('input[name="date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'dd/mm/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        })
    </script>
<?php } ?>

<?php if ($pagina === 'Gestione Video') { ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Ricerca per titolo
            $('#ricerca-titolo').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                // console.log(value);

                $('#lista-video li').filter(function() {
                    // console.log('ciao')
                    console.log($(this).data('titolo'))
                    console.log($(this).data('titolo').indexOf(value) > -1)

                    $(this).toggle($(this).data('titolo').indexOf(value) > -1)
                })
            })

            // Ricerca per serie


            // Bottone elimina video
            $('button').click(function() {
                Swal.fire({
                    title: 'Conferma operazione',
                    text: "L'eliminazione di un tutorial non ?? reversibile!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Elimina tutorial',
                    cancelButtonText: 'Annulla'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.replace("/admin/elimina_video.php?id=" + $(this).data('id'));
                    }
                })
            })
        })
    </script>

    <?php if (isset($_GET['stato'])) { ?>
        <script>
            <?php if ($_GET['stato'] === 'successo') { ?>
                toastr.success('Tutorial eliminato con successo!')
            <?php } else { ?>
                toastr.error('Errore durante l\'eliminazione del tutorial!')
            <?php } ?>
        </script>
    <?php } ?>
<?php } ?>

<script>
    $(".js-modal-btn").modalVideo();
</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function(m, e, t, r, i, k, a) {
        m[i] = m[i] || function() {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(83195719, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/83195719" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->

</body>

</html>