<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="all.css">


    <?php

    require 'db.php';
    include("navbar.php");
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $chercheur_id = $params['id'];

    $select_stmt = $db->prepare("SELECT * FROM chercheurs WHERE id = :chercheur_id"); //sql select query
    $select_stmt->execute(array(':chercheur_id' => $chercheur_id));    //execute query with bind parameter
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <title><?php echo $params['id']  ?></title>
</head>

<body>
        <div class="info">
            <h1>Nom et Prénom : <span><?php echo $row['nom'] . " " . $row['prenom']; ?></span></h1>
            <h2>Travail : <span><?php echo $row['travail']; ?></span></h2>
            <h2>Grade : <span><?php echo $row['grade']; ?></span></h2>
            <h2>Structure : <span><?php echo $row['structure']; ?></span></h2>
            <?php if ((isset($_SESSION['nom_d_utilisateur']))) { ?>
                <h2>Biographie : </h2>
                <p><?php echo $row['biographie']; ?></span></p>
            <?php } ?>
        </div>




    <?php
    include("footer.php");

    ?>
</body>

</html>