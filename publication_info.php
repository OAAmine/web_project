<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <div class="profile">
        <div class="info">
            <h4><?php echo $row['titre']; ?> : </h4>
           <p> date de publication : <u><strong><?php echo $row['date_de_publication']; ?></u></strong></p>
           <p><?php echo $row['contenu']; ?></p>
        </div>
    </div>

<?php include("footer.php"); ?>

</body>

</html>