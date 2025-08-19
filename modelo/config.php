<?php
// Archivo: config.php
define('DB_SERVER', '192.168.190.128'); // IP de tu Ubuntu Server
define('DB_USERNAME', 'zea');           // Usuario que creaste en MySQL
define('DB_PASSWORD', 'Admin2025');     // Contraseña del usuario
define('DB_NAME', 'bdusuarios_4_2024');         // Base de datos a usar

// Crear conexión
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>