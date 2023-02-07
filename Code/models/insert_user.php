<?php
require "../controllers/receive_user.php";
if(isset($_POST['insert'])){

      // Load the file
      $JSONfile = '../data/data.json';
      $contents = file_get_contents($JSONfile);

      // HASH Password
      $passhash = password_hash($password, PASSWORD_DEFAULT);

      // Decode the JSON data into a PHP array.
      $json = json_decode($contents, true);
      $user = array_search($id_user, array_column( $json, 'username' ) );
      if ($user !== False) header("Location:../views/new_user.php?erreur=1");
      else {
            $json[] = array("username" => $id_user, "firstname" => $prenom, "name" => $nom, "Email" => $email, "password" => $passhash);
            header("Location:../views/login.php");
      }

      // Encode the array back into a JSON string.
      $json = json_encode($json);

      // Save the file.
      file_put_contents('../data/data.json', $json);
}
?>
