<?php
//Variáveis
$db_host = "localhost";
$db_user = "root";
$db_password = "senha2022";
$db_name = "api";


//Conexao
$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

//arrumar caracteres especiais
mysqli_set_charset($connection, "utf8");
