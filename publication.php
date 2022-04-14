<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <link rel="stylesheet" href="publication.css">
  <link rel="stylesheet" href="all.css">
</head>

<body>
  <?php
  require 'db.php';
  include("navbar.php"); ?>
  <div class="container">

    <?php
    $query = $db->prepare("SELECT * FROM publication");
    $query->execute();
    while ($row = $query->fetch()) {
    ?>
      <a class="carte_publication" href="<?php echo "info_publication.php?id=" . $row['id']; ?>">

        <div class="img_publication">
          <img src="img/einstein.jpg" alt="">
        </div>
        <div class="info_publication">
          <h1 style="font-size: 200%;"><?php echo $row['nom'] . " " . $row['prenom']; ?></h1>
          <h2 style="font-size: 150%;"><?php echo $row['travail']; ?></h2>
          <h2 style="font-size: 150%;"><?php echo $row['grade']; ?></h2>
          <h2 style="font-size: 150%;"><?php echo $row['structure']; ?></h2>
        </div>
      </a>

    <?php } ?>



  </div>

  <?php include("footer.php"); ?>


</body>

</html>