<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Les chercheurs</title>
    <link rel="stylesheet" href="chercheurs.css">
    <link rel="stylesheet" href="all.css">
</head>

<style>
    .container {
        display: flex;
        flex-direction: column;
    }

    .carte_chercheurs {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        margin: 30px auto;
        padding: 8px;
        background-color: rgb(238, 238, 238);
        border-radius: 20px;
        width: 70%;
        transition: 0.1s;
        text-decoration: none;
        color: black;
    }

    .img_chercheurs {
        width: 15%;
    }

    .img_chercheurs img {
        width: 100%;
        height: auto;
    }

    .info_chercheurs {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        width: 70%;
        padding: 2px 0 0 10px;
    }
</style>

<body>
    <?php
    require 'db.php';
    include("navbar.php"); ?>
    <div class="container">

        <?php
        $query = $db->prepare("SELECT * FROM chercheurs");
        $query->execute();
        while ($row = $query->fetch()) {
        ?>
            <a class="carte_chercheurs" href="<?php echo "profil_chercheur.php?id=".$row['id']; ?>">

                <div class="img_chercheurs">
                    <img src="img/einstein.jpg" alt="">
                </div>
                <div class="info_chercheurs">
                    <h1 style="font-size: 200%;"><?php echo $row['nom'] . " " . $row['prenom']; ?></h1>
                    <h2 style="font-size: 150%;"><?php echo $row['travail']; ?></h2>
                    <h2 style="font-size: 150%;"><?php echo $row['grade']; ?></h2>
                    <h2 style="font-size: 150%;"><?php echo $row['structure']; ?></h2>
                </div>
            </a>

        <?php } ?>



    </div>

    <?php include("footer.php"); ?>


</body>

</html>