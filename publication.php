<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="publication.css">
    <link rel="stylesheet" href="all.css">
    <style>
    table,
    th,
    td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <?php
  include("navbar.php");
  require 'db.php';
  $requete = 'select * from publication';
  $result = $db->prepare($requete);
  $result->execute();
  $res = $result->fetchAll();

  if (!$result) {
    echo 'Erreur lors de l\'execution de la requete'.mysqli_error();
  } else { ?>
    <table>
    <tr>
        <th>titre</th>
        <th>date de publication</th>
    </tr>
    <?php  
        for ($i=0; $i<count($res); $i++ ){?>
    <tr>
        <td><a href="publication_info.php"><?php echo $res[$i]['titre'] ?></a></td>
        <td><?php echo $res[$i]['date_de_publication'] ?></td>
    </tr>
    <?php  }?>
    <?php } ?>
</table>


    </div>

    <?php include("footer.php"); ?>


</body>

</html>