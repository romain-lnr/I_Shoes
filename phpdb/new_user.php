<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
  <body>
    <div id="container">

    <form action="insert_user.php" method="post" enctype="multipart/form-data">
	<h1>Nouvel Utilisateur</h1>
	<label for="id_user"><b>Pseudo</b></label>
	<input type="text" placeholder="Entrer le nom d'utilisateur" name="id_user" required>
	<label for="prenom"><b>Prénom</b></label>
	<input type="text" placeholder="Entrer le prénom" name="prenom" required>
 	<label for="nom"><b>Nom</b></label>
	<input type="text" placeholder="Entrer le nom" name="nom" required>
	<label for="email"><b>Email</b></label>
	<input type="text" placeholder="Entrer l'email" name="email" required>
 	<label for="password"><b>Mot de passe</b></label>
	<input type="password" placeholder="Entrer le mot de passe" name="password" required>
        <label for="ImgToUpload"><b>Photo</b></label>
	<br>
	<input type="file" name="ImgToUpload" required>
	<input type="submit" name="insert" value="ENREGISTRER">
    </form>
</div>
  </body>
</html>
