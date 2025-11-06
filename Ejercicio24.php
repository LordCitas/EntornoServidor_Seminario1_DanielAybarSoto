<?php
define("DESCUENTO_ESTUDIANTE", 0.15);
define("DESCUENTO_JUBILADO", 0.2);
define("DESCUENTO_VIP", 0.25);

function calcularPrecioFinal(float $precio, string $descuento): float{
    return match($descuento){
        "estudiante" => $precio * (1 - DESCUENTO_ESTUDIANTE),
        "jubilado" => $precio * (1 - DESCUENTO_JUBILADO),
        "vip" => $precio * (1 - DESCUENTO_VIP),
        default => throw new UnexpectedValueException,
    };
}

//una variable que imprime un salto de línea adecuado según el entorno
$nl = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>\n";

//Definimos el precio base y el tipo de descuento, y los mostramos
$precioBase = 100.0;
$tipoDescuento = "vip";
echo "El precio base introducido es " . $precioBase . "€, y el descuento seleccionado es " . $tipoDescuento . $nl;

//Llamamos a la función dentro de un bloque try-catch
try {
    //Si el precio no es un número positivo, lanzamos una excepción
    if (!is_float($precioBase) || $precioBase < 0) {
        throw new TypeError;
    } else { //En cualquier otro caso, calculamos el precio final
        $precioFinal = calcularPrecioFinal($precioBase, $tipoDescuento);
        echo "El precio final con el descuento aplicado es " . number_format($precioFinal, 2) . "€." . $nl;
    }
//Las excepciones que vamos a controlar
} catch (UnexpectedValueException $e) {
    echo "El tipo de descuento introducido no es válido." . $nl;
} catch (TypeError $e){
    echo "El precio original debe ser un número positivo." . $nl;
}