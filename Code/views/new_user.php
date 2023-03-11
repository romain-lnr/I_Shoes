<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <link rel="stylesheet" href="../media/stylesheet/style.css" media="screen" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
  <body>
    <div id="container">
        <form action="index.php?action=insert_user" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <h1>Nouvel Utilisateur</h1>
                <label for="id_user"><b>Pseudo</b></label>
                <input type="text" class="form-control" placeholder="Entrer le nom d'utilisateur" name="id_user" maxlength="15" required>
                <label for="prenom"><b>Prénom</b></label>
                <input type="text" class="form-control" placeholder="Entrer le prénom" name="prenom" maxlength="15" required>
                <label for="nom"><b>Nom</b></label>
                <input type="text" class="form-control" placeholder="Entrer le nom" name="nom" maxlength="15" required>
                <label for="email"><b>Email</b></label>
                <input type="email" class="form-control" placeholder="Entrer l'email" name="email" maxlength="30" required>
                <label for="password"><b>Mot de passe</b></label>
                <input type="password" class="form-control" placeholder="Entrer le mot de passe" maxlength="25" name="password" required>
                <input type="submit" name="insert" value="ENREGISTRER">
            </div>
        <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1)
                echo "<p style='color:red'>Votre utilisateur n'est pas unique</p>";
        }
            ?>
    </form>
    </div>
  </body>
</html>
