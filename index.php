<?php
// Configuración para mostrar errores durante el desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inicializar variables
$subtotal = $monto_impuesto = $monto_descuento = $total_final = 0;
$mostrar_resultados = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $precio1 = (float) $_POST['precio1'];
    $cantidad1 = (int) $_POST['cantidad1'];

    $precio2 = (float) $_POST['precio2'];
    $cantidad2 = (int) $_POST['cantidad2'];

    $precio3 = (float) $_POST['precio3'];
    $cantidad3 = (int) $_POST['cantidad3'];

    // Realizar los cálculos
    $subtotal = ($precio1 * $cantidad1) + ($precio2 * $cantidad2) + ($precio3 * $cantidad3);
    
    $porcentaje_impuesto = 0.18; // 18% de impuestos
    $porcentaje_descuento = 0.10; // 10% de descuento
    
    $monto_impuesto = $subtotal * $porcentaje_impuesto;
    $monto_descuento = $subtotal * $porcentaje_descuento;
    
    $total_final = $subtotal + $monto_impuesto - $monto_descuento;

    $mostrar_resultados = true;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/estilo.css">
    <title>Calculadora de Compras</title>
   
</head>
<body>
    <br><br><br>
    <div class="container">
        <h1 style="text-align: center;  font-size: 15px;">Compras</h1>
        <form method="post" action="">
            <h2>Producto 1</h2>
            <div class="form-group-inline">
                <div>
                    <label for="precio1">Precio:</label>
                    <input type="text" id="precio1" name="precio1" value="<?= isset($_POST['precio1']) ? htmlspecialchars($_POST['precio1']) : '' ?>" required>
                </div>
                <div>
                    <label for="cantidad1">Cantidad:</label>
                    <input type="number" id="cantidad1" name="cantidad1" value="<?= isset($_POST['cantidad1']) ? htmlspecialchars($_POST['cantidad1']) : '' ?>" required>
                </div>
            </div>

            <h2>Producto 2</h2>
            <div class="form-group-inline">
                <div>
                    <label for="precio2">Precio:</label>
                    <input type="text" id="precio2" name="precio2" value="<?= isset($_POST['precio2']) ? htmlspecialchars($_POST['precio2']) : '' ?>" required>
                </div>
                <div>
                    <label for="cantidad2">Cantidad:</label>
                    <input type="number" id="cantidad2" name="cantidad2" value="<?= isset($_POST['cantidad2']) ? htmlspecialchars($_POST['cantidad2']) : '' ?>" required>
                </div>
            </div>

            <h2>Producto 3</h2>
            <div class="form-group-inline">
                <div>
                    <label for="precio3">Precio:</label>
                    <input type="text" id="precio3" name="precio3" value="<?= isset($_POST['precio3']) ? htmlspecialchars($_POST['precio3']) : '' ?>" required>
                </div>
                <div>
                    <label for="cantidad3">Cantidad:</label>
                    <input type="number" id="cantidad3" name="cantidad3" value="<?= isset($_POST['cantidad3']) ? htmlspecialchars($_POST['cantidad3']) : '' ?>" required>
                </div>
            </div>

            <input type="submit" value="Calcular">
        </form>

        <div class="result-container">
            <h2>Resumen de la compra</h2>
            <p>Subtotal: S/ <?= number_format($subtotal, 2) ?></p>
            <p>Monto de impuestos (18%): S/ <?= number_format($monto_impuesto, 2) ?></p>
            <p>Descuento aplicado (10%): S/ <?= number_format($monto_descuento, 2) ?></p>
            <p>Total final: S/ <?= number_format($total_final, 2) ?></p>
        </div>
    </div>
</body>
</html>
