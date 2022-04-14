<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <script src="script.js"></script>
    <link rel="stylesheet" href="login.css">
    <title>connexion</title>
</head>

<body>
    <?php

    require_once 'db.php';

    session_start();

    if (isset($_SESSION["nom_d_utilisateur"]))    //check condition user login not direct back to index.php page
    {
        header("location: index.php");
    }

    if (isset($_REQUEST['submit']))    //button name is "btn_login" 
    {
        $nom_d_utilisateur = strip_tags($_REQUEST["nom_d_utilisateur"]);    //textbox name "txt_nom_d_utilisateur_email"
        $mot_de_passe = strip_tags($_REQUEST["mot_de_passe"]);            //textbox name "txt_mot_de_passe"

        if (empty($nom_d_utilisateur)) {
            $errorMsg[] = "Veuillez saisir votre nom d'utilisateur";    //check "nom_d_utilisateur/email" textbox not empty 
        } else if (empty($mot_de_passe)) {
            $errorMsg[] = "Veuillez saisir votre mot de passe";    //check "passowrd" textbox not empty 
        } else {
            try {
                $select_stmt_nom_d_utilisateur = $db->prepare("SELECT * FROM chercheurs WHERE nom_d_utilisateur = :tnom_d_utilisateur"); //sql select query
                $select_stmt_nom_d_utilisateur->execute(array(':tnom_d_utilisateur' => $nom_d_utilisateur));    //execute query with bind parameter
                $row_nom_d_utilisateur = $select_stmt_nom_d_utilisateur->fetch(PDO::FETCH_ASSOC);


                if ($select_stmt_nom_d_utilisateur->rowCount() > 0)    //check condition database record greater zero after continue
                {
                    if ($nom_d_utilisateur == $row_nom_d_utilisateur["nom_d_utilisateur"]) //check condition user taypable "nom_d_utilisateur or email" are both match from database "nom_d_utilisateur or email" after continue
                    {
                        if (password_verify($mot_de_passe, $row_nom_d_utilisateur["mot_de_passe"])) //check condition user taypable "mot_de_passe" are match from database "mot_de_passe" using mot_de_passe_verify() after continue
                        {
                            $_SESSION["nom_d_utilisateur"] = $row_nom_d_utilisateur["nom_d_utilisateur"];    //session name is "user_login"
                            $loginMsg = "connection avec succès...";        //user login success message
                            header("refresh:2; index.php");            //refresh 2 second after redirect to "welcome.php" page
                            session_start();
                        } else {
                            $errorMsg[] = "Mauvaise combinaison ";
                        }
                    }
                }
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }
    ?>



    <div class="tout">
        <div class="logo">
            <a href="index.php"><img src="img/logo1.jpg" alt="img logo"></a>
        </div>
        <div class="cote-form">

            <form class="form" method="post" name="login">
                <h1>Se connecter</h1>
                <?php
                if (isset($errorMsg)) {
                    foreach ($errorMsg as $error) {
                ?>
                        <div class="alert alert-danger">
                            <strong><?php echo $error; ?></strong>
                        </div>
                    <?php
                    }
                }
                if (isset($loginMsg)) {
                    ?>
                    <div class="alert alert-success">
                        <strong><?php echo $loginMsg; ?></strong>
                    </div>
                <?php
                }
                ?>
                <div class="champs">
                    <input type="text" class="login-input" name="nom_d_utilisateur" placeholder="Nom d'utilisateur" autofocus="true" />
                    <input type="mot_de_passe" class="login-input" name="mot_de_passe" placeholder="Mot de passe" />
                </div>

                <br>
                <input type="submit" value="Login" name="submit" class="login-button" />
                <p>Vous n'avez pas encore de compte ? <a href="register.php">Inscrivez-vous gratuitement</a> </p>
            </form>


        </div>
        <div class="image">
            <img src="RESSOURCES/css/img/login.png" alt="">
        </div>
    </div>


</body>

</html>