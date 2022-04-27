<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Informations </title>
    <link rel="stylesheet" href="conferences.css">
    <link rel="stylesheet" href="all.css">


</head>

<body>

    <?php

    require 'db.php';
    include("navbar.php");
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $nom_info = $params['nom_info'];

    $select_stmt = $db->prepare("SELECT * FROM information WHERE nom_info = :nom_info"); //sql select query
    $select_stmt->execute(array(':nom_info' => $nom_info));    //execute query with bind parameter
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <title><?php echo $row['nom_info']; ?></title>
    </head>

    <body>
        <div class="info">
            <h1>Titre : <span><?php echo $row['nom_info']; ?></span></h1>
            <h2><span><?php echo $row['contenu']; ?></span></h2>
            <img src="img/<?php echo $row['info_img']; ?>" alt="">
            <h2>Date : <span><?php echo $row['date']; ?></span></h2>
        </div>




        <?php
        include("footer.php");

        ?>
    </body>


</html>