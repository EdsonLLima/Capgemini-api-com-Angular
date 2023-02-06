<?php
//connection start
include("connection.php");

//Get data
$obterDados = file_get_contents("php://input");


//extrair data from json
$extrair = json_decode($obterDados);

//separate data from json
$idCurso = $extrair->cursos->idCurso;

//SQL
$sql_delete = "DELETE FROM cursos WHERE idCurso=$idCurso";
mysqli_query($connection, $sql_delete);
