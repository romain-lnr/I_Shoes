<?php
function WriteInJSON() {

}
?>




<?php


//checking if the script received a post request or not

if($_SERVER['REQUEST_METHOD']=='POST'){

//Getting post data

    $name = $_POST['name'];

    $username = $_POST['username'];

    $password = $_POST['password'];

    $email = $_POST['email'];


//checking if the received values are blank


    if($name == '' || $username == '' || $password == '' || $email == ''){


//giving a message to fill all values if the values are blank


        echo 'please fill all values';

    }else{

//If the values are not blank


//Load the file
        $contents = file_get_contents('user_doc.json');

//Decode the JSON data into a PHP array.
        $json = json_decode($contents, true);

        $user = array_search($username, array_column( $json, 'username' ) );

        if( $user !== False )
            $json[$user] = array("name" => $name, "username" => $username, "password" => $password, "email" => $email);
        else
            $json[] = array("name" => $name, "username" => $username, "password" => $password, "email" => $email);


//Encode the array back into a JSON string.
        $json = json_encode($json);

//Save the file.
        file_put_contents('user_doc.json', $json);
    }
}else{

    echo "error";

}
