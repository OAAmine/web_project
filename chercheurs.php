<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Les chercheurs</title>
    <link rel="stylesheet" href="all.css">
    <script src="jquery-3.6.0.min.js"></script>

</head>


<body>
    <?php
    include("navbar.php");
    require 'db.php';
    $requete = 'select * from chercheurs';
    $result = $db->prepare($requete);
    $result->execute();
    $res = $result->fetchAll();

    if (!$result) {
        echo 'Erreur lors de l\'execution de la requete' . mysqli_error();
    } else { ?>
        <h1>Liste des chercheurs </h1>
        <table class="styled-table">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Pays</th>
                <th>Travail</th>
                <th>Grade</th>
                <th>Structure</th>

            </tr>
            <?php
            for ($i = 0; $i < count($res); $i++) { ?>
                <tr class='clickable-row' data-href='<?php echo "profil_chercheur.php?id=" . $res[$i]['id']; ?>'>
                    <td><?php echo $res[$i]['nom'] ?></td>
                    <td><?php echo $res[$i]['prenom'] ?></td>
                    <td><?php echo $res[$i]['pays'] ?></td>
                    <td><?php echo $res[$i]['travail'] ?></td>
                    <td><?php echo $res[$i]['grade'] ?></td>
                    <td><?php echo $res[$i]['structure'] ?></td>
                </tr>
            <?php  } ?>
        <?php } ?>
        </table>




        </div>

        <?php include("footer.php"); ?>


        <script>
            jQuery(document).ready(function($) {
                $(".clickable-row").click(function() {
                    window.location = $(this).data("href");
                });
            });
        </script>
</body>

</html>