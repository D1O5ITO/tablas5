<?php
require_once __DIR__ . '/../modelo/Database.php';

class ControladorTienda {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Obtener todos los clientes
    public function obtenerClientes() {
        $sql = "SELECT * FROM Clientes";
        $resultado = $this->db->conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_cliente']}</td> b
                        <td>{$row['nombre']}</td>
                        <td>{$row['apellidos']}</td>
                        <td>{$row['direccion']}</td>
                        <td>{$row['celular']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay clientes registrados</td></tr>";
        }
    }

    // Obtener todos los productos
    public function obtenerProductos() {
        $sql = "SELECT * FROM Productos";
        $resultado = $this->db->conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_producto']}</td>
                        <td>{$row['descripcion']}</td>
                        <td>{$row['marca']}</td>
                        <td>{$row['precio']}</td>
                        <td>{$row['numero_existencias']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay productos registrados</td></tr>";
        }
    }

    // Obtener todos los proveedores
    public function obtenerProveedores() {
        $sql = "SELECT * FROM Proveedores";
        $resultado = $this->db->conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_proveedor']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['direccion']}</td>
                        <td>{$row['telefono']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay proveedores registrados</td></tr>";
        }
    }

    // Obtener todas las compras con información del cliente, producto y cantidad
    public function obtenerCompras() {
        $sql = "SELECT c.id_compra, cl.nombre AS nombre_cliente, p.descripcion AS nombre_producto, dc.cantidad, c.fecha_compra
                FROM Compras c
                JOIN Clientes cl ON c.id_cliente = cl.id_cliente
                JOIN DetalleCompras dc ON c.id_compra = dc.id_compra
                JOIN Productos p ON dc.id_producto = p.id_producto";
        $resultado = $this->db->conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_compra']}</td>
                        <td>{$row['nombre_producto']}</td>
                        <td>{$row['nombre_cliente']}</td>
                        <td>{$row['cantidad']}</td>
                        <td>{$row['fecha_compra']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay compras registradas</td></tr>";
        }
    }

    // Obtener el detalle de las compras
    public function obtenerDetalleCompras() {
        $sql = "SELECT dc.id_compra, p.descripcion, dc.cantidad
                FROM DetalleCompras dc
                JOIN Productos p ON dc.id_producto = p.id_producto";
        $resultado = $this->db->conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_compra']}</td>
                        <td>{$row['descripcion']}</td>
                        <td>{$row['cantidad']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay detalles de compras registrados</td></tr>";
        }
    }

    // Obtener productos suministrados por proveedores
    public function obtenerSuministros() {
        $sql = "SELECT s.id_proveedor, p.descripcion
                FROM Suministra s
                JOIN Productos p ON s.id_producto = p.id_producto";
        $resultado = $this->db->conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_proveedor']}</td>
                        <td>{$row['descripcion']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No hay suministros registrados</td></tr>";
        }
    }
}
?>
