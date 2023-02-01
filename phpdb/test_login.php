<?php
session_start();
include "connect.php";
if(isset($_POST['insert'])){
  // récupérer les valeurs
  $id_user = $_POST['id_user'];
  $password = $_POST['password'];
  try {
  // se connecter à mysql
  $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$passworddb");
  } catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
  }
  if(!empty($id_user) && !empty($password)){
  	$sql = "SELECT * FROM user WHERE id_user = '".$id_user."'";
	$stmt = $pdo->query($sql);
	$row_count = $stmt->rowCount();
	if ($row_count == 1){
		$user = $stmt->fetch();
		if (password_verify($password, $user['password'])){
			$_SESSION['id_user'] = $user['id_user'];
			$_SESSION['img_profile'] = $user['image'];
			$_SESSION['logged'] = true;
			header("Location: main.php");
		} else {
			header("Location: login.php?erreur=2");
		}
	} else {
		header("Location: login.php?erreur=1");
	}

 
 } else {
	header("Location: login.php?erreur=1");
 }
}

?>
