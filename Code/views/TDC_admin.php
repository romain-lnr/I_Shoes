<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../media/stylesheet/style.css" media="screen" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div id="container">
    <form action="index.php?action=create_article" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <h1>Table de création</h1>
            <label for="id_article"><b>Nom d'article</b></label>
            <input type="text" class="form-control" placeholder="Entrer le nom de l'article" name="id_article" maxlength="20" required>
            <label for="mark"><b>Nom de la marque</b></label>
            <input type="text" class="form-control" placeholder="Entrer le nom de la marque de l'article" name="mark" maxlength="20" required>
            <label for="desc"><b>Description</b></label>
            <input type="text" class="form-control" placeholder="Entrer une sobre description de l'article" name="desc" maxlength="1500" required>
            <label for="price"><b>Prix</b></label>
            <input type="number" class="form-control" placeholder="Entrer le prix à établir" name="price" maxlength="2" required>
            <label for="img_article"><b>Image de l'article</b></label>
            <input type="file" class="form-control" placeholder="Entrer une image pour l'article" name="img_article" required>
            <input type="submit" name="insert" value='AJOUTER' >

            <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1)
                    echo "<p style='color:red'>Votre article n'est pas unique</p>";
                if($err==2)
                    echo "<p style='color:red'>Votre extension de fichier cible n'est pas appropriée</p>";
            }
            ?>
        </div>
    </form>
</div>
