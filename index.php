<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link type="text/css" rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            let num = setInterval(function(){
                let distance = parseInt($('#dia-images').css('left'));
                distance-= 300
                if(distance<- 300*($('img').length-1)){{distance = 0}}
                $('#dia-images').animate({left: distance });
            },2000);

            $('#dia-images').hover(function(){
                if(num!==false){
                    clearInterval(num);
                    num=false;
                }
                else{
                    num = setInterval(function(){
                        let distance = parseInt($('#dia-images').css('left'));
                        distance-= 300
                        if(distance<-300*($('img').length-1)){distance = 0};
                        $('#dia-images').animate({left: distance });
                    },2000);
                };
            })
        });
    </script>
</head>

<body>
    <header class="main-header clearfix">
        <?php include("navbar.php"); 
        ?>
    </header>

    <main>
        <div class="left">
        <?php 
             ?>
            <div class="presentation">
                <h3> <u> Présentation : </u> </h3>
                <p>« LE NOM DU SITE » offre une plateforme de collaboration entre chercheurs du monde entier. </br>Il
                    partage des travaux de recherche dans des domaines différents (Sciences de données, Sciences
                    humaine, Astronomie, Economie, etc.). </br> Il présente aussi les différentes conférences et
                    journaux dans le but de diffuser les informations liées à chaque conférence et de chaque domaine de
                    recherche. </p>
            </div>

            <div class="diaporama">
                <div id="dia-images">
                <?php 
                    require 'db.php';
                    $sql = $db->prepare("SELECT * from information ORDER BY date DESC LIMIT 4");
                    $sql-> execute();
                    while ($rows = $sql->fetch()) {?>
                        <a href="<?php echo "informations.php?nom_info=".$rows['nom_info']?>">
                            <img class="slide-img" src="img/<?php echo $rows['info_img']?>"  > </a>
                    <?php }?>
                </div>
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
            $requete = 'SELECT * FROM evenement';
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
            $query = $db->prepare("SELECT nom_info, contenu from information ORDER BY date");
            $query->execute();
            while ($row = $query->fetch()) { ?>
        <div class="info-image">
            <a href="<?php echo "informations.php?nom_info=".$row['nom_info']; ?>">
                <h3> <?php echo $row['nom_info'] ?> : </h3> </a>
            <p> <?php echo $row['contenu'] ?> </p>
        </div> </br>
        <?php }?>
    </div>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>