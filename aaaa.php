<?php

require_once "db.php";

if (isset($_REQUEST['btn_register'])) //button name "btn_register"
{
    $nom = strip_tags($_REQUEST["txt_nom"]);
    $prenom = strip_tags($_REQUEST["txt_prenom"]);
    $date_de_naissance = strip_tags($_REQUEST["txt_date_de_naissance"]);
    $genre = strip_tags($_REQUEST["txt_genre"]);
    $pays = strip_tags($_REQUEST["txt_pays"]);
    $email = strip_tags($_REQUEST["txt_email"]);
    $phone = strip_tags($_REQUEST["txt_phone"]);
    $adresse = strip_tags($_REQUEST["txt_adresse"]);
    $travail = strip_tags($_REQUEST["txt_travail"]);
    $grade = strip_tags($_REQUEST["txt_grade"]);
    $structure_d_affiliation = strip_tags($_REQUEST["txt_structure_d_affiliation"]);
    $affiliation = strip_tags($_REQUEST["txt_affiliation"]);
    $bio = strip_tags($_REQUEST["txt_bio"]);
    $thematique = strip_tags($_REQUEST["txt_thematique"]);
    $cv = strip_tags($_REQUEST["cv"]);
    $nom_d_utilisateur = strip_tags($_REQUEST["txt_nom_d_utilisateur"]);
    $mot_de_passe = strip_tags($_REQUEST["txt_mot_de_passe"]);


    try {
        $select_stmt = $db->prepare("SELECT nom_d_utilisateur, email FROM chercheurs 
										WHERE username=:uname OR email=:uemail"); // sql select query

        $select_stmt->execute(array(':uname' => $nom_d_utilisateur, ':uemail' => $email)); //execute query 
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        if ($row["nom_d_utilisateur"] == $nom_d_utilisateur) {
            $errorMsg[] = "Sorry username already exists";    //check condition username already exists 
        } else if ($row["email"] == $email) {
            $errorMsg[] = "Sorry email already exists";    //check condition email already exists 
        } else if (!isset($errorMsg)) //check no "$errorMsg" show then continue
        {
            $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT); //encrypt password using password_hash()

            $insert_stmt = $db->prepare("INSERT INTO chercheurs (nom, prenom, date_de_naissance, genre, pays, email, num_tel,
            code_postal,travail, grade, structure, biographie, thematique, nom_d_utilisateur, mot_de_passe)
             VALUES (:unom,:uprenom,:udate_de_naissance,:ugenre,:upays,:uemail,:unum_tel,:uadresse,:utravail,:ugrade,:str_d_affiliation,
             :ubio,:uthematique,:unom_d_utilisateur,:umot_de_passe_hash)");         //sql insert query					

            if ($insert_stmt->execute(array(
                ':unom' => $nom,
                ':uprenom' => $prenom,
                ':udate_de_naissance' => $date_de_naissance,
                ':ugenre' => $genre,
                ':upays' => $pays,
                ':uemail' => $email,
                ':unum_tel' => $numero_tel,
                ':uadresse' => $adresse,
                ':utravail' => $travail,
                ':ugrade' => $grade,
                ':str_d_affiliation' => $str_d_affiliation,
                ':ubio' => $bio,
                ':uthematique' => $thematique,
                ':unom_d_utilisateur' => $nom_d_utilisateur,
                ':umot_de_passe_hash' => $mot_de_passe_hash
            ))) {

                $registerMsg = "Register Successfully..... Please Click On Login Account Link"; //execute query success message
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>Login and Register Script using PHP PDO with MySQL : onlyxcodes.com</title>
    <script src="js/jquery-1.12.4-jquery.min.js"></script>
    <link rel="stylesheet" href="all.css">


</head>

<body>


    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://www.onlyxcodes.com/">onlyxcodes</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="http://www.onlyxcodes.com/2019/04/login-and-register-script-in-php-pdo.html">Back to Tutorial</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <div class="wrapper">

        <div class="container">

            <div class="col-lg-12">

                <?php
                if (isset($errorMsg)) {
                    foreach ($errorMsg as $error) {
                ?>
                        <div class="alert alert-danger">
                            <strong>WRONG ! <?php echo $error; ?></strong>
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
                <center>
                    <h2>Register Page</h2>
                </center>
                <form method="post" class="form-horizontal">


                    <div class="form-group">
                        <label class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-6">
                            <input type="text" name="txt_username" class="form-control" placeholder="enter username" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="text" name="txt_email" class="form-control" placeholder="enter email" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-6">
                            <input type="password" name="txt_password" class="form-control" placeholder="enter passowrd" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9 m-t-15">
                            <input type="submit" name="btn_register" class="btn btn-primary " value="Register">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9 m-t-15">
                            You have a account register here? <a href="index.php">
                                <p class="text-info">Login Account</p>
                            </a>
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>