<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="all.css">
    <title>Document</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Verdana, sans-serif;
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            width: 100%;
            position: relative;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }





        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {
                font-size: 11px
            }
        }


        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }

        .evenement {
            width: 20%;
            padding-right: 15px;

        }

        .diaporama {
            width: 100%;
            padding: 0 15px 15px 15px;
        }

        .row_info {

            display: flex;
            flex-direction: row;
        }

        .carte_info {
            border-radius: 10px;
            padding: 5px;
            background-color:  rgb(25, 25, 112, .5);
            margin: 5px  5px;
            width: 20%;
        }

        .autres_info {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>
    <?php require 'db.php';

    include("navbar.php"); ?>
    <div class="presentatiion">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi facere eveniet error! Repellat voluptatibus minima dolore ab assumenda quibusdam fugiat quos tempore reprehenderit consequuntur, doloribus doloremque eum iste non quasi, dolor consectetur. Illo aperiam praesentium hic est ipsam. Quisquam, sit vero numquam, distinctio, consequatur voluptatibus ea excepturi culpa quibusdam consequuntur nulla? Doloremque hic neque nostrum eaque! Dolore delectus nobis laboriosam aperiam? Aut, excepturi nostrum mollitia, eligendi modi quaerat vitae similique ad, ipsum minus provident quidem! Totam adipisci reprehenderit illum quas, quia dignissimos ab eaque aspernatur in repellat delectus? Necessitatibus, nam? Eligendi pariatur aliquam sit minus ea, ipsa, inventore iste excepturi ex nostrum cum sint voluptas? Velit nisi facilis magni repudiandae optio, quidem voluptate hic illo iste, atque perspiciatis maxime aspernatur! Excepturi officiis cupiditate aut dignissimos corporis, a dolorem, ea aliquam doloremque sit vero quis corrupti. Eius optio libero inventore quam molestiae exercitationem perspiciatis impedit fuga odio. In laboriosam qui similique vel accusantium consequatur libero sint unde, nihil a ipsum, vitae saepe dolores non quod nesciunt ad expedita aperiam voluptatum possimus corporis numquam voluptas beatae natus. Incidunt voluptas culpa impedit quasi, doloribus dolores odit illum, accusamus reprehenderit cupiditate nostrum! Quas architecto quae possimus quaerat, natus est esse aspernatur voluptate voluptatum ex dolorem dignissimos quia consequatur molestiae soluta itaque vitae accusantium beatae ullam nesciunt. Accusantium quod esse itaque labore voluptates ut officiis cum ipsum consequuntur minima expedita obcaecati soluta, qui reprehenderit molestiae nisi, corporis quia dolores in libero, vel ratione necessitatibus delectus consequatur. Assumenda nobis eius repellendus blanditiis, iure nemo fugiat saepe accusamus, velit maiores modi dolore dignissimos dolor nihil inventore perferendis. Aut ipsum aliquid nostrum quod autem iusto, quas accusamus laborum. Sint aut totam voluptates delectus esse eaque perferendis nihil a, modi commodi cum rem iure corrupti sapiente voluptatem tempore blanditiis sequi cumque asperiores alias provident! Maxime repellat pariatur esse magnam eveniet autem, laboriosam fuga, facere eaque aut distinctio ducimus voluptatibus vitae facilis quibusdam sed architecto. Cum culpa error doloremque, earum laboriosam quod tempore molestias quae vel suscipit doloribus quos impedit libero tenetur eius. Cumque, temporibus. Sapiente sed temporibus, odit quibusdam voluptates ullam tenetur minus vel repudiandae. Itaque error tempora ut ipsa saepe beatae omnis placeat tempore veritatis nam, optio numquam eos officiis, iste nisi recusandae sit. Totam quam ducimus provident placeat amet? Eveniet saepe tempore non commodi quia culpa temporibus quae soluta maxime officia ex ut blanditiis inventore, cum pariatur repellendus ipsum, ea veniam vitae adipisci tenetur alias hic. Et enim hic modi corrupti eum at? Laudantium, quidem sunt autem ratione rerum maxime molestias voluptate magnam vero architecto quos deleniti adipisci repellendus quaerat non laborum numquam distinctio! Similique ea numquam fuga consectetur accusantium non ipsa obcaecati! Nulla at exercitationem, possimus cupiditate, dicta beatae rem eos est amet eveniet consequatur, unde ut animi voluptatibus eaque ducimus maiores corporis nobis. Facere fugit libero numquam saepe, velit, iusto vitae natus distinctio fuga neque animi? Excepturi numquam inventore maxime architecto soluta a voluptatibus facere dicta quaerat animi, repellendus pariatur nesciunt? Ratione sapiente mollitia saepe illo nobis, officiis itaque possimus alias porro, a officia. Culpa.
    </div>
    <div class="container">
        <div class="main">

            <div class="diaporama">
                <h1>Informations</h1>
                <div class="slideshow-container">
                <?php 
                $requete = 'select * from information';
                    $result = $db->prepare($requete);
                    $result->execute();
                    $res = $result->fetchAll();
                    for ($i = 0; $i < count($res); $i++) {
                        if ($i < 4){
?>
                    <div class="mySlides fade">
                        <img src="img/<?php echo $res[$i]['info_img'] ?>" style="width:100%">
                        <div class="text"><?php echo $res[$i]['nom_info'] ?></div>
                    </div>
<?php }} ?>
                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>


            </div>
            <div class="autres_info">
                <div class="row_info">

                    <?php
                    $requete = 'select * from information';
                    $result = $db->prepare($requete);
                    $result->execute();
                    $res = $result->fetchAll();
                    for ($i = 0; $i < count($res); $i++) {

                        if ($i > 3 && $i < 9) {
                    ?>
                            <div class="carte_info">
                                <h4><b><?php echo $res[$i]['nom_info'] ?></b></h4>
                                <p><?php echo $res[$i]['date'] ?></p>
                                <p><?php echo (substr($res[$i]['contenu'], 0, 30) . '...') ?><a href="<?php echo "info_info.php?nom_info=" . $res[$i]['nom_info']; ?>">Lire la suite</a> </p>
                            </div>
                    <?php  }
                    } ?>

                </div>
                <div class="row_info">

                    <?php
                    for ($i = 0; $i < count($res); $i++) {

                        if ($i > 8 && $i < 14) {
                    ?>
                            <div class="carte_info">
                                <h4><b><?php echo $res[$i]['nom_info'] ?></b></h4>
                                <p><?php echo $res[$i]['date'] ?></p>
                                <p><?php echo (substr($res[$i]['contenu'], 0, 30) . '...') ?><a href="<?php echo "info_info.php?nom_info=" . $res[$i]['nom_info']; ?>">Lire la suite</a> </p>
                            </div>
                    <?php  }
                    } ?>

                </div>
            </div>
        </div>
        <div class="evenement">
            <h1>Évenement</h1>


            <?php
            $requete = 'select * from evenement';
            $result = $db->prepare($requete);
            $result->execute();
            $res = $result->fetchAll();


            ?>
            <table class="styled-table">
                <tr>
                    <th>Nom</th>
                    <th>Date</th>
                </tr>
                <?php
                for ($i = 0; $i < count($res); $i++) { ?>
                    <tr>
                        <td><?php echo $res[$i]['nom_event'] ?></td>
                        <td><?php echo $res[$i]['date_event'] ?></td>
                    </tr>
                <?php  } ?>
            </table>

        </div>
    </div>
    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 3000); // Change image every 2 seconds
        }
    </script>


</body>


</html>