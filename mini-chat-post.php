<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "test";
$lien = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(isset($_POST["pseudo"]) && isset($_POST["message"])){
    $pseudo = $_POST["pseudo"];
    $message = $_POST["message"];

    if ($pseudo != "" && $message != ""){
        echo "Je suis $pseudo mon message est $message";

        $insert = "INSERT INTO chat(`pseudo`, `message`) VALUES('$pseudo', '$message') ";
        $query = mysqli_query($lien, $insert);
        header("Location: mini-chat.php?success=1");
    }
    else {
        header("Location: mini-chat.php?erreur=1");
    }
}