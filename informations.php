<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Informations </title>
    <link rel="stylesheet" href="conferences.css">
    <link rel="stylesheet" href="all.css">

    <script>

    </script>

    <style>
    .galaxie {
        border: 5px solid black;
        padding: 1em;
        width: 50%
    }

    .lune {
        border: 5px solid black;
        padding: 1em;
        width: 50%
    }

    .mars {
        border: 5px solid black;
        padding: 1em;
        width: 50%;
    }

    .galaxie .img {
        width: 300px;
        height: 300px;
    }

    .lune .img {
        width: 300px;
        height: 300px;
    }

    .mars .img {
        width: 300px;
        height: 300px;
    }
    </style>

</head>

<body>
    <?php include("navbar.php"); ?>

    <main>

        <?php 
    require 'db.php';
    $requete = 'select * from information';
    $result = $db->prepare($requete);
    $result -> execute();
    $res = $result-> fetchAll();

    if(!$result ){
        echo 'Erreur lors de l\'execution de la requete' .mysqli_error();
    }
    else{
        for ($i=0; $i<count($res); $i++){?>
        <div class="information">
            <h4> <?php echo $res[$i]['nom_info'] ?> </h4>
            <img src="img/<?php echo $res[$i]['info_img'] ?>">
            <p> <?php echo $res[$i]['contenu'] ?> </p>
        </div>
        </br>
        <?php  }?>
        <?php } ?>

    </main>

    <?php include("footer.php"); ?>
</body>

</html>