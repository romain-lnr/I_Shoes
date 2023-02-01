<?php
require "receiveN_U.php";
if(isset($_POST['insert'])){

        //Load the file
      $JSONfile = '../data/data.json';
      $contents = file_get_contents($JSONfile);

        //Decode the JSON data into a PHP array.
      $json = json_decode($contents, true);
      $user = array_search($id_user, array_column( $json, 'username' ) );
      if( $user !== False )
          $json[$user] = array("username" => $id_user, "firstname" => $prenom, "name" => $nom, "Email" => $email, "password" => $password);
      else
          $json[] = array("username" => $id_user, "firstname" => $prenom, "name" => $nom, "Email" => $email, "password" => $password);
        //Encode the array back into a JSON string.
      $json = json_encode($json);

        //Save the file.
      file_put_contents('../data/data.json', $json);
}
?>
