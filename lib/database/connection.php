<?php
function connect()
{
    $hostname = "localhost";
    $database = "flowerculture";
    $user = "root";
    $password = "";


    $conn = $mysqli = new mysqli($hostname, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Falha na conexão com o banco de dados: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        exit;
    }

    return $conn;
}