<?php
require_once "Articulo.php";

function mostrarArticulo(Articulo $articulo): void {
    echo "<h2>" . htmlspecialchars($articulo->getNombre()) . "</h2>";
    echo "Precio base: " . number_format($articulo->getPrecio(), 2, ',', '.') . " €<br>";
    echo "Con IVA: " . number_format($articulo->precioConIva(), 2, ',', '.') . " €<br>";

    if ($articulo->esCaro()) {
        echo "<strong>Artículo de precio elevado</strong><br>";
    }
}

$articulo1 = new Articulo("Ratón Inalámbrico", 25.50);
$articulo2 = new Articulo("Auriculares USB", 50.00);
$articulo3 = new Articulo("Monitor 27 pulgadas", 149.99);

echo "<h1>Mi catálogo</h1>";
mostrarArticulo($articulo1);
mostrarArticulo($articulo2);
mostrarArticulo($articulo3);