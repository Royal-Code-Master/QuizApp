<?php

//surver details for connection
//connection established

$host = "localhost";
$user = "root";
$password = "";
$db = "quizz";

$con = mysqli_connect($host, $user, $password, $db);

if (!$con) {
    print("connection error!!!!");
}
