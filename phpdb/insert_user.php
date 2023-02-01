<?php
include "connect.php";
if(isset($_POST['insert'])){

	// récupérer les valeurs
	$id_user = $_POST['id_user'];
	$prenom = $_POST['prenom'];
	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$password = $_POST['password'];


        if(is_array($_FILES)) {
                $file = $_FILES['ImgToUpload']['tmp_name'];
                $sourceProperties = getimagesize($file);
                $fileNewName = $id_user;
                $folderPath = "img/";
                $ext = pathinfo($_FILES['ImgToUpload']['name'], PATHINFO_EXTENSION);
                $imageType = $sourceProperties[2];

            switch ($imageType) {

            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file);
//                $size = min($sourceProperties[0],$sourceProperties[1]);
//                $imageResourceId = imagecrop($imageResourceId, ['x' => (int) ($sourceProperties[0]-$size)/2, 'y' => (int) ($sourceProperties[1]-$size)/2, 'width' => $s>
//                $targetLayer = imageResize($imageResourceId,$size,$size);
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$folderPath.$fileNewName.".".$ext);
                break;

            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($file);
//                $size = min($sourceProperties[0],$sourceProperties[1]);
//                $imageResourceId = imagecrop($imageResourceId, ['x' => (int) ($sourceProperties[0]-$size)/2, 'y' => (int) ($sourceProperties[1]-$size)/2, 'width' => $s>
//                $targetLayer = imageResize($imageResourceId,$size,$size);
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagegif($targetLayer,$folderPath.$fileNewName.".".$ext);
                break;

            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file);
//		$size = min($sourceProperties[0],$sourceProperties[1]);
//		$imageResourceId = imagecrop($imageResourceId, ['x' => (int) ($sourceProperties[0]-$size)/2, 'y' => (int) ($sourceProperties[1]-$size)/2, 'width' => $size, 'height' => $size]);
//              $targetLayer = imageResize($imageResourceId,$size,$size);
		$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$folderPath.$fileNewName.".".$ext);
                break;

            default:
                echo "Invalid Image type.";
                exit;
                break;
            }

//        move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);


	 }




  try {
  // se connecter à mysql
  $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$passworddb");
  } catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
  }
  // Requête mysql pour insérer des données
  if(!empty($id_user) && !empty($password)){
        $passhash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user(id_user, firstname, lastname, email, image, password ) VALUES (:id_user,:prenom,:nom,:email,:image,:password)";
        $res = $pdo->prepare($sql);
	$imagepath=$folderPath.$fileNewName.".".$ext;
        $exec = $res->execute(array(":id_user"=>$id_user,":prenom"=>$prenom,":nom"=>$nom,":email"=>$email,":image"=>$imagepath,":password"=>$passhash));
  }

  // vérifier si la requête d'insertion a réussi
  if($exec){
    header("Location: login.php?erreur=3");
  }else{
    echo "Échec de l'opération d'insertion";
  }

}


function imageResize($imageResourceId,$width,$height) {
    if ($width>$height) {
	$targetWidth =200;
	$targetHeight =200*$height/$width;
    } 
    else {
	$targetWidth = 200*$width/$height;
	$targetHeight = 200;
    }

//        $targetWidth = 200;
//        $targetHeight = 200;


    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
    return $targetLayer;
}

?>
