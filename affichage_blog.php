<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"http://www.w3".org/TR/xhtm11-strict.dtd">
<html xmlns="http://www.w3.org/Type1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset="UTF-8">
	<title>Blog</title>
</head>
<body>
<h2>Blog</h2>
<hr />
<?php	
$connect = mysqli_connect("127.0.0.1","root","","blog");
if(!$connect){
	echo "Echec de la connexion : ".mysqli_connect_error();
	exit();
}
$requete = "SELECT * FROM contenu ORDER BY Date";
if($resultat = mysqli_query($connect,$Requete)) {
	date_default_timezone_set('Europe/Paris');
	while ($ligne = mysqli_fetch_assoc($resultat)){
		$dt_debut = date_create_from_format(('Y-m-d H:i/s'),$ligne['Date']);
		echo "<h3>".$ligne['Titre']."</h3>";
		echo "<h4>Le ".$dt_debut->format('d/m/Y H:i:s')."</h4>";
		echo "<div style='width:400px'>".$ligne['Commentaire']."
		</div>";
		if ($ligne['photo'] !=""){
			echo "<img src='photos/".$ligne['photo']."' width='200px' height='200px' />";
		}
		echo "<hr />";
	}
}
?>
<br />
<a href="formulaire_ajout.php"> retour à la page d'insertion</a>
	
</body>
</html>