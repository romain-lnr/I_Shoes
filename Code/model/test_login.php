<?php

// Pense-bête pour demain : faire pointer les erreurs avec les sessions
// $err
require "receiveLogin.php";
//Load the file
$JSONfile = '../data/data.json';
$data = file_get_contents($JSONfile);
// décoder le flux JSON
$obj = json_decode($data);
// accéder à l'élément approprié
for ($i = 0; $i < count($obj); $i++) {
    if ($obj[$i]->username == $id_user) echo "O";
    else echo "N";
    if ($obj[$i]->username == $password) echo "O";
    else echo "N";
}

?>
