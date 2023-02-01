<?php
$host = 'localhost';
$dbname = 'phpDB';
$username = 'phpdb';
$password = 'phpdbpass';
if(isset($_POST['insert'])){
  try {
  // se connecter à mysql
  $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
  } catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
  }
  // récupérer les valeurs 
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  // Requête mysql pour insérer des données
  if(!empty($prenom) && !empty($nom)){
  	$sql = "INSERT INTO utilisateurs(prenom, nom, email ) VALUES (:prenom,:nom,:email)";
  	$res = $pdo->prepare($sql);
  	$exec = $res->execute(array(":prenom"=>$prenom,":nom"=>$nom,":email"=>$email));
  }
  // vérifier si la requête d'insertion a réussi
  if($exec){
    echo 'Données insérées';
  }else{
    echo "Échec de l'opération d'insertion";
  }
}
?>
