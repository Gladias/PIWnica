<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@600&display=swap" rel="stylesheet">
    <title>Register</title>
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
            <button>Zaloguj się</button>
        </nav>
        <div class="main-page">
            <form class="register-form" action="register" method="POST">
                <h1>Rejestracja</h1>

                <div class="login-row">
                    <h4>Nazwa użytkownika</h4>
                    <input name="login" type="text">
                </div>
                <div class="login-row">
                    <h4>Hasło</h4>
                    <input name="password" type="password">
                </div>
                <div class="login-row">
                    <h4>Potwierdź hasło</h4>
                    <input name="repeat_password" type="password">
                </div>
                <div class="login-row">
                    <h4>Adres e-mail</h4>
                    <input name="email" type="text">
                </div>
                <button type="submit">Zarejestruj</button>
            </form>
        </div>
    </div>
</body>