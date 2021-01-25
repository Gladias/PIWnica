<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/nav-bar.css">
    <link rel="stylesheet" type="text/css" href="public/css/catalog.css">
    <script type="text/javascript" src="public/js/type_searching.js" defer></script>
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
                <h2>Wybierz gatunek piw: </h2>
                <select name="types" id="type_select">
                    <?php foreach ($types as $type): ?>
                        <option value="<?= $type["type"] ?>"><?= $type["type"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="catalog-bar">
                <h2>Nazwa</h2>
                <h2>Ocena</h2>
                <h2>Ilość ocen</h2>
            </div>
            <section class="best-beers">
            </section>
        </div>
    </div>
</body>

<template id="beer-template">
    <a class="search-result" href="">
        <h2 class="name">1. Kormoran Imperium Prunum</h2>
        <h2 class="rating">4.71</h2>
        <h2 class="votes">345</h2>
    </a>
</template>
