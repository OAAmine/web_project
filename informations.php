<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Informations </title>
    <link rel="stylesheet" href="conferences.css">
    <link rel="stylesheet" href="all.css">

    <style> 
        .img{
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
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $url_components = parse_url($url);
            parse_str($url_components['query'], $params);
            $info = $params['nom_info'];

            $select_stmt = $db->prepare("SELECT * from information where nom_info =:info");
            $select_stmt->execute(array(':info' => $info));
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="information">
            <h4> <?php echo $row['nom_info'] ?> </h4>
            <img class="img" src="img/<?php echo $row['info_img'] ?>">
            <p> <?php echo $row['contenu'] ?> </p>
        </div>
        </br>
    </main>

    <?php include("footer.php"); ?>
</body>

</html>