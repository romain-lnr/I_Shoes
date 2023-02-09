<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <link rel="stylesheet" href="../media/css/style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <form action="../index.php?action=logged" method="POST">
                <h1>Connexion</h1>
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="id_user" required>
                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                <input type="submit" name="insert" value='LOGIN' >
		<a href="new_user.php" style="float: right;"><b>Nouvel Utilisateur</b></a>
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
