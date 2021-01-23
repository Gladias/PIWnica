<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/nav-bar.css">
    <link rel="stylesheet" type="text/css" href="public/css/login_and_register.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@600&display=swap" rel="stylesheet">
    <script type="text/javascript" src="public/js/script.js" defer></script>
    <script type="text/javascript" src="public/js/search.js" defer></script>
    <title>Rejestracja</title>
</head>

<body>
    <div class="container">
        <?php include('nav-bar.php') ?>
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