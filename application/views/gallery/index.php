<?php 
$years = [
    (int)date('Y'),
    2022,
    2021,
    2020,
    2019    
];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Optimization -->
    <meta name="description" content="Perbaiki rumah anda dengan amanah, tenang dan bahagia." />
    <meta name="keywords" content="" />
    <meta name="og:title" property="og:title" content="Your Open Graph Title Goes Here">
    <title>Gallery</title>

    <!-- style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <style>
        .is-active-button {
            background-color: hsl(171, 100%, 41%) !important;
            color: white !important;
        }

        @media screen and (max-width: 760px) {
            .columns-gallery {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
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
                    <a href="<?= base_url(); ?>#client" class="navbar-item">
                        Client
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div class="container mt-5">
        <div class="columns">
            <div class="column is-2">
                <div class="box">
                    <aside class="menu">
                        <p class="menu-label">
                            Tahun
                        </p>
                        <ul class="menu-list">
                            <?php foreach($years as $singleyear): ?>
                                <li>
                                    <a href="<?= base_url(); ?>gallery?year=<?= $singleyear; ?>" <?= $year == $singleyear ? 'class="is-active-button"' : ''; ?>><?= $singleyear; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>
                </div>
            </div>
            <div class="column">
                <div class="box">

                    <?php foreach ($galleries as $gallery_chunk) : ?>
                        <div class="columns columns-gallery">
                            <?php foreach ($gallery_chunk as $gallery) : ?>
                                <div class="column is-3">
                                    <a data-fslightbox="gallery" href="<?= $gallery->gallery_pic; ?>">
                                        <img src="<?= $gallery->gallery_pic; ?>" alt="pic <?= $gallery->gallery_name; ?>">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>

                    <div>
                        <nav class="pagination is-centered" role="navigation" aria-label="pagination">
                            <ul class="pagination-list">
                                <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                                    <li>
                                        <a class="pagination-link <?= $i == $page ? 'is-active-button' : ''; ?>" href="<?= base_url(); ?>gallery?year=<?= $year; ?>&page=<?= $i; ?>"><?= $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script src="<?= base_url(); ?>public/js/fslightbox.js"></script>
    <script src="<?= base_url(); ?>public/js/gallery.js"></script>
</body>

</html>