<?php
// Incluye el archivo de configuración que contiene las constantes de conexión a la base de datos
require_once __DIR__ . '/config.php';

class Database {
    // Propiedad pública para almacenar la conexión a la base de datos
    public $conn;

    // Método constructor
    public function __construct() {
        // Crea una nueva conexión a la base de datos usando las constantes definidas en config.php
        $this->conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // Verifica si la conexión ha fallado
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }
}
?>
