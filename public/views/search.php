<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/nav-bar.css">
    <link rel="stylesheet" type="text/css" href="public/css/search.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/6632ce43ac.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/search.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@600&display=swap" rel="stylesheet">
    <title>Rejestracja</title>
</head>

<body>
<div class="container">
    <nav class="nav-bar">
        <img id="logo" src="public/img/logo.png">
        <div class="search-bar">
            <input type="search" placeholder="Szukaj piw...">
        </div>
        <button onclick="window.location.href='news'">Piwne newsy</button>
        <button onclick="window.location.href='catalog'">Katalog piw</button>
        <button onclick="window.location.href='register'">Zarejestruj się</button>
    </nav>
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
            <?php foreach ($beers as $beer): ?>
                <a class="search-result" id="<?= $beer->getId(); ?>" href="beer?id=<?= $beer->getId(); ?>">
                    <img class="beer" src="public/uploads/<?= $beer->getImage(); ?>" alt="Beer">
                    <h3 class="title"><?= $beer->getName(); ?></h3>
                    <p class="description">
                        <?= $beer->getDescription(); ?>
                    </p>
                </a>
            <?php endforeach; ?>
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

