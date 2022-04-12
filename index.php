<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="all.css">
    <script src="accueil.js"></script>
</head>

<body>
<?php include("navbar.php"); ?>

    <header class="main-header clearfix">
<!----

    </header>
    <main>
        <div>
            <h1>Présentation du site</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </br> Duis
                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <div class="diaporama">
                <div class="menu">
                    <label for="slide-1"></label>
                    <label for="slide-2"></label>
                    <label for="slide-3"></label>
                </div>

                <input class="slide" id="slide-1" type="radio" name="slides" checked>
                <img class="slide-img" src="img/galaxie.jpg">

                <input class="slide" id="slide-2" type="radio" name="slides">
                <img class="slide-img" src="img/lune.jpg">

                <input class="slide" id="slide-3" type="radio" name="slides">
                <img class="slide-img" src="img/mars.jpg">
            </div>
    </main>
---->
    <footer>
<?php include("footer.php"); ?>
    </footer>
</body>

</html>