<?php
//checking if the script received a post request or not
function WriteInJSON() {
    if($_SERVER['REQUEST_METHOD']=='POST'){

//Getting post data

        $username = $_POST['username'];
        $password = $_POST['password'];

//checking if the received values are blank
        if($username == '' || $password == ''){

//giving a message to fill all values if the values are blank
            echo 'please fill all values';
        }else{

//If the values are not blank

//Load the file
            $contents = file_get_contents('../data/data.json');

//Decode the JSON data into a PHP array.
            $json = json_decode($contents, true);
            $user = array_search($username, array_column( $json, 'username' ) );
            if( $user !== False )
                $json[$user] = array("username" => $username, "password" => $password);
            else
                $json[] = array("username" => $username, "password" => $password);
//Encode the array back into a JSON string.
            $json = json_encode($json);

//Save the file.
            file_put_contents('../data/data.json', $json);
        }
    }else{

        echo "error";

    }
}