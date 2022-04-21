<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Les conférences</title>
    <link rel="stylesheet" href="conferences.css">
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
            <h1>Liste de conférences</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. </br> Duis
                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum.</p>
            <div class="">
                <?php
                require 'db.php';
                $requete = "select * from conferences order by date_publication DESC";
                $result = $db->prepare($requete);
                $result->execute();
                $res = $result->fetchAll();
                $row_cnt = $result->rowCount();


                if (!$result) {
                    echo 'Erreur lors de l\'execution de la requete' . mysqli_error();
                } else {
                ?>
                <table>
                    <tr>
                        <th>titre_c
                            <button class="titre_c" type="button"> trier </button>
                        </th>
                        <th>abreviation
                            <button class="abreviation" type="button"> trier </button>
                        </th>
                        <th>sujet
                            <button class="sujet" type="button"> trier </button>
                        </th>
                        <th>date_publication
                            <button class="date-publication" type="button"> trier </button>
                        </th>
                        <th>date_inscription
                            <button class="date_inscription" type="button"> trier </button>
                        </th>
                        <th>conferencier
                            <button class="conferencier" type="button"> trier </button>
                        </th>
                        <th>pays
                            <button class="pays" type="button"> trier </button>
                        </th>
                    </tr>
                    <?php
                        if ($row_cnt > 0) {
                            for ($i = 0; $i < count($res); $i++) { ?>
                    <tr>
                        <td><?php echo $res[$i]['titre_c'] ?></td>
                        <td><?php echo $res[$i]['abreviation'] ?></td>
                        <td><?php echo $res[$i]['sujet'] ?></td>
                        <td><?php echo $res[$i]['date_publication'] ?></td>
                        <td><?php echo $res[$i]['date_inscription'] ?></td>
                        <td><?php echo $res[$i]['conferencier'] ?></td>
                        <td><?php echo $res[$i]['pays'] ?></td>
                    </tr>
                            <?php } ?>
                        <?php }
                    } ?>
            </table>
            </div>
            <footer>
    </main>
    <?php include("footer.php"); ?>
    </footer>
</body>

</html>