<?php
 	session_start();
 	include("Bdd.php");
	if (!isset($_POST['admin']))
	{$admin=0;}
	else
	{$admin=$_POST['admin'];}
	
	$nmaison=0;
?>
 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - verif inscriprtion</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
		

	</head>
	
	
	<body>
	<?php
	$sql1 = $bdd->prepare('SELECT * FROM users WHERE pseudo= :pseudo');
	$sql1->execute(array(
	'pseudo'=> $_POST['pseudo']));
	$auth=$sql1->fetch();
	
	
if ((isset($auth['id'])) and ($auth['pseudo']!=$_SESSION['pseudo']))
{
echo ("le pseudo existe déjà");
}
else
{
		if ($_POST['password1']!=$_POST['password2'])
		{
		echo ('<article><h2>les mots de passe ne correspondent pas</h2></article>');
		}
	
		else
	
		{if (!(preg_match("#^0[1-9][0-9]{8}$#", $_POST['tel']))):
{echo('<article><h2>Numero de telephone incorrect</h2></article>');}
else:
if (!(preg_match("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))):
echo('<article><h2>Email incorrect</h2></article>');
else:
if (!(preg_match("#^[0-9]{5}$#", $_POST['codepostal']))):
echo('<article><h2>Code postal incorrect</h2></article>');
else:
if (!(preg_match("#^[a-zA-Z0-9. -]{3,}$#", $_POST['pseudo']))):
echo('<article><h2>Pseudo incorrect</h2></article>');
else:
if (!(preg_match("#^[a-zA-Z -]{2,}$#", $_POST['nom']))):
echo('<article><h2>Nom incorrect</h2></article>');
else:
if (!(preg_match("#^[a-zA-Z. -]{2,}$#", $_POST['prenom']))):
echo('<article><h2>Prenom incorrect</h2></article>');
else:
if (!(preg_match("#^[0-9]+,[a-zA-Z -]{5,}$#", $_POST['adresse']))):
echo('<article><h2>Adresse incorrect</h2></article>');
else:
if (!(preg_match("#^[a-zA-Z. -]{2,}$#", $_POST['ville']))):
echo('<article><h2>Ville incorrect</h2></article>');
else:
if (!(preg_match("#^[a-z0-9.é-è_çà@]{6,}$#", $_POST['password1']))):
echo('<article><h2>Mot de passe trop simple</h2></article>');
else:
		$sql = $bdd->prepare ("UPDATE keydb.users SET nom=:nom, prenom=:prenom, mail=:mail, password=:password, pseudo=:pseudo, questions=:questions, reponses=:reponses, sexe=:sexe, tel=:tel, codepostal=:codepostal, adresse=:adresse, pays=:pays, ville= :ville WHERE id= :id");
		$sql->execute(array(
		'nom' =>htmlspecialchars($_POST['nom']),
		'prenom' =>htmlspecialchars($_POST['prenom']),
		'pays' =>htmlspecialchars($_POST['pays']),
		'codepostal' =>htmlspecialchars($_POST['codepostal']),
		'adresse' =>htmlspecialchars($_POST['adresse']),
		'mail' =>htmlspecialchars($_POST['mail']),
		//'dateinscription' =>current_timestamp,
		'password' =>sha1(htmlspecialchars($_POST['password1'])),
		'tel' =>htmlspecialchars($_POST['tel']),
		'pseudo' =>htmlspecialchars($_POST['pseudo']),
		'questions' =>htmlspecialchars($_POST['question']),
		'reponses' =>htmlspecialchars($_POST['questionsecrete']),
		'id'=>$_SESSION['id'],
		'sexe' =>htmlspecialchars($_POST['sex']),
		'ville' =>htmlspecialchars($_POST['ville'])));
		session_destroy();
		
		echo "<article><h2>Vos informations personnelles ont bien été modifiées</h2></article>";
		
	
endif;
endif;
endif;
endif;
endif;
endif;
endif;
endif;
endif;
}
}
	?>
	</body>
	
</html>