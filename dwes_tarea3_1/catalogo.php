<?php
// 1. Lista de productos
$productos = [
    [
        "nombre" => "Portátil Estudiante 14\"",
        "categoria" => "Informática",
        "precio" => 450.00,
        "stock" => 10
    ],
    [
        "nombre" => "Ratón Inalámbrico",
        "categoria" => "Accesorios",
        "precio" => 15.50,
        "stock" => 0
    ],
    [
        "nombre" => "Auriculares con Micrófono",
        "categoria" => "Sonido",
        "precio" => 29.99,
        "stock" => 0
    ],
    [
        "nombre" => "Teclado USB",
        "categoria" => "Accesorios",
        "precio" => 19.90,
        "stock" => 15
    ],
     [
        "nombre" => "Webcam",
        "categoria" => "Accesorios",
        "precio" => 39.99,
        "stock" => 23
    ]
];
// 2. Calculamos datos básicos del catálogo
$totalProductos = count($productos);
$sumaPrecios = 0;
foreach ($productos as $producto) {
    $sumaPrecios += $producto['precio'];
}
$precioMedio = $sumaPrecios / $totalProductos;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Catálogo de Productos - DWES</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 20px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }

        h1 {
            color: #007bff;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .disponible {
            color: green;
            font-weight: bold;
        }

        .pocas-unidades {
            color: orange;
            font-weight: bold;
        }

        .agotado {
            color: red;
            font-weight: bold;
        }

        .resumen {
            background: #e9ecef;
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Mi Tienda Digital</h1>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Estado del stock</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $item): ?>
                    <tr>
                        <td><?= $item['nombre'] ?></td>
                        <td><?= $item['categoria'] ?></td>
                        <td><?= $item['precio'] ?> €</td>
                        <td>
                            <?php if ($item['stock'] == 0): ?>
                                <span class="agotado">Agotado</span>
                            <?php elseif ($item['stock'] <= 5): ?>
                                <span class="pocas-unidades">
                                    Últimas unidades (<?= $item['stock'] ?>)
                                </span>
                            <?php else: ?>
                                <span class="disponible">
                                    Disponible (<?= $item['stock'] ?>)
                                </span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="resumen">
            <p><strong>Total de productos:</strong>
                <?= $totalProductos ?>
            </p>
            <p><strong>Precio medio:</strong>
                <?= number_format($precioMedio, 2) ?> €
            </p>
        </div>
    </div>
</body>

</html>