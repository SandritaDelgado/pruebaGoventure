<?php
$connect = mysqli_connect("localhost", "root", "", "prueba_goventure");

$json_response = '{"data":[ ';

$sql = "SELECT  t.id       AS ID,
                t.nombre   AS NOMBRE,
                t.lenguaje AS LENGUAJE
			 	FROM tarea t ";

$registro = mysqli_query($connect, $sql) or die(mysqli_error($connect));
while ($row = mysqli_fetch_array($registro)) {
    $mostrar = true;
    if ($mostrar) {
        $json_response .= "[";
        $json_response .= '"' . utf8_encode($row["NOMBRE"]) . '",';
        $json_response .= '"' . utf8_encode($row["LENGUAJE"]) . '",';
        $json_response .= '"<button type=\'button\' class=\'btn btn-primary\' id=\'eliminar_btn\' name=\'eliminar_btn\' onclick=\'javascript:eliminarTarea(\"' . $row["ID"] . '\")\'> Eliminar </button>"';
        $json_response .= '],';
    }

}

$json_response = substr($json_response, 0, strlen($json_response) - 1);
$json_response .= "]}";

echo $json_response;

exit;
?>