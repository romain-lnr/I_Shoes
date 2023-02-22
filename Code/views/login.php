<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <link rel="stylesheet" href="../media/stylesheet/style.css" media="screen" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <div id="container">
            <form action="../index.php?action=logged" method="POST">
                <div class="form-group">
                    <h1>Connexion</h1>
                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" class="form-control" placeholder="Entrer le nom d'utilisateur" name="id_user" required>
                    <label><b>Mot de passe</b></label>
                    <input type="password" class="form-control" placeholder="Entrer le mot de passe" name="password" required>
                    <input type="submit" name="insert" value='LOGIN' >
                </div>
		<a href="new_user.php" style="float: right;"><b>Nouvel Utilisateur</b></a>
        <a href="main.php" style="float: left;"><b>Retour à la page d'acceuil</b></a>
		<?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err == 1 || $err == 2) echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }

                ?>
            </form>
        </div>
    </body>
</html>
