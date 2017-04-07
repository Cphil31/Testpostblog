<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"http://www.w3".org/TR/xhtm11-strict.dtd">
<html xmlns="http://www.w3.org/Type1999/xhtml" xml:lang="fr" lang="fr">=
<head>
	<meta http-equiv="Content-Type" content="text/html; charset="UTF-8">
	<title>Blog</title>
</head>
<body>
	<?php
	$connect = mysqli_connect("127.0.0.1","root","","blog");
	if(!$connect){
		echo "Echec de la connection : ".mysqli_connect_error();
		exit();
	} 
	if ($_FILES['photo']['error']){
		switch ($_FILES['photo']['error']) {
			case 1:
			echo "La taille du fichier est plus grande que la limite autorisée par le serveur (paramètre upload_max_fillesize du fichier php.ini).";		
			break;
			
			case 2:
			echo "la taille du fichier est plus grande que la limite autorisée par le formulaire (paramètre post_max_size du fichier php.ini).";
			break;
			case 3:
			echo "l'envoi du fichier a été interrompu pendant le transfert.";
			break;
			case 4:
			echo "la taille du fichier que vous avez envoyé est nulle.";
			break;

		}
	}
	else {
		echo "Aucune erreur dans le transfert du fichier.<br />";
		if ((isset($_FILES['photo'] ['name'])&&($_FILES['photo']['error'] == UPLOAD_ERR_OK))){
			$chemin_destination = 'photos/';
			 move_uploaded_file($_FILES['photo'] ['tmp_name'],$chemin_destination.$_FILES['photo']['name']);
			echo "Le fichier ".$_FILES['photo'] ['name']." a été copié dans le répertoire photos";

		}
		else{
			echo "le fichier n'a pas pu être copié dans le répertoire photos.";
		}
	}
	$requete = "INSERT INTO contenu (Titre, Date, Commentaire, Photo)
	VALUES ('".htmlentities(addcslashes($_POST['titre']),
	ENT_QUOTES)."','".date("Y-m-d H:i:s")."','".htmlentities(addcslashes($_POST['commentaire']),ENQ_QUOTES) ."',
	'".$_FILES['photo']['name']."')";
	$resultat = mysql_query($connect,$requete);
	$identifiant = mysql_insert_id($connect);
	mysql_close($connect);
	if ($identifiant != 0){
		echo "<br />Ajout du commentaire réussi.<br /><br />";
	}
	else{
		echo "<br /> Le commentaire n'as pas pu être ajouté.<br /><br />";
	}
	?>
	<a href="formulaire_ajout.php">retour à la page d'ajout</a>
}
</body>
</html>