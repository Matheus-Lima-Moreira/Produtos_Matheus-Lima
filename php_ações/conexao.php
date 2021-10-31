<?php

$con = mysqli_connect("localhost", "root", "root", "bd_exemplo");

if (mysqli_connect_errno()) {
    echo "Erro ao conectar: " . mysqli_connect_error();
} else {
    //echo "Conexão ok";
}
