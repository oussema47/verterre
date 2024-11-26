<?php

define("SERVEUR", "localhost");
define("BASE", "verterre");  
define("USER", "root");
define("MDP", "");

$conn = mysqli_connect(SERVEUR, USER, MDP, BASE);


if (!$conn) {
    die("Erreur de connexion: " . mysqli_connect_error());
}


?>