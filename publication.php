<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Publication</title>
    <link rel="stylesheet" href="publication.css">
    <link rel="stylesheet" href="all.css">
    <script src="jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php include("navbar.php"); ?>
    <div>
        <h1>Liste de publication</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. </br> Duis
            aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum.</p>
    </div>
    <?php

    require 'db.php';

    $query = $db->prepare("SELECT * from publication");
    $query->execute();
    ?>
    <table class="styled-table">
        <tr>
            <th>titre</th>
            <th>date de publication</th>
        </tr>
        <?php
        while ($row = $query->fetch()) { ?>
                <tr class='clickable-row' data-href='<?php echo "publication_info.php?titre=" . $row['titre']; ?>'>
                <td> <?php echo $row['titre']; ?> </a> </td>
                <td> <?php echo $row['date_de_publication']; ?> </td>
            </tr>
        <?php } ?>
    </table>

    <?php include("footer.php"); ?>

</body>
<script>


jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
        </script>

</html>