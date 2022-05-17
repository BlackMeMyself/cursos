<?php

$servername = "localhost";
$user = "root";
$password = "123456";
$database = "cursos";

$conn = new mysqli($servername, $user, $password, $database);
    if (!$conn){
        die("error en la conexión");
    }
