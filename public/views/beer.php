<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="public/css/nav-bar.css">
    <link rel="stylesheet" type="text/css" href="public/css/beer-style.css">
    <script src="https://kit.fontawesome.com/6632ce43ac.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@600&display=swap" rel="stylesheet">
    <title>Piwo</title>
</head>
<body>
    <div class="container">
        <?php include('nav-bar.php') ?>
        <div class="main-page">
            <div class="beer-section">
                <img class="beer-image" src="public/img/beer-placeholder.jpg" alt="Beer image">
                <div class="info">
                    <h1>Żywiec Białe</h1>
                    <div class="details">
                        <div class="details-row">
                            <h3>Ocena</h3>
                            <div>
                                <h3>3.9/5</h3>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="details-row">
                            <h3>Gatunek</h3>
                            <div>
                                <h3>Witbier</h3>
                                <i class="fas fa-beer"></i>
                            </div>
                        </div>
                        <div class="details-row">
                            <h3>Browar</h3>
                            <div>
                                <h3>Żywiec</h3>
                                <i class="fas fa-industry"></i>
                            </div>
                        </div>
                        <div class="details-row" >
                            <h3>Kraj</h3>
                            <div>
                                <h3>Polska</h3>
                                <i class="fas fa-flag"></i>
                            </div>
                        </div>
                        <div class="details-row">
                            <h3>Alkohol</h3>
                            <div>
                                <h3>4.9</h3>
                                <i class="fas fa-percent"></i>
                            </div>
                        </div>
                        <div class="details-row">
                            <h3>Średnia cena</h3>
                            <div>
                                <h3>3.99zł</h3>
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                        </div>
                    </div>
                    <h2>Opis</h2>
                    <div class="description">
                        <p>
                            Białe piwo pszeniczne pojawiło się po raz pierwszy w długiej historii browaru Żywiec.
                            Polecana temperatura spożycia piwa to przedział 4-6°C.
                            Uwarzone ze słodem pszenicznym i jęczmiennym. Przy procesie warzenia użyta również kolendra.
                            Brak informacji o chmielu jakim piwo zostało doprawione.
                            Barwa słomkowa, lekko opalizująca. Piana przy nalewaniu dość obfita, drobnoziarnista.
                        </p>
                    </div>
                </div>
            </div>
            <div class="comments-section">
                <h1>Komentarze</h1>
                <div class="comment">
                    <h4 class="date">01.11.2020</h4>
                    <img class="author-image" src="public/img/comments-placeholder.jpg" alt="Author">
                    <h4 class="author">T_Kopyra</h4>
                    <p class="comment-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eros odio, pulvinar ultrices
                        augue non, lacinia ullamcorper magna. Donec quis dui congue, scelerisque dui non, ullamcor
                        per nunc. Aenean tristique vestibulum sem et feugiat. Donec et eros vel lacus eleifend malesuada
                        . Sed at arcu ac odio scelerisque sodales.
                    </p>
                    <h4 class="comment-rate">Ocena piwa</h4>
                    <div class="comment-stars">
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <div class="comment">
                    <h4 class="date">01.11.2020</h4>
                    <img class="author-image" src="public/img/comments-placeholder.jpg" alt="Author">
                    <h4 class="author">T_Kopyra</h4>
                    <p class="comment-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eros odio, pulvinar ultrices
                        augue non, lacinia ullamcorper magna. Donec quis dui congue, scelerisque dui non, ullamcor
                        per nunc. Aenean tristique vestibulum sem et feugiat. Donec et eros vel lacus eleifend malesuada
                        . Sed at arcu ac odio scelerisque sodales.
                    </p>
                    <h4 class="comment-rate">Ocena piwa</h4>
                    <div class="comment-stars">
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>