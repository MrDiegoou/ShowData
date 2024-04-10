<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

// Verificar si se envió una búsqueda
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM usuarios WHERE nombres LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM usuarios";
}

$usuarios = $db_handle->runQuery($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar usuarios</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/sticky-footer-navbar.css" rel="stylesheet">
    <style>
        .scrollable-table {
            max-height: 400px; /* Altura máxima del contenedor */
            overflow-y: auto; /* Agrega una barra de desplazamiento vertical cuando sea necesario */
        }
        body {
            overflow-y: hidden; /* Oculta la barra de desplazamiento vertical */
        }
        }
    </style>
</head>
<body>
    <header> 
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="index.php">Buscar usuarios </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"> <a class="nav-link" href="mostrar.php">Inicio <span class="sr-only">(current)</span></a> </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0" method="GET" action="index.php">
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Buscar por nombres" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <div class="container">
        <h1 class="mt-5">Buscar usuarios</h1>
        
        <!-- Botón Descargar Excel -->
        <a href="descargar_excel.php" class="btn btn-primary mb-3">Descargar Excel</a>

        <!-- Contenedor con scroll para la tabla de resultados -->
        <div class="scrollable-table">
            <!-- Tabla de resultados -->
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th> <!-- Reemplazar con la base de datos  -->
                        <th>Nombres</th>     <!-- Reemplazar con la base de datos  -->
                        <th>Apellidos</th>  <!-- Reemplazar con la base de datos  -->   
                        <th>Documento de Identidad</th> <!-- Reemplazar con la base de datos  -->   
                        <th>Motivo</th> <!-- Reemplazar con la base de datos  --> 
                        <th>Visita</th> <!-- Reemplazar con la base de datos  -->
                        <th>Nombre de Emergencia</th>   <!-- Reemplazar con la base de datos  -->
                        <th>Teléfono de Emergencia</th> <!-- Reemplazar con la base de datos  -->
                        <th>Fecha</th>  <!-- Reemplazar con la base de datos  -->
                        <th>Hora</th>   <!-- Reemplazar con la base de datos  -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo $usuario['id']; ?></td>      <!-- Reemplazar con la base de datos  -->
                            <td><?php echo $usuario['nombres']; ?></td>     <!-- Reemplazar con la base de datos  -->
                            <td><?php echo $usuario['apellidos']; ?></td>   <!-- Reemplazar con la base de datos  --> 
                            <td><?php echo $usuario['doc_identi']; ?></td>  <!-- Reemplazar con la base de datos  -->
                            <td><?php echo $usuario['motivo']; ?></td>  <!-- Reemplazar con la base de datos  -->   
                            <td><?php echo $usuario['visita']; ?></td>  <!-- Reemplazar con la base de datos  -->   
                            <td><?php echo $usuario['nombre_emergencia']; ?></td>   <!-- Reemplazar con la base de datos  -->
                            <td><?php echo $usuario['telefono_emergencia']; ?></td> <!-- Reemplazar con la base de datos  -->
                            <td><?php echo $usuario['fecha']; ?></td>   <!-- Reemplazar con la base de datos  -->
                            <td><?php echo $usuario['hora']; ?></td>    <!-- Reemplazar con la base de datos  -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="dist/js/bootstrap.min.js"></script>
</body>
</html>
