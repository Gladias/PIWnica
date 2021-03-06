<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/nav-bar.css">
    <link rel="stylesheet" type="text/css" href="public/css/search.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/6632ce43ac.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/search.js" defer></script>
    <script type="text/javascript" src="public/js/menu.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="public/img/favicon.png"/>
    <title>Wyszukiwarka</title>
</head>

<body>
<div class="container">
    <?php include('nav-bar.php') ?>
    <div class="main-page">
        <div class="top">
            <div class="search-title">
                <h2>Wyniki wyszukiwania dla: <?= $query ?></h2>
            </div>

            <div onclick="window.location.href='addBeer'" class="add-beer">
                <i class="fas fa-plus-square"></i>
                Dodaj piwo
            </div>
        </div>

        <section class="beers">
            <?php
            if (isset($beers)):
                foreach ($beers as $beer): ?>
                <a class="search-result" id="<?= $beer->getId(); ?>" href="beer?id=<?= $beer->getId(); ?>">
                    <img class="beer" src="public/uploads/<?= $beer->getImage(); ?>" alt="Beer">
                    <h3 class="title"><?= $beer->getName(); ?></h3>
                    <p class="description">
                        <?= $beer->getDescription(); ?>
                    </p>
                </a>
            <?php
                endforeach;
            endif;
            ?>
        </section>
    </div>
</div>
</body>

<template id="beer-template">
    <a class="search-result" id="beer-id" href="">
        <img class="beer" src="" alt="Beer">
        <h3 class="title">Nazwa piwa</h3>
        <p class="description">
            Opis piwa
        </p>
    </a>
</template>

