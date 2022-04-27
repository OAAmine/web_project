<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="logo_nav_bar">
        <a href="/index.php"><img src="img/logo.jpg" alt="Logo"></a>
    </div>
    <nav class="main_nav">
        <ul class="nav_buttons">
            <li><a href="/informations.php">Informations & Évenements</a></li>

            <li><a href="/chercheurs.php">Chercheurs</a> </li>

            <li><a href="/publication.php">Publications</a> </li>

            <li><a href="/conferences.php">Conferences</a> </li>

            <li><a href="/journaux.php">Journaux</a> </li>
        </ul>



        <div class="sign_up_in">
            <?php if ((isset($_SESSION['nom_d_utilisateur']))) { ?>
                <div class="dropdown compte">
                    <button class="dropdown">
                        <a href="#">
                            <img src="img/profil_placeholder.png" alt="">
                            <p class="username"><?php echo ($_SESSION['nom_d_utilisateur']) ?> </p>
                        </a>
                        <i class="fsa fcd"></i>
                    </button>
                    <div class="dropdown_liste">
                        <a href="/profil_chercheur?id=<?php echo ($_SESSION['id']) ?>.php">Profil</a>
                        <a href="/logout.php">Déconnexion</a>
                    </div>
                </div>
                <div>

                </div>
            <?php } else { ?>
                <div class="sign_up_in_buttons">
                    <a class="btn btn_connect" href="/login.php">Se Connecter</a>
                    <a class="btn btn_inscrire" href="/register.php">S'inscrire</a>
                </div>
            <?php } ?>
        </div>

    </nav>

</body>

</html>

<style>
    /*---------------NAV BAR--------------*/



    nav {
        font-size: 18px;
        border-bottom: 1px solid #d0d0d0;
        font-weight: 400;
        font-family: Montserrat;
        text-decoration: none;
        margin-bottom: 20px;
        text-align: center;
    }


    .main_nav {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
    }

    .logo_nav_bar {
        width: 5%;
    }

    .logo_nav_bar img {
        width: 60px;
        height: auto;

    }



    /*---------------BUTTONS------------------*/


    .nav_buttons {
        width: 65%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        color: #FFFFFF;
    }

    .nav_buttons li a {
        margin-right: 20px;
        text-decoration: none;
        color: #656565;
        transition: color 0.2s, text-decoration 2s;
    }

    .nav_buttons li a:hover {
        color: blue;
        text-decoration: underline;
    }




    .sign_up_in {
        color: #1687A7;
        width: 25%;
    }

    .sign_up_in_buttons {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .btn:link,
    .btn:visited {
        list-style-type: none;
        text-decoration: none;
        padding: 7px 15px;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s, border 0.3s;
        font-weight: 400;
        border-radius: 50px;
    }


    .btn_connect {
        color: white;
        border: 3px solid white;
        background-color: #191970;
    }

    .btn_connect:hover,
    .btn_connect:active {
        background-color: white;
        color: #191970;
        border: 2px solid #191970;
    }

    .btn_inscrire {
        color: #191970;
        background-color: white;
        border: 3px solid white;
    }

    .btn_inscrire:hover,
    .btn_inscrire:active {
        background-color: #191970;
        border: 3px solid white;
        color: white;
    }

    /*---------------MENU SESSION ACTIVE------------------*/
    .compte img {
        height: 40px;
        width: auto;
        border-radius: 50px;

    }

    .dropdown {
        padding-left: 20px;
    }

    .dropdown a {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        text-decoration: none;
    }

    .username {
        padding-left: 10px;
    }


    .dropdown span {
        text-decoration: none;
        background-color: blue;
        border-radius: 10px;
        padding: 10px 15px;
        transition: background-color 0.2s, color 0.1s;
        font-family: Montserrat;
        font-weight: 400;
    }

    .dropdown .dropdown {
        font-size: 16px;
        border: none;
        outline: none;
        color: white;
        background-color: inherit;
        font-family: inherit;
    }

    .dropdown_liste {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown_liste a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown_liste a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown_liste {
        display: block;
    }
</style>