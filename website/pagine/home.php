<?php
// Database
include('./components/database.php');

// Titolo pagina
$pagina = 'Home';

// Header
include('./components/header.php');
?>

<section id="header" class="pt-5">
    <div class="px-4 py-5 text-center text-white">
        <h1 class="display-5 fw-bold">BENVENUTO SU GB FACTORY CODE</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Nuovi tutorial di programmazione su moltissimi argomenti!</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-center">
                <a href="<?= $link_youtube ?>" class="btn btn-dll rounded d-flex justify-content-between align-items-center">
                    <div class="icon">
                        <i class="fab fa-youtube home-icon"></i>
                    </div>
                    <div class="text text-end ms-3">
                        <small>ISCRIVITI AL CANALE</small>
                        <b>YOUTUBE</b>
                    </div>
                </a>
                <a href="<?= $link_discord ?>" class="btn btn-dll rounded d-flex justify-content-between align-items-center">
                    <div class="text text-start me-3">
                        <small>ENTRA NEL SERVER</small>
                        <b>DISCORD</b>
                    </div>
                    <div class="icon">
                        <i class="fab fa-discord home-icon"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section id="wave">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <defs>
            <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:rgb(255 190 11);stop-opacity:1" />
                <stop offset="50%" style="stop-color:rgb(255 102 0);stop-opacity:1" />
                <stop offset="100%" style="stop-color:rgb(255 0 150);stop-opacity:1" />
            </linearGradient>
        </defs>
        <path fill="url(#grad1)" fill-opacity="1" d="M0,128L48,144C96,160,192,192,288,197.3C384,203,480,181,576,149.3C672,117,768,75,864,80C960,85,1056,139,1152,160C1248,181,1344,171,1392,165.3L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
</section>

<section id="videos" class="mt-5">
    <div class="py-5">
        <div class="container">
            <!-- <div class="text-center">
				<h2 class="pb-4">ULTIMI VIDEO</h2>
			</div> -->

            <div class="row row-cols-1 row-cols-md-3">
                <?php
                $content = @file_get_contents('https://www.googleapis.com/youtube/v3/search?key=AIzaSyDCM9aDKmUosw6KPVnj8av4S9AWtDCqQ6g&channelId=UCO8qGdzY_vZuBzri8bC7dOQ&part=snippet,id&order=date&maxResults=3');

                if ($content) {
                    $json = json_decode($content);
                    $lista_video = $json->items;

                    for ($i = 0; $i < count($lista_video); $i++) {
                        $video = $lista_video[$i];
                ?>
                        <div class="col">
                            <div class="card shadow-sm mb-3" style="border: 0;">
                                <img src="<?= $video->snippet->thumbnails->medium->url ?>" alt="">
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-3"><?= $video->snippet->title ?></h5>
                                    <button type="button" class="js-modal-btn btn btn-primary video-btn px-4" data-video-id="<?= $video->id->videoId ?>">Guarda Video</button>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="single-video-wrapper">
                        <iframe src="" id="video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="ad">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9049796387311792" crossorigin="anonymous"></script>
    <!-- Home Fondo -->
    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9049796387311792" data-ad-slot="9419984087" data-ad-format="auto" data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</section>

<section id="statistics" class="bg-light py-5">
    <?php
    $content = @file_get_contents('https://www.googleapis.com/youtube/v3/channels?id=UCO8qGdzY_vZuBzri8bC7dOQ&key=AIzaSyDCM9aDKmUosw6KPVnj8av4S9AWtDCqQ6g&part=statistics');

    if ($content) {
        $json = json_decode($content);
    ?>
        <div class="container text-center">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <span class="number"><?= $json->items[0]->statistics->videoCount ?></span>
                    <span class="title">TUTORIAL</span>
                </div>
                <div class="col">
                    <span class="number"><?= $json->items[0]->statistics->subscriberCount ?></span>
                    <span class="title">ISCRITTI</span>
                </div>
                <div class="col">
                    <span class="number"><?= $json->items[0]->statistics->viewCount ?></span>
                    <span class="title">VISUALIZZAZIONI</span>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</section>

<?php include('./components/footer.php'); ?>