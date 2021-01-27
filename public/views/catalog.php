<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/nav-bar.css">
    <link rel="stylesheet" type="text/css" href="public/css/catalog.css">
    <script type="text/javascript" src="public/js/type_searching.js" defer></script>
    <script type="text/javascript" src="public/js/menu.js" defer></script>
    <script src="https://kit.fontawesome.com/6632ce43ac.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="public/img/favicon.png"/>
    <title>Katalog piw</title>
</head>

<body>
    <div class="container">
        <?php include('nav-bar.php') ?>
        <div class="catalog-container">
            <div class="catalog-title">
                <h2>Wybrany gatunek: </h2>
                <select name="types" id="type_select">
                    <option value="" selected disabled hidden>Gatunki</option>
                    <?php foreach ($types as $type): ?>
                        <option value="<?= $type["type"] ?>"><?= $type["type"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="catalog-nav">
                <div>
                    <h2>Nazwa</h2>
                </div>
                <div>
                    <h2>Ocena</h2>
                </div>
                <div>
                    <h2>Ilość ocen</h2>
                </div>
            </div>
            <section class="best-beers">
            </section>
        </div>
    </div>
</body>

<template id="beer-template">
    <a class="catalog-bar" href="">
        <div>
            <h2 class="name">1. Kormoran Imperium Prunum</h2>
        </div>
        <div>
            <h2 class="rating">4.71</h2>
        </div>
        <div>
            <h2 class="votes">345</h2>
        </div>
    </a>
</template>
