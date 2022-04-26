<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link type="text/css" rel="stylesheet" href="accueil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        <?php 
        
        require 'db.php';
        $sql = $db->query("SELECT * from information ORDER BY date DESC");
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

            $nom_info = array_column($rows, 'nom_info');
            $js_array = json_encode($nom_info);
            echo "var nom_info = ". $js_array . ";\n";

            $images = array_column($rows, 'info_img');
            $js_array = json_encode($images);
            echo "var slide = ". $js_array . ";\n";

        ?>

var tab = slide;
        var i = 0;
        var time = null;

        function affiche() {
            document.getElementById("diapo_link").href="'informations.php?nom_info='"+nom_info[i]+"";
            document.getElementById("diapo").src=tab[i];
            i++;
            if (i>=4) i=0;
        }
        function start() {
            time = setInterval(function() {affiche()}, 2000);
        }
        function stop() {
            clearInterval(time);
        }
    </script>

    <style>
    .presentation{
        width: 60%;
        padding-top:3%;
        padding-left:5%;
    }

    .objectif {
        width: 60%;
        padding-top:3%;
        padding-left:5%;
    }

    .information{
        width: 60%;
        padding-left: 2%;
    }

    main {
        display: flex;
        flex-direction: row;
    }

    .evenement {
        width: 30%;
        padding: top;
    }

    .info-image {
        border: 4px solid black;
        padding: 3%;
        margin: 2%;
    }

    table,
    th,
    td {
        padding: 2%;
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <header class="main-header clearfix">
        <?php include("navbar.php"); 
        ?>
    </header>

    <main>
        <div class="left">
            <div class="presentation">
                <h3> <u> Présentation : </u> </h3>
                <p>« LE NOM DU SITE » offre une plateforme de collaboration entre chercheurs du monde entier. </br>Il
                    partage des travaux de recherche dans des domaines différents (Sciences de données, Sciences
                    humaine, Astronomie, Economie, etc.). </br> Il présente aussi les différentes conférences et
                    journaux dans le but de diffuser les informations liées à chaque conférence et de chaque domaine de
                    recherche. </p>
            </div>

            <div class="diaporama">
           <?php $sql = $db->prepare("SELECT * from information ORDER BY date DESC");
                    $sql-> execute();
                    while ($rows = $sql->fetch()) { ?>
                <a id="diapo_link" href="informations.php?nom_info=<?php echo $rows['nom_info'] ?>"  >
                <img id="diapo" name="diapo" src="img/<?php echo $row['info_img'] ?>" widht="384" height="296" alt="" onmouseover="stop()" onmouseout="start()" >
                    </a>
                    <?php }?>
            </div>

            <div class="objectif">
                <h3> <u> Objectif : </u> </h3>
                <ul>
                    <li>Créer une plateforme partagée pour le travail collaboratif des chercheurs à travers le monde.
                    </li>
                    <li>Faire prendre conscience aux managers des enjeux de la cohésion des travaux de recherches. </li>
                    <li> Partager les connaissances entre les différentes équipes de recherches, et les différents
                        domaines de recherche. </li>
                </ul>
            </div>
        </div>

        <div class="evenement">
            <h1> évènement </h1>
            <?php 
            $requete = 'select * from evenement';
            $result = $db->prepare($requete);
            $result->execute();
            $res = $result->fetchAll();

            if (!$result) {
                echo 'Erreur lors de l\'execution de la requete' . mysqli_error();
            } else {
            ?> <table>
                <tr>
                    <th>nom de l'évènement</th>
                    <th>date de l'évènement</th>
                </tr>
                <?php for ($i = 0; $i < count($res); $i++) { ?>
                <tr>
                    <td><?php echo $res[$i]['nom_event'] ?></td>
                    <td> <?php echo $res[$i]['date_event'] ?></td>
                </tr>
                <?php  } ?>
            </table>
            <?php } ?>
        </div>
    </main>

    <div class="information">
        <?php
            $query = $db->prepare("SELECT nom_info, contenu from information");
            $query->execute();

            while ($row = $query->fetch()) { ?>
        <div class="info-image">
            <a href="<?php echo "informations.php?nom_info=".$row['nom_info']; ?>">
                <h3> <?php echo $row['nom_info'] ?> : </h3>
            </a>

            <p> <?php echo $row['contenu'] ?> </p>
        </div> </br>
        <?php  }?>
    </div>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>



            
<a id="diapo_link" href="<?php echo "informations.php?nom_info=".$rows['nom_info']?>">
                    <img id="diapo" name="diapo" src="img/<?php echo $rows['info_img']?>" widht="384" height="296" alt="" onmouseover="stop()" onmouseout="start()" >
                    </a>

