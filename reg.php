<?php
require_once "db.php";
session_start();

if (isset($_REQUEST['btn_register'])) {
    $username  = strip_tags($_REQUEST['txt_username']);
    $password  = strip_tags($_REQUEST['txt_password']);


    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $errorMsg[] = "Entrez votre email s'il vous plait";
    } else if (empty($password)) {
        $errorMsg[] = "Entrez votre mot de passe s'il vous plait";
    } else if (strlen($password) < 7) {
        $errorMsg[] = "Le mot de passe doit se composer d'au moins 7 caractéres";
    } else {

        $select_stmt = $db->prepare("SELECT username FROM chercheurs WHERE username=:uusername"); //sql select query
        $select_stmt->execute(array(':uemail' => $email)); //execute query 
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        if ($row['email'] == $email) {
            $errorMsg[] = "Desolé, cet email d'utilisateur exist déja ! ";  //check condition email already exists 
        } else if (!isset($errorMsg)) //check no "$errorMsg" show then continue
        {
            $new_password = password_hash($password, PASSWORD_DEFAULT); //encrypt password using password_hash()

            $insert_stmt = $db->prepare("INSERT INTO chercheurs	(username,password) VALUES
																(:uusername,:upassword)");     //sql insert query					

            if ($insert_stmt->execute(array(
                ':uusername' => $username,
                ':upassword'  => $password
            ))) {
                $registerMsg = "Register Successfully..... "; //execute query success message
                $_SESSION["email"] = $row["id"];  //session name is "user_login"
                session_start();
                header("refresh:2; login.php");      //refresh 2 second after redirect to "welcome.php" page
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <script src="RESSOURCES/js/registration.js"></script>
    <link rel="stylesheet" href="RESSOURCES/css/registration.css">
    <title>Registration</title>
</head>






<body>
    <nav style="background-color: white;">
        <div class="logo">
            <a href="index.php"><img src="img/logo1.jpg" alt="logo" style="height: 60px; width:auto;"></a>
        </div>
        <p>Avez-vous deja un compte? <a href="login.php">Connectez vous !</a> </p>
        <?php echo ($username); ?>
    </nav>

    <div class="container">
        <div class="split left">
            <h1>Inscription</h1>
            <?php
            if (isset($errorMsg)) {
                foreach ($errorMsg as $error) {
            ?>
                    <div class="alert alert-danger">
                        <strong>FAUX ! <?php echo $error; ?></strong>
                    </div>
                <?php
                }
            }
            if (isset($registerMsg)) {
                ?>
                <div class="alert alert-success">
                    <strong><?php echo $registerMsg; ?></strong>
                </div>
            <?php
            }
            ?>

            <form class="form-inscription" name="form" action="" method="post">
                <div class="informations_personnelles">
                    <h2>informations personnelles</h2>
                    <div>
                        <div class="field-container">
                            <input class="field-input" id="inputid" name="txt_nom" type="text" placeholder=" ">
                            <label class="field-placeholder" for="inputName">Nom</label>
                        </div>
                    </div>
                    <div>
                        <div class="field-container">
                            <input class="field-input" id="inputid" name="txt_prenom" type="text" placeholder=" ">
                            <label class="field-placeholder" for="inputName">Prénom</label>
                        </div>
                    </div>
                    <div>
                        <div class="field-container">
                            <input class="field-input" id="inputid" name="txt_date_de_naissance" type="text" placeholder=" ">
                            <label class="field-placeholder" for="inputName">Date de naissance</label>
                        </div>
                    </div>
                    <div>
                        <div class="field-container">
                            <input class="field-input" id="inputid" name="txt_genre" type="text" placeholder=" ">
                            <label class="field-placeholder" for="inputName">Genre</label>
                        </div>
                    </div>
                    <div>
                        <div class="field-container">
                            <input class="field-input" id="inputid" name="txt_pays" type="text" placeholder=" ">
                            <label class="field-placeholder" for="inputName">Pays</label>
                        </div>
                    </div>
                </div>
                <div class="coordonnees">
                    <h2>Coordonnées</h2>
                    <div>
                        <div class="field-container">
                            <input class="field-input" id="inputid" name="txt_username" type="text" placeholder=" ">
                            <label class="field-placeholder" for="inputName">Username</label>
                        </div>
                    </div>
                    <div>
                        <div class="field-container">
                            <input class="field-input" id="inputid" name="txt_password" type="password" placeholder=" ">
                            <label class="field-placeholder" for="inputName">Password</label>
                        </div>
                    </div>
                </div>


                <div class="travail_et_grade">
                    <h2>Travail et Grade</h2>
                </div>

                <div class="structure d'affiliation">
                    <h2>structure d'affiliation</h2>
                </div>

                <div class="biographie">
                    <h2>biographie</h2>
                </div>

                <div class="thématiques_de_recherche">
                    <h2>thématiques de recherche</h2>
                </div>

                <div class="curriculum vitae">
                    <h2>curriculum vitae</h2>
                </div>

                <div class="informations_confidentielles">
                    <h2>Informations confidentielles</h2>
                </div>
                
                <div class="condition">
                    <input type="checkbox" id="accepter">
                    <label for="accepter"> j'ai lu j'ai accepter les <a href="">Conditions generales d'utilisation</a>et <a href="">Politique de protection des donnees personnelles</a></label>
                </div>

                <input class="btn" type="submit" name="btn_register" value="S'inscrire">
            </form>
        </div>
        <div class="split_right">
        </div>



    </div>



</body>

</html>