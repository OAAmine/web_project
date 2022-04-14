<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <div class="profile">


        <div class="image">
            <img src="img/einstein.jpg" alt="">
        </div>
        <div class="info">
            <h1><?php echo $row['nom'] . " " . $row['prenom']; ?></h1>
            <h2><?php echo $row['travail']; ?></h2>
            <h2><?php echo $row['grade']; ?></h2>
            <h2><?php echo $row['structure']; ?></h2>
            <p><?php echo $row['biographie']; ?></p>
        </div>
    </div>




<?php 
    include("footer.php");

?>
</body>

</html>