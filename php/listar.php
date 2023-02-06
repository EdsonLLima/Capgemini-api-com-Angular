<?php

//connection start
include("connection.php");

//sql
$select_sql = "SELECT * FROM cursos";

//execute
$execute_SQL = mysqli_query($connection, $select_sql);

//array
$cursos = [];

//index
$index = 0;

//Loop
while ($linha = mysqli_fetch_assoc($execute_SQL)) {
  $cursos[$index]['idCurso'] = $linha['idCurso'];
  $cursos[$index]['nomeCurso'] = $linha['nomeCurso'];
  $cursos[$index]['valorCurso'] = $linha['valorCurso'];

  $index++;
}

//json
echo json_encode(['cursos' => $cursos]);

// var_dump($cursos);