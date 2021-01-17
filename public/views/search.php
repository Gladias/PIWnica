<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/nav-bar.css">
    <link rel="stylesheet" type="text/css" href="public/css/search.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/6632ce43ac.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@600&display=swap" rel="stylesheet">
    <title>Rejestracja</title>
</head>

<body>
<div class="container">
    <?php include('nav-bar.php') ?>
    <div class="main-page">
        <div class="top">
            <div class="search-title">
                <h2>Wyniki wyszukiwania dla: Imperium Prunum</h2>
            </div>

            <div onclick="window.location.href='add_beer'" class="add-beer">
                <i class="fas fa-plus-square"></i>
                Dodaj piwo
            </div>
        </div>

        <div class="search-result">
            <img class="beer" src="public/img/beer-placeholder.jpg" alt="Beer">
            <h3 class="title">Kormoran imperium prunum</h3>
            <p class="description">
                Białe piwo pszeniczne pojawiło się po raz pierwszy w długiej historii browaru Żywiec.
                Polecana temperatura spożycia piwa to przedział 4-6°C.
                Uwarzone ze słodem pszenicznym i jęczmiennym.
            </p>
        </div>

        <div class="search-result">
            <img class="beer" src="public/img/beer-placeholder.jpg" alt="Beer">
            <h3 class="title">Kormoran imperium prunum</h3>
            <p class="description">
                Białe piwo pszeniczne pojawiło się po raz pierwszy w długiej historii browaru Żywiec.
                Polecana temperatura spożycia piwa to przedział 4-6°C.
                Uwarzone ze słodem pszenicznym i jęczmiennym.
            </p>
        </div>
    </div>
</div>
</body>
