<?php
require_once("dbcontroller.php");

// Crear una instancia de DBController
$db_handle = new DBController();

// Consultar los datos de la base de datos
$sql = "SELECT * FROM usuarios";
$usuarios = $db_handle->runQuery($sql);

// Crear el archivo Excel
$filename = "usuarios_excel_" . date('Y-m-d') . ".xls";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");

// Crear el encabezado del archivo Excel
echo "ID\tNombres\tApellidos\tDocumento de Identidad\tMotivo\tVisita\tNombre de Emergencia\tTeléfono de Emergencia\tFecha\tHora\n";

// Recorrer los datos y escribirlos en el archivo Excel
foreach ($usuarios as $usuario) {
    echo implode("\t", $usuario) . "\n";
}
