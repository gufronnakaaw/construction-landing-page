<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Optimization -->
    <meta name="description" content="Perbaiki rumah anda dengan amanah, tenang dan bahagia." />
    <meta name="keywords" content="" />
    <meta name="og:title" property="og:title" content="Your Open Graph Title Goes Here">
    <title>Homepage</title>

    <!-- style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>public/css/floatingwa.css" />
</head>

<body>
    <div class="container">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <!-- <a class="navbar-item" href="https://bulma.io">
                    <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
                </a> -->

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar-menu">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbar-menu" class="navbar-menu">

                <div class="navbar-start">
                    <a href="<?= base_url(); ?>" class="navbar-item">
                        Home
                    </a>
                    <a href="<?= base_url(); ?>gallery" class="navbar-item">
                        Gallery
                    </a>
                    <a href="#client" class="navbar-item">
                        Client
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <section class="section has-background-gray">
        <div class="columns is-vcentered">
            <div class="column px-5">
                <h1 class="is-size-2 has-text-weight-bold">
                    <span>Perbaiki rumah anda dengan</span>
                    <span class="has-text-primary">amanah, tenang dan bahagia.</span>
                </h1>

                <p>... merupakan sebuah jasa perseorangan yang </p>
            </div>
            <div class="column">
                <div class="box">
                    <!-- <img src="https://cdn.wallpapersafari.com/28/21/sAKSVx.jpg" alt="Jasa renovasi rumah"> -->
                    <img src="https://w0.peakpx.com/wallpaper/950/110/HD-wallpaper-road-construction-cars-other-entertainment-people.jpg" alt="Jasa renovasi rumah">
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5 is-max-widescreen has-text-centered swiper">
        <h1 class="is-size-3 has-text-primary has-text-weight-bold">Jasa</h1>
        <p>Kami membuka beberapa jasa yaitu : </p>

        <div class="swiper-wrapper mt-3">
            <?php foreach ($services as $service) : ?>
                <div class="card swiper-slide">
                    <div class="card-content is-flex is-flex-direction-column is-align-items-center">
                        <h5 class="has-text-weight-bold"><?= $service->service_name; ?></h5>

                        <figure class="image is-128x128 mt-4">
                            <img class="is-rounded" src="<?= $service->service_pic; ?>" alt="gambar <?= $service->service_name; ?>">
                        </figure>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-6">
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <section class="section is-medium has-text-centered" id="client">
        <div class="columns">
            <div class="column is-6 is-flex is-flex-direction-column is-justify-content-center">
                <h1 class="is-size-3 has-text-primary has-text-weight-bold">Client</h1>
                <p>Client yang sudah mempercayakan kami</p>
            </div>
            <div class="column is-6">

                <div class="is-flex is-justify-content-center mt-5">
                    <?php foreach ($clients as $client) : ?>
                        <figure class="image is-128x128 mx-3">
                            <img class="is-rounded" src="<?= $client->client_pic; ?>" alt="gambar <?= $client->client_name; ?>">
                        </figure>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </section>


    <div class="container is-max-desktop has-text-centered">
        <h1 class="is-size-3 has-text-primary has-text-weight-bold">Gallery</h1>
        <?php foreach ($galleries as $gallery_chunk) : ?>
            <div class="columns mt-4">

                <?php foreach ($gallery_chunk as $gallery) : ?>
                    <div class="column is-4">
                        <a data-fslightbox="gallery" data-alt="<?= $gallery->gallery_name; ?>" href="<?= $gallery->gallery_pic; ?>">
                            <img src="<?= $gallery->gallery_pic; ?>" alt="gambar <?= $gallery->gallery_name; ?>">
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endforeach; ?>

        <a href="<?= base_url(); ?>gallery" class="button is-primary">Lihat lebih banyak</a>
    </div>

    <div class="whatsapp"></div>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="<?= base_url(); ?>public/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>public/js/fslightbox.js"></script>
    <script src="<?= base_url(); ?>public/js/floatingwa.js"></script>
    <script src="<?= base_url(); ?>public/js/config.swiper.js"></script>
    <script src="<?= base_url(); ?>public/js/home.js"></script>
</body>

</html>