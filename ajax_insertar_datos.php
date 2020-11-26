<?php
$connect = mysqli_connect("localhost", "root", "", "prueba_goventure");

$sql_id_proyecto = "SELECT COUNT(IFNULL(id, 1)) AS ID_GESTION FROM tarea";

$reg = mysqli_query($connect, $sql_id_proyecto) or die(mysqli_error($connect));
$row_count = mysqli_fetch_array($reg);
//echo $row_count['ID_GESTION'];

if ($row_count['ID_GESTION'] == 0){
    //echo "hola";
    //exit;
    $sql_id_proyecto1 = "SELECT COUNT(IFNULL(id, 1))+1 AS ID_G FROM tarea p";
    $reg = mysqli_query($connect, $sql_id_proyecto1) or die(mysqli_error($connect));
    $row_count_id = mysqli_fetch_array($reg);
    $resultado = $row_count_id['ID_G'];

} else {
    $sql_id_proyecto1 = "SELECT MAX(id)+1 AS ID_G FROM tarea p";
    $reg = mysqli_query($connect, $sql_id_proyecto1) or die(mysqli_error($connect));
    $row_count_id = mysqli_fetch_array($reg);
    $resultado = $row_count_id['ID_G'];
}

echo "<pre>";
print_r($_REQUEST);
$lenguaje = implode("-",$_REQUEST['array']);

$sql_insert = "INSERT INTO tarea VALUES(" . $resultado . ",'" . $_REQUEST['tarea'] . "','".$lenguaje."')";

$registro = mysqli_query($connect, $sql_insert) or die(mysqli_error($connect));
   
exit;
?>