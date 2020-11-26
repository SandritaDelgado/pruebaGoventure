<?php
$connect = mysqli_connect("localhost", "root", "", "prueba_goventure");


$sql = "DELETE FROM tarea 
                    WHERE id = " . $_REQUEST['id'] ."";

$registro = mysqli_query($connect, $sql) or die(mysqli_error($connect));


exit;
?>