<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/nav-bar.css">
    <link rel="stylesheet" type="text/css" href="public/css/login_and_register.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6632ce43ac.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/js/menu.js" defer></script>
    <link rel="icon" type="image/png" href="public/img/favicon.png"/>
    <title>Logowanie</title>
</head>

<body>
    <div class="container">
        <?php include('nav-bar.php') ?>
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
                    <input name="login" type="text" required>
                </div>
                <div class="login-row">
                    <h4>Hasło</h4>
                    <input name="password" type="password" required>
                </div>
                <p>Przypomnij hasło</p>
                <button type="submit">Zaloguj</button>
            </form>
        </div>
    </div>
</body>