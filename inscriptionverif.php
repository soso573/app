<?php
 	include("Bdd.php");
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
	$sql = $bdd->prepare ('INSERT INTO users(nom, prenom, mail, password, pseudo, questions, reponses, sexe, nmaison) VALUES(:nom, :prenom, 
	:mail, :password, :pseudo, :questions, :reponses, :sex, :nmaison)');
	
	$sql->execute(array(
		'nom' =>$_POST['nom'],
		'prenom' =>$_POST['prenom'],
		//'pays' =>$_POST['pays'],
		//'codepostal' =>$_POST['codepostal'],
		//'adresse' =>$_POST['adresse'],
		'mail' =>$_POST['mail'],
		//'dateinscription' =>$_POST['dateinscription'],
		'password' =>$_POST['password1'],
		//'tel' =>$_POST['tel'],
		//'admin' =>$_POST['admin'],
		'pseudo' =>$_POST['pseudo'],
		//'nmaison' =>$nmaison,
		'questions' =>$_POST['question'],
		'nmaison'=>0,
		'reponses' =>$_POST['questionsecrete'],
		'sex' =>$_POST['sex']));
		
		echo "<div id=\"dernier_ajout\"><ul><li>Vous êtes maintenant inscrit, vous pouvez vous connecter</li></ul></div>";
		?>
	
	</body>
	
</html>