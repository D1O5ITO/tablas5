<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Vista Ventas</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #212529; /* Fondo oscuro */
        }

        .container {
            background-color: #f8f9fa; /* Fondo claro */
            padding: 20px;
            border-radius: 10px;
            max-width: 80%;
            margin: auto; 
            margin-top: 50px; 
        }

        .table th, .table td {
            vertical-align: middle;
            padding: 12px; 
        }

        .table thead th {
            background-color: #212529;
            color: white;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa; 
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef; 
        }

        h1 {
            font-size: 2.5rem;
            color: black; 
            text-align: center; /* Centrar el título */
        }
    </style>
</head>
<body class="vh-100">
    <div class="container">
        <h1 class="display-4 mb-3 fw-bold">Tabla de Compras</h1>
        <center>
        
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>ID Compra</th>
                    <th>Nombre del Producto</th>
                    <th>Nombre del Cliente</th>
                    <th>Cantidad</th>
                    <th>Fecha Compra</th>
                </tr>
            </thead>
            </center>
            <tbody>
                <?php
                // Asegúrate de que el controlador y el método estén definidos correctamente
                require_once '../../controlador/ControladorTienda.php'; // Cambia la ruta si es necesario
                $controlador = new ControladorTienda();
                $controlador->obtenerCompras(); // Obtenemos los datos de compras
                ?>
            </tbody>
        </table>

   
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
