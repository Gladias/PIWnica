<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/nav-bar.css">
    <link rel="stylesheet" type="text/css" href="public/css/beer.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6632ce43ac.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/stars.js" defer></script>
    <link rel="icon" type="image/png" href="public/img/favicon.png"/>
    <title>Piwo</title>
</head>

<body>
    <div class="container">
        <?php include('nav-bar.php') ?>
        <div class="main-page">
            <div class="beer-section">
                <img class="beer-image" src="public/uploads/<?= $beer->getImage() ?>" alt="Beer image">
                <div class="info">
                    <div class="info-head">
                        <h1><?= $beer->getName(); ?></h1>
                        <div class="stars">
                            <i id="star_1" class="fas fa-star checked"></i>
                            <i id="star_2" class="fas fa-star"></i>
                            <i id="star_3" class="fas fa-star"></i>
                            <i id="star_4" class="fas fa-star"></i>
                            <i id="star_5" class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="details">
                        <div class="details-row">
                            <h3>Ocena</h3>
                            <div>
                                <h3><?php
                                    if ($beer->getRatesNumber() === 0)
                                        echo "0/5";
                                    else
                                        echo strval($beer->getRatesSum()/$beer->getRatesNumber())."/5";
                                    ?></h3>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="details-row">
                            <h3>Gatunek</h3>
                            <div>
                                <h3><?= $beer->getType() ?></h3>
                                <i class="fas fa-beer"></i>
                            </div>
                        </div>
                        <div class="details-row">
                            <h3>Browar</h3>
                            <div>
                                <h3><?= $beer->getBrewery() ?></h3>
                                <i class="fas fa-industry"></i>
                            </div>
                        </div>
                        <div class="details-row" >
                            <h3>Kraj</h3>
                            <div>
                                <h3><?= $beer->getCountry() ?></h3>
                                <i class="fas fa-flag"></i>
                            </div>
                        </div>
                        <div class="details-row">
                            <h3>Alkohol</h3>
                            <div>
                                <h3><?= $beer->getAlcohol() ?></h3>
                                <i class="fas fa-percent"></i>
                            </div>
                        </div>
                        <div class="details-row">
                            <h3>Średnia cena</h3>
                            <div>
                                <h3><?= $beer->getPrice() ?></h3>
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                        </div>
                    </div>
                    <h2>Opis</h2>
                    <div class="description">
                        <p>
                            <?= $beer->getDescription() ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="comments-section">
                <h1>Komentarze</h1>
                <?php if (isset($_SESSION["login"])): ?>
                    <div class="comment">
                        <img class="author-image" src="public/img/comments-placeholder.jpg" alt="Author">
                        <h4 class="author">T_Kopyra</h4>
                        <textarea name="description" cols="45" rows="5" placeholder="Wpisz komentarz"></textarea>
                        <h4 class="comment-rate">Twoja cena piwa:</h4>
                        <div class="comment-stars">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="not_logged">
                        <h4>Musisz być zalogowany by dodać komentarz</h4>
                        <button onclick="window.location.href='login'"><?= "Zaloguj się"; ?> </button>
                    </div>
                <?php endif; ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment">
                        <h4 class="date"><?= $comment->getCreatedAt(); ?></h4>
                        <img class="author-image" src="public/img/comments-placeholder.jpg" alt="Author">
                        <h4 class="author"><?= $comment->getAuthor(); ?></h4>
                        <p class="comment-content"><?= $comment->getContent(); ?></p>
                        <h4 class="comment-rate">Ocena piwa</h4>
                        <div class="comment-stars">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

<template id="comment-template">
    <div class="comment">
        <h4 class="date"></h4>
        <img class="author-image" src="public/img/comments-placeholder.jpg" alt="Author">
        <h4 class="author"></h4>
        <p class="comment-content"></p>
        <h4 class="comment-rate">Ocena piwa</h4>
        <div class="comment-stars">
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
        </div>
    </div>
</template>