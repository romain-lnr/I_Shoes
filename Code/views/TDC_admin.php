<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../media/stylesheet/style.css" media="screen" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div id="container">
    <form action="../index.php?action=articles" method="POST">
        <div class="form-group">
            <h1>Table de création</h1>
            <label><b>Nom d'article</b></label>
            <input type="text" class="form-control" placeholder="Entrer le nom de l'article" name="id_article" required>
            <label><b>Nom de la marque</b></label>
            <input type="text" class="form-control" placeholder="Entrer le nom de la marque de l'article" name="mark" required>
            <label><b>Description</b></label>
            <input type="text" class="form-control" placeholder="Entrer une sobre description de l'article" name="desc" required>
            <label><b>Prix</b></label>
            <input type="text" class="form-control" placeholder="Entrer le prix à établir" name="price" required>
            <input type="submit" name="insert" value='AJOUTER' >
        </div>
    </form>
</div>
