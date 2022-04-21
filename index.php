<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link type="text/css" rel="stylesheet" href="accueil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        console.log("Document chargÃ©");
        let num = setInterval(function() {


            let distance = parseInt($('#dia-images').css('left'));
            distance -= 300
            if (distance < -300 * ($('img').length - 1)) {
                distance = 0
            };
            $('#dia-images').animate({
                left: distance
            });
            console.log($('#dia-images').css('left'));
        }, 2000);

        $('#dia-images').hover(function() {

            if (num !== false) {
                clearInterval(num);
                num = false;
            } else {
                num = setInterval(function() {


                    let distance = parseInt($('#dia-images').css('left'));
                    distance -= 300
                    if (distance < -300 * ($('img').length - 1)) {
                        distance = 0
                    };
                    $('#dia-images').animate({
                        left: distance
                    });
                    console.log($('#dia-images').css('left'));
                }, 2000);
            };
        })

        /* recupere le dernier element  
        let arr1=[0, 2, 1, 5, 8];  
          const getLastArrItem = (arr) => { 
              let lastItem=arr[arr.length-1];  
              console.log(`Last element is ${lastItem}`); 
          }  
          getLastArrItem(arr1); */
    });
    </script>

    <style>
    /** event à droite*/
    main {
        display: flex;
        flex-direction: row;
    }

    .evenement {
        width: 30%;
        padding: top;
    }

    .test {
        border: 1px solid black;
    }

    /**bordure du tableau */
    table,
    th,
    td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
    }

    /* Le cadre principal. */
    .diaporama {
        /* On le restreint exactement à la taille d'une seule image. */
        width: 300px;
        height: 300px;
        /* Tout ce qui déborde est caché. Donc, une seule image est visible. */
        overflow: hidden;
        /* Ceci sert uniquement pour créer un containing block  */
        /* qui permet de positionner les flêches avec position: absolute  */
        position: relative;
    }

    /* Un div très très large */
    /* Il contient toutes les images disposées horizontalement */
    /* Il déborde de son parent */
    #dia-images {
        width: 10000px;
        /* Trés important: c'est ce qui permet de décaler ce div en JS avec "left: ...px;" */
        position: relative;
        /* Eviter les petits espaces entre les images */
        font-size: 0;
        /* initialisation à 0 (défaut "auto") : nécessaire sur Chrome */
        left: 0px;
    }

    .slide-img {
        width: 300px;
        height: 300px;
    }
    </style>
</head>

<body>
    <header class="main-header clearfix">
        <?php include("navbar.php"); ?>
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
                <div id="dia-images">
                    <a href="/informations.php">
                        <img class="slide-img" src="img/galaxie.jpg">
                        <img class="slide-img" src="img/lune.jpg">
                        <img class="slide-img" src="img/mars.jpg">
                    </a>
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
            require 'db.php';
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
            require 'db.php';
            $sql = 'select nom_info, contenu from information';
            $resultat = $db->prepare($sql);
            $resultat->execute();
            $resu = $resultat->fetchAll();

            if (!$resultat) {
                echo 'Erreur lors de l\'execution de la requete' . mysqli_error();
            } else {
            ?> 
                <?php for ($i = 0; $i < count($resu); $i++) { ?>
                    <div class="test">
                <h3> <?php echo $resu[$i]['nom_info'] ?> </h3>
                <p> <?php echo $resu[$i]['contenu'] ?> </p>
                </div>   </br>
                <?php  }?>
            <?php } ?>
        </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>