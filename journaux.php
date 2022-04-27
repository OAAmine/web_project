<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Les journaux</title>
    <link rel="stylesheet" href="all.css">
    <script src="jquery-3.6.0.min.js"></script>


</head>

<body>
    <?php include("navbar.php"); ?>

    <main>
        <div>
            <h1>Liste de journaux</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. </br> Duis
                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum.</p>
            <div class="">
                <?php 
            require 'db.php';
            $requete = 'select * from journaux';
            $result = $db->prepare($requete);
            $result -> execute();
            $res = $result-> fetchAll();


            ?>
                <table class="styled-table">
                    <tr>
                        <th>Titre</th>
                        <th>ISBN</th>
                        <th>Éditeur</th>
                        <th>Theme</th>
                    </tr>
                    <?php  
                        for ($i=0; $i<count($res); $i++ ){?>
                <tr class='clickable-row' data-href='<?php echo "info_journal.php?id_isbn=".$res[$i]['id_isbn']; ?>'>
                        <td><?php echo $res[$i]['titre_j'] ?></td>
                        <td><?php echo $res[$i]['id_isbn'] ?></td>
                        <td><?php echo $res[$i]['editeur'] ?></td>
                        <td><?php echo $res[$i]['theme'] ?></td>
                    </tr>
                    <?php  }?>
                   
                </table>


            </div>
    </main>
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