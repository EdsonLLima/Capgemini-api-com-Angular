<?php
//connection start
include("connection.php");

//Get data
$obterDados = file_get_contents("php://input");


//extrair data from json
$extrair = json_decode($obterDados);

//separate data from json
$nomeCurso = $extrair->cursos->nomeCurso;
$idCurso = $extrair->cursos->idCurso;
$valorCurso = $extrair->cursos->valorCurso;

//SQL
$sql_update = "UPDATE cursos SET nomeCurso='$nomeCurso', valorCurso=$valorCurso WHERE idCurso=$idCurso";
mysqli_query($connection, $sql_update);

//Export data register
$curso = [
  'idCurso' => $idCurso,
  'nomeCurso' => $nomeCurso,
  'valorCurso' => $valorCurso
];

$curso = json_encode(['curso']);
// json_encode(['curso']=>$curso); //original no curso não funcionou!

?>