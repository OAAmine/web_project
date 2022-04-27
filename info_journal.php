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
    $id_journal = $params['id_isbn'];

    $select_stmt = $db->prepare("SELECT * FROM journaux WHERE id_isbn = :id_isbn"); //sql select query
    $select_stmt->execute(array(':id_isbn' => $id_journal));    //execute query with bind parameter
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    ?>
        <title><?php echo $row['titre_j'];?></title>
</head>

<body>
        <div class="info">
            <h1>Titre : <span><?php echo $row['titre_j'];?></span></h1>
            <h2>ISBN : <span><?php echo $row['id_isbn']; ?></span></h2>
            <h2>Éditeur : <span><?php echo $row['editeur']; ?></span></h2>
            <h2>Théme : <span><?php echo $row['theme']; ?></span></h2>
        </div>




<?php 
    include("footer.php");

?>
</body>

</html>