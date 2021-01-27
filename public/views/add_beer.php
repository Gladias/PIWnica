<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/nav-bar.css">
    <link rel="stylesheet" type="text/css" href="public/css/add_beer.css">
    <script src="https://kit.fontawesome.com/6632ce43ac.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="public/img/favicon.png"/>
    <script type="text/javascript" src="public/js/menu.js" defer></script>
    <title>Dodawanie Piwa</title>
</head>

<body>
<div class="container">
    <?php include('nav-bar.php') ?>
    <div class="main-page">
        <form class="add-form" action="addBeer" method="POST" enctype="multipart/form-data">
            <h1>Dodawanie piwa</h1>
            <h3>
                <?php
                if(isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </h3>
            <div>
                <h4>Nazwa piwa</h4>
                <input name="name" type="text">
            </div>
            <div>
                <h4>Opis</h4>
                <textarea name="description" placeholder="Opis piwa"></textarea>
            </div>
            <div>
                <h4>Zdjęcie</h4>
                <input id="file_input" name="file" type="file">
            </div>
            <div>
                <h4>Gatunek</h4>
                <input name="type" type="text">
            </div>
            <div>
                <h4>Browar</h4>
                <input name="brewery" type="text">
            </div>
            <div>
                <h4>Kraj</h4>
                <input name="country" type="text">
            </div>
            <div>
                <h4>Zawartość alkoholu <i class="fas fa-percent"></i></h4>
                <input id="alcohol_input" name="alcohol" type="text">
            </div>
            <div>
                <h4>Cena</h4>
                <input id="price_input" name="price" type="text">
            </div>
            <button type="submit">Dodaj piwo</button>
        </form>
    </div>
</div>
</body>
