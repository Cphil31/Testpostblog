<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"http://www.w3".org/TR/xhtm11-strict.dtd">
<html xmlns="http://www.w3.org/Type1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset="UTF-8">
	<title>Blog</title>
</head>
<body>
<h2>Formulaire d'ajout de contenu au blog</h2>
<form action="insertion_contenu.php" method="POST" enctype="multipart/form-data">
	
<p>Titre: <input type="text" name="titre" /></p>
<p>Commentaire: <br /><textarea name="commentaire" rows="10" cols="50"></textarea></p>
<input type="file" name="photo">
<br /><br />
<input type="submit" name="ok" value="Envoyer">
</form>
<br />
<a href="affichage_blog.php">page d'affichage du blog</a>
</body>
</html>