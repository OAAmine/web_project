<?php
    if (isset($_POST['submit'])) {
        if (!empty($_POST['tri'])) {
            $selected = $_POST['tri'];
            header('Location:' . $current_url . '?trier_par=' . $selected);
        }
    }



    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   
    if (isset($_GET['trier_par'])) {
        echo 'eee';
        $url_components = parse_url($url);
        parse_str($url_components['query'], $params);
        $trier_par = $params['trier_par'];
    }

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Les conférences</title>
    <link rel="stylesheet" href="all.css">
    <script src="jquery-3.6.0.min.js"></script>

</head>

<body>


    <?php include("navbar.php");
    $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>

    <main>
        <div>
            <h1>Liste de conférences</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. </br> Duis
                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum.</p>

            <form action="" method="post">
                <label for="tri">Trier par:</label>
                <select name="tri" id="tri">
                    <option selected value=""></option>
                    <option value="titre_c">Titre</option>
                    <option value="abreviation">Abreviation</option>
                    <option value="sujet">Sujet</option>
                    <option value="date_publication">Date de publication</option>
                    <option value="date_inscription">Date d'inscription</option>
                    <option value="conferencier">Conferencier</option>
                    <option value="pays">Pays</option>
                </select>
                <input type="submit" name="submit" value="Trier">
            </form>



            <div class="table_conf">
                <?php
                require 'db.php';



                if (isset($trier_par)) {
                    $requete = "select * from conferences order by " . $trier_par;
                } else {
                    $requete = "select * from conferences order by titre_c";
                }
                $result = $db->prepare($requete);
                $result->execute();
                $res = $result->fetchAll();
                $row_cnt = $result->rowCount();


                if (!$result) {
                    echo 'Erreur lors de l\'execution de la requete' . mysqli_error();
                } else {
                ?>
                    <table class="styled-table">
                        <tr>
                            <th>titre_c</th>
                            <th>abreviation</th>
                            <th>sujet</th>
                            <th>date_inscription</th>
                            <th>conferencier</th>
                            <th>pays</th>
                        </tr>
                        <?php
                        if ($row_cnt > 0) {
                            for ($i = 0; $i < count($res); $i++) { ?>
                                <tr class='clickable-row' data-href='<?php echo "info_conference.php?abreviation=" . $res[$i]['abreviation']; ?>'>
                                    <td><?php echo $res[$i]['titre_c'] ?></td>
                                    <td><?php echo $res[$i]['abreviation'] ?></td>
                                    <td><?php echo $res[$i]['sujet'] ?></td>
                                    <td><?php echo $res[$i]['date_inscription'] ?></td>
                                    <td><?php echo $res[$i]['conferencier'] ?></td>
                                    <td><?php echo $res[$i]['pays'] ?></td>
                                </tr>
                            <?php } ?>
                    <?php }
                    } ?>
                    </table>
            </div>
    </main>
    <?php

    ?>
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    <?php include("footer.php"); ?>
</body>

</html>