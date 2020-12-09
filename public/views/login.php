<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@600&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <nav class="nav-bar">
            <img id="logo" src="public/img/logo.png">
            <div class="search-bar">
                <input type="search" placeholder="Szukaj piw...">
            </div>
            <button>Piwne newsy</button>
            <button>Katalog piw</button>
            <button>Zarejestruj się</button>
        </nav>
        <div class="main-page">
            <form class="login-form" action="login" method="POST">
                <h1>Logowanie</h1>
                <h3>
                    <?php
                        if(isset($messages)) {
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </h3>
                <div class="login-row">
                    <h4>Nazwa użytkownika</h4>
                    <input name="login" type="text">
                </div>
                <div class="login-row">
                    <h4>Hasło</h4>
                    <input name="password" type="password">
                </div>
                <p>Przypomnij hasło</p>
                <button type="submit">Zaloguj</button>
            </form>
        </div>
    </div>
</body>