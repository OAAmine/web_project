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
    ?> 
</head>

<body>
    <?php
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $url_components = parse_url($url);
        parse_str($url_components['query'], $params);
        $info = $params['titre'];
        
        $select_stmt = $db->prepare("SELECT * from publication where titre =:info");
        $select_stmt->execute(array(':info' => $info));
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    ?>



    <div class="info">
            <h1>Titre : <span><?php echo $row['titre'];?></span></h1>
            <h2>Date de publication : <span><?php echo $row['date_de_publication']; ?></span></h2>
            <h2>Contenu : <span><?php echo $row['contenu']; ?></span></h2>
        </div>



<?php include("footer.php"); ?>

</body>

</html>