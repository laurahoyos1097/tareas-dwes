<?php
$nombreAlumno = "Laura Hoyos";
$edad = 28;
$promedio = 8.75;
$matriculado = true;
$numeroModulos = 6;

echo "<h2>1. Tipos de datos</h2>";
echo "Nombre: ";
var_dump($nombreAlumno);
echo "<br>Edad: ";
var_dump($edad);
echo "<br>Promedio: ";
var_dump($promedio);
echo "<br>Matriculado: ";
var_dump($matriculado);
echo "<br>Número de módulos: ";
var_dump($numeroModulos);
echo "<hr>";


echo "<h2>2. Cadenas y constantes</h2>";
echo 'Comillas simples: Hola $nombreAlumno, tu edad es $edad <br>';
echo "Comillas dobles: Hola $nombreAlumno, tu edad es $edad <br>";
define("INSTITUTO", "Digitech FP");
const CURSO = "2026-2027";
echo "Estudias en: " . INSTITUTO . " (Curso " . CURSO . ")<br>";
const MODULO = "Desarrollo Web en Entorno Servidor<br>";
echo "Módulo: " . MODULO;
echo "<hr>";


echo "<h2>3. Comparación y conversión de tipos</h2>";
$numeroTexto = "50";
$numeroEntero = 50;
echo "¿Son iguales con == ? ";
var_dump($numeroTexto == $numeroEntero);
echo "<br>¿Son idénticos con === ? ";
var_dump($numeroTexto === $numeroEntero);
$cadenaDecimal = "15.85";
$enteroForzado = (int)$cadenaDecimal;
echo "<br>Valor original: $cadenaDecimal";
echo "<br>Convertido a int: $enteroForzado";
echo "<hr>";

$valor1 = "100";
$valor2 = 100;

echo "<br><strong>Comprobación:</strong><br>";

echo "¿$valor1 y $valor2 son iguales con == ? ";
var_dump($valor1 == $valor2);

echo "<br>¿$valor1 y $valor2 son idénticos con === ? ";
var_dump($valor1 === $valor2);

echo "<h2>4. Ámbito de variables</h2>";
$variableGlobal = "Esta es la variable global (fuera de la función)";
function probarAmbito()
{
    $variableLocal = "Esta es la variable local (dentro de la función)";
    global $variableGlobal;
    echo "Dentro de la función: $variableLocal <br>";
    echo "Variable global desde la función: $variableGlobal <br>";
}
probarAmbito();
echo "Fuera de la función: $variableGlobal <br>";
?>