<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <script src="script.js"></script>
    <link rel="stylesheet" href="/login.css">
    <title>connexion</title>
</head>

<body>
    <?php

    require_once 'db.php';
    echo password_hash("admin", PASSWORD_DEFAULT);

    session_start();

    if (isset($_SESSION["username"]))    //check condition user login not direct back to index.php page
    {
        header("location: index.php");
    }

    if (isset($_REQUEST['submit']))    //button name is "btn_login" 
    {
        $username = strip_tags($_REQUEST["username"]);    //textbox name "txt_username_email"
        $password = strip_tags($_REQUEST["password"]);            //textbox name "txt_password"

        if (empty($username)) {
            $errorMsg[] = "Veuillez saisir votre nom d'utilisateur";    //check "username/email" textbox not empty 
        } else if (empty($password)) {
            $errorMsg[] = "Veuillez saisir votre mot de passe";    //check "passowrd" textbox not empty 
        } else {
            try {
                $select_stmt_username = $db->prepare("SELECT * FROM chercheurs WHERE username = :tusername"); //sql select query
                $select_stmt_username->execute(array(':tusername' => $username));    //execute query with bind parameter
                $row_username = $select_stmt_username->fetch(PDO::FETCH_ASSOC);


                if ($select_stmt_username->rowCount() > 0)    //check condition database record greater zero after continue
                {
                    if ($username == $row_username["username"]) //check condition user taypable "username or email" are both match from database "username or email" after continue
                    {
                        if (password_verify($password, $row_username["password"])) //check condition user taypable "password" are match from database "password" using password_verify() after continue
                        {
                            $_SESSION["username"] = $row_username["username"];    //session name is "user_login"
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
            <a href="index.php"><img src="RESSOURCES/css/img/logo.png" alt="img logo"></a>
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
                    <input type="text" class="login-input" name="username" placeholder="Nom d'utilisateur" autofocus="true" />
                    <input type="password" class="login-input" name="password" placeholder="Mot de passe" />
                </div>

                <br>
                <input type="submit" value="Login" name="submit" class="login-button" />
                <p>Vous n'avez pas encore de compte ? <a href="registration.php">Inscrivez-vous gratuitement</a> </p>
            </form>


        </div>
        <div class="image">
            <img src="RESSOURCES/css/img/login.png" alt="">
        </div>
    </div>


</body>

</html>