<?php session_start()?>

<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="K2K.css" />
<title>Key To Key - Accueil</title>
<link rel="icon" type="image/gif" href="Img/icone.gif" />

</head>

<body>
<?php include("header.php"); ?>

<body>

<?php
    if ($_SESSION == NULL):

            echo "<article><br/><br/><br/><br/><h2>Merci de vous connecter !</h2></article>";
    else:

                //Connexion à la base de donnée

               $bdd = 'keydb';

                $host = "localhost" ;

               $user = "root" ;

              $mdp = "root" ;

              $link = mysqli_connect($host, $user, $mdp) ;

               mysqli_select_db($link, $bdd) or die("Erreur de connexion à la base de donnée" );


              $idPropietaire= $_SESSION['id'];

                $text= "SELECT * FROM criteres";
                $query = mysqli_query($link,$text) or die (mysqli_error($link)); ?>
    <fieldset>
    <form method="post" action="effacercriteresuite.php">
              <?php  while ($donnees=  mysqli_fetch_array($query)){ ?>

                <label for="" class="inputradio11"><?php echo $donnees['nom']; ?></label><input type="checkbox" name="critere[]" value="<?php  echo $donnees['nom']; ?>" />
                

               
                <?php } ?> <br/><br/>
                 <input type="submit" value="Supprimer"/></form></fieldset> <?php
        endif;
        mysqli_close($link);



include("footer.php"); ?>




</body>
</html>