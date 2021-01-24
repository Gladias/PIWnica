<nav class="nav-bar">
    <a id="logo" href="start">
        <img src="public/img/logo.png">
    </a>
    <?php if (substr( $_SERVER['REQUEST_URI'], 0, 6 ) === "/beers"): ?>
        <div class="search-bar">
            <input type="search" placeholder="Szukaj piw...">
        </div>
    <?php else: ?>
        <form class="search-bar" method="get" action="/beers">
            <input name="query" type="search" placeholder="Szukaj piw...">
        </form>
    <?php endif; ?>
    <button onclick="window.location.href='news'">Piwne newsy</button>
    <button onclick="window.location.href='catalog'">Katalog piw</button>
    <?php if (isset($_SESSION["login"])): ?>
        <button onclick="window.location.href='logout'"><?= "Wyloguj się"; ?> </button>
    <?php elseif ($_SERVER['REQUEST_URI'] === "/register"): ?>
        <button onclick="window.location.href='login'"><?= "Zaloguj się"; ?> </button>
    <?php else: ?>
        <button onclick="window.location.href='register'"><?= "Zarejestruj się"; ?> </button>
    <?php endif; ?>
</nav>
