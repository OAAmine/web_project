<?php
session_start();
if (!isset($_SESSION['identifiant'])) {
    header('Location: admin.php');
}
    require_once('db.php');
    if (isset($_REQUEST['modifier_logo'])) {
        $target_path = "img/";
        $target_path = $target_path . basename($_FILES['logo']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_path, PATHINFO_EXTENSION));

        $temp = explode(".", $_FILES["logo"]["name"]);
        $newfilename = "logo" . '.' . end($temp);



        if ($imageFileType != "jpg") {
            echo "Sorry, only JPG files are allowed.";
            $uploadOk = 0;
        }


        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["logo"]["tmp_name"], "img/" . $newfilename)) {
                echo "File uploaded successfully!";
            } else {
                echo "Sorry, file not uploaded, please try again!";
            }
        }
    }


    if (isset($_REQUEST['inserer_information'])) {

        $nom_info = strip_tags($_REQUEST["txt_nom"]);
        $contenu = strip_tags($_REQUEST["txt_contenu_information"]);
        $date = strip_tags($_REQUEST["txt_date_information"]);
        $info_img = strip_tags($_REQUEST["info_img"]);

        $insert_stmt = $db->prepare("INSERT INTO information (nom_info, contenu, info_img, date)
    VALUES (:unom,:ucontenu,:uinfo,:udate)");
        $insert_stmt->execute(array(
            ':unom' => $nom_info,
            ':ucontenu' => $contenu,
            ':uinfo' => $info_img,
            ':udate' => $date
        ));
    }


    if (isset($_REQUEST['inserer_evenement'])) {

        $nom_event = strip_tags($_REQUEST["txt_nom_evenement"]);
        $date_event = strip_tags($_REQUEST["txt_date_evenement"]);

        $insert_stmt = $db->prepare("INSERT INTO evenement
    VALUES (:unom,:udate)");
        $insert_stmt->execute(array(
            ':unom' => $nom_event,
            ':udate' => $date_event
        ));
    }


    if (isset($_REQUEST['inserer_publication'])) {

        $nom_publication = strip_tags($_REQUEST["txt_titre_publiication"]);
        $date_publication = strip_tags($_REQUEST["txt_date_publication"]);
        $contenu_publication = strip_tags($_REQUEST["txt_contenu_publication"]);


        $insert_stmt = $db->prepare("INSERT INTO publication
    VALUES (:unom,:udate,:ucontenu)");
        $insert_stmt->execute(array(
            ':unom' => $nom_publication,
            ':udate' => $date_publication,
            ':ucontenu' => $contenu_publication
        ));
    }


    if (isset($_REQUEST['inserer_conference'])) {

        $titre_conference = strip_tags($_REQUEST["txt_titre_conference"]);
        $abr_conference = strip_tags($_REQUEST["txt_abreviation_conference"]);
        $sujet_conference = strip_tags($_REQUEST["txt_sujet_conference"]);
        $date_conference = strip_tags($_REQUEST["txt_date_conference"]);
        $conferencier = strip_tags($_REQUEST["txt_conferencier"]);
        $pays_conference = strip_tags($_REQUEST["txt_pays_conference"]);


        $insert_stmt = $db->prepare("INSERT INTO conferences
VALUES (:unom,:uabr,:usujet,:udate,:uconferencier,:upays)");
        $insert_stmt->execute(array(
            ':unom' => $titre_conference,
            ':uabr' => $abr_conference,
            ':usujet' => $sujet_conference,
            ':udate' => $date_conference,
            ':uconferencier' => $conferencier,
            ':upays' => $pays_conference
        ));
    }



    if (isset($_REQUEST['inserer_journal'])) {
        $titre_journal = strip_tags($_REQUEST["txt_titre_journal"]);
        $isbn_journal = strip_tags($_REQUEST["txt_isbn_journal"]);
        $editeur_journal = strip_tags($_REQUEST["txt_editeur_journal"]);
        $theme_journal = strip_tags($_REQUEST["txt_theme_journal"]);


        $insert_stmt = $db->prepare("INSERT INTO journaux
VALUES (:unom,:uisbn,:uediteur,:utheme)");
        $insert_stmt->execute(array(
            ':unom' => $titre_journal,
            ':uisbn' => $isbn_journal,
            ':uediteur' => $editeur_journal,
            ':utheme' => $theme_journal
        ));
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="all.css">
        <link rel="stylesheet" href="forms.css">

        <title>Document</title>
    </head>

    <body>
        <a class="disconnect_btn" href="/logout.php">Déconnexion</a>
        <?php
        require_once 'db.php';

        ?>
        <div class="modifier_logo">
            <form class="form" method="post" name="modifier_logo" id="formulaire_d_inscription" enctype="multipart/form-data">
                <h2>Changer le logo :</h2>
                <label for="logo">Choisir une image de type .jpg:</label>
                <input name="logo" type="file" id="logo" accept="image/.jpg">
                <input id="modifier_logo" class="btn" type="submit" name="modifier_logo" value="Changer">
            </form>
        </div>

        <div class="modifier_couleur_de_fond">


        </div>
        <!-------------------------------------------------------------------------------------------------->
        <div class="inserer_information">
            <form class="form" method="post" name="inserer_information" id="formulaire_d_inscription">
                <h2>Ajouter une information :</h2>
                <p><input placeholder="Nom" oninput="this.className = ''" name="txt_nom"></p>
                <p><textarea placeholder="Contenu" oninput="this.className = ''" name="txt_contenu_information"></textarea></p>
                <label for="info_img">Choisir une image qui represente l'information ou l'évenement:</label>
                <p><input name="info_img" type="file" id="imageFile" accept="image/*"></p>
                <label for="txt_date_information">Préciser la date limite d'inscription</label>
                <p><input id="date" type="date" placeholder="Date" oninput="this.className = ''" name="txt_date_information"></p>
                <input id="inscrire" class="btn" type="submit" name="inserer_information" value="Ajouter">
            </form>
        </div>


        <!-------------------------------------------------------------------------------------------------->


        <div class="inserer_evenement">

            <form class="form" method="post" name="inserer_evenement" id="formulaire_d_inscription">
                <h2>Ajouter un évenement :</h2>
                <p><input placeholder="Nom" oninput="this.className = ''" name="txt_nom_evenement"></p>
                <label for="txt_date_evenement">Préciser la date de l'évenement</label>
                <p><input id="date" type="date" placeholder="Date" oninput="this.className = ''" name="txt_date_evenement"></p>
                <input id="inscrire" class="btn" type="submit" name="inserer_evenement" value="Ajouter">
            </form>

        </div>
        <!-------------------------------------------------------------------------------------------------->

        <div class="inserer_publication">
            <form class="form" method="post" name="inserer_publication" id="formulaire_d_inscription">
                <h2>Ajouter une publication :</h2>
                <p><input placeholder="Titre" oninput="this.className = ''" name="txt_titre_publiication"></p>
                <label for="txt_date_publication">Date de publication : </label>
                <p><input id="date" type="date" placeholder="Date" oninput="this.className = ''" name="txt_date_publication"></p>
                <p><textarea placeholder="Contenu" oninput="this.className = ''" name="txt_contenu_publication"></textarea></p>
                <input id="inscrire" class="btn" type="submit" name="inserer_publication" value="Ajouter">
            </form>
        </div>
        <!-------------------------------------------------------------------------------------------------->

        <div class="inserer_conference">
            <form class="form" method="post" name="inserer_conference" id="formulaire_d_inscription">
                <h2>Ajouter une conférence :</h2>
                <p><input placeholder="Titre" oninput="this.className = ''" name="txt_titre_conference"></p>
                <p><input placeholder="Abréviation" oninput="this.className = ''" name="txt_abreviation_conference"></p>
                <p><input placeholder="Sujet" oninput="this.className = ''" name="txt_sujet_conference"></p>
                <label for="txt_date_conference">Date de conférence : </label>
                <p><input id="date" type="date" placeholder="Date limite d'inscription" oninput="this.className = ''" name="txt_date_conference"></p>
                <p><input placeholder="Conférencier" oninput="this.className = ''" name="txt_conferencier"></p>
                <p><input placeholder="Pays" oninput="this.className = ''" name="txt_pays_conference"></p>
                <input id="inscrire" class="btn" type="submit" name="inserer_conference" value="Ajouter">
            </form>
        </div>
        <!-------------------------------------------------------------------------------------------------->

        <div class="inserer_journal">
            <form class="form" method="post" name="inserer_journal" id="formulaire_d_inscription">
                <h2>Ajouter un journal :</h2>
                <p><input placeholder="Titre" oninput="this.className = ''" name="txt_titre_journal"></p>
                <p><input placeholder="ISBN" oninput="this.className = ''" name="txt_isbn_journal"></p>
                <p><input placeholder="Éditeur" oninput="this.className = ''" name="txt_editeur_journal"></p>
                <p><input placeholder="Théme" oninput="this.className = ''" name="txt_theme_journal"></p>
                <input id="inscrire" class="btn" type="submit" name="inserer_journal" value="Ajouter">
            </form>


        </div>




    <?php

    ?>
    </body>

    </html>