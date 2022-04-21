<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Les journaux</title>
    <link rel="stylesheet" href="journaux.css">
    <link rel="stylesheet" href="all.css">
    <style>
    table,
    th,
    td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
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

            if(!$result ){
                echo 'Erreur lors de l\'execution de la requete' .mysqli_error();
            }
            else{
            ?>
                <table>
                    <tr>
                        <th>titre_j</th>
                        <th>id_isbn</th>
                        <th>editeur</th>
                        <th>theme</th>
                    </tr>
                    <?php  
                        for ($i=0; $i<count($res); $i++ ){?>
                    <tr>
                        <td><?php echo $res[$i]['titre_j'] ?></td>
                        <td><?php echo $res[$i]['id_isbn'] ?></td>
                        <td><?php echo $res[$i]['editeur'] ?></td>
                        <td><?php echo $res[$i]['theme'] ?></td>
                    </tr>
                    <?php  }?>
                    <?php } ?>
                </table>
                <?php
        ?>

            </div>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>