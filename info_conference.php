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
    $abreviation = $params['abreviation'];

    $select_stmt = $db->prepare("SELECT * FROM conferences WHERE abreviation = :abreviation"); //sql select query
    $select_stmt->execute(array(':abreviation' => $abreviation));    //execute query with bind parameter
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    ?>
        <title><?php echo $params['abreviation']  ?></title>
</head>

<body>
        <div class="info">
            <h1>Nom : <span><?php echo $row['titre_c'];?></span></h1>
            <h2>Abreviation : <span><?php echo $row['abreviation']; ?></span></h2>
            <h2>Sujet : <span><?php echo $row['sujet']; ?></span></h2>
            <h2>Date de publication : <span><?php echo $row['date_publication']; ?></span></h2>
            <h2>Date d'inscription : <span><?php echo $row['date_inscription']; ?></span></h2>
            <h2>Conferencier : <span><?php echo $row['conferencier']; ?></span></h2>
            <h2>Pays : <span><?php echo $row['pays']; ?></h2>
        </div>




<?php 
    include("footer.php");

?>
</body>

</html>