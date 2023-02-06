<?php
//connection start
include("connection.php");

//Get data
$obterDados = file_get_contents("php://input");


//extrair data from json
$extrair = json_decode($obterDados);

//separate data from json
$nomeCurso = $extrair->cursos->nomeCurso;
$valorCurso = $extrair->cursos->valorCurso;

//SQL
$sql_insert = "INSERT INTO cursos (nomeCurso, valorCurso) VALUES ('$nomeCurso', $valorCurso)";
mysqli_query($connection, $sql_insert);

//Export data register
$curso = [
  'nomeCurso' => $nomeCurso,
  'valorCurso' => $valorCurso
];

// $curso = json_encode(['curso']);
// json_encode(['curso'=>$curso]);
json_encode(['curso'=>$curso]); //****original

?>