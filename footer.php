<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

<footer>
    <div class="colonnes_footer">
        <div class="left_side_footer">
            <div class="le_propos">
                <h6>A PROPOS</h6>
                <p class="le_texte">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Aliquam veritatis rem ipsam doloremque architecto animi
                    a nisi nulla facere pariatur, maiores, ipsa maxime, molestias
                    doloribus amet ab repudiandae quo eveniet. Adipisci, necessitatibus
                    quisquam voluptates autem ab possimus aperiam voluptate a ipsum quasi,
                    harum, molestias sint laborum ullam quaerat iusto sit.
                </p>
                <img src="img/logo.jpg" alt="Logo">
            </div>
        </div>
        <div class="right_side_footer">
            <div class="liens_utiles">
                <h6>LIENS UTILES</h6>
                <a href="<?php if(isset($_SESSION['id']))
                { echo ("/profil_chercheur?id=".$_SESSION['id']); }
                 else { echo ('login') ;} ?>.php">Mon Profil</a>
                <a href="/chercheurs.php">Chercheurs</a>
                <a href="/publication.php">Publications</a>
                <a href="/conferences.php">Conférences</a>
                <a href="/journaux.php">Journaux</a>

            </div>
            <div class="aides">
                <h6>aide</h6>
                <a href="#">Support Technique</a>
                <a href="#">Droits</a>
                <a href="#">F.A.Q</a>
            </div>
            <div class="les_reseaux">
                <h6>suivez-nous</h6>
                <a href="#">
                    <ion-icon class="logo_facebook" name="logo-facebook"></ion-icon>
                </a>
                <a href="#">
                    <ion-icon class="logo_instagram" name="logo-instagram"></ion-icon>
                </a><br>
                <a href="#">
                    <ion-icon class="logo_youtube" name="logo-youtube"></ion-icon>
                </a>
                <a href="#">
                    <ion-icon class="logo_twitter" name="logo-twitter"></ion-icon>
                </a>
            </div>
        </div>
    </div>
    <div class="conditions">
        <a href="#">Politique & Confidentialité </a><SPAN> &nbsp; | &nbsp; </SPAN>
        <a href="#">Termes & Conditions </a><SPAN> &nbsp; | &nbsp; </SPAN>
        <a href="#">Cookies </a><SPAN> &nbsp; | &nbsp; </SPAN>
        <a id="rights">2022 Nom du site. Tout les droits reservée</a>
    </div>
</footer>
<style>
    /*---------------BASIC SETUP--------------*/

    footer {
        font-size: 20px;
        background-color: #fff;
        color: #1f1f1f;
        font-family: 'lato', 'arial', sans-serif;
        font-weight: 300;
        text-rendering: optimizeLegibility;

        margin-top: 80px;
        padding-bottom: 20px;
        background-image: url("img/footer-background.png");
        background-repeat: no-repeat, repeat;
        background-size: cover;
        font-size: 15px;
        background-color: #454545;
    }

    .colonnes_footer {
        padding: 30px 0;
        background-size: cover;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        color: #d5d5d5;
    }

    .colonnes_footer a {
        text-decoration: none;
        color: #D5D5D5;
        transition: color 0.2s;
    }

    .colonnes_footer a:hover,
    .colonnes_footer a:active {
        color: #a0a0a0;
    }

    .right_side_footer h6 {
        font-size: 120%;
        font-weight: 100;
        text-transform: uppercase;
        padding: 0 0 0 0;
    }

    .right_side_footer {
        display: flex;
        flex-direction: row;
        width: 35%;
    }

    .right_side_footer a {
        padding: 3px 0;
    }

    .left_side_footer {
        width: 35%;
    }

    .le_propos h6 {
        font-size: 110%;
        padding: 0 0 20px 0;
    }

    .le_propos img {
        padding: 10px 0 0 0;
        width: 50px;
        height: auto;
    }

    .aides,
    .liens_utiles {
        display: flex;
        flex-direction: column;
        padding: 0 20px 0 20px;
    }

    .colonnes_footer a:hover,
    .colonnes_footer a:active,
    .conditions a:hover,
    .conditions a:active {
        color: gray;
    }

    .conditions {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    .conditions a {
        color: #d5d5d5;
        text-decoration: none;
        transition: color 0.5s;
    }

    .conditions span {
        font-size: 120%;
        color: grey;
    }

    .conditions p {
        color: black;
    }


    #rights{
        color: black;
    }
    /*----------------------------------------------*/
    /*--------------footer icons ---------------------*/
    .logo_facebook,
    .logo_instagram,
    .logo_twitter,
    .logo_youtube {
        padding: 8px 5px 0 0;
        font-size: 250%;
        transition: color 0.2s;
    }

    .logo_facebook:hover {
        color: #4267B2
    }

    .logo_instagram:hover {
        color: rgb(150, 46, 106);
    }

    .logo_youtube:hover {
        color: #FF0000;
    }

    .logo_twitter:hover {
        color: #1DA1F2;
    }
</style>