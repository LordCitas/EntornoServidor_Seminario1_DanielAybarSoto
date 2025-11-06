<?php
declare(strict_types=1);

//Definimos las constantes necesarias para las conversiones
define('FACTOR_9_5', 9.0 / 5.0);
define('FACTOR_5_9', 5.0 / 9.0);
define('DESPLAZAMIENTO_KELVIN', 273.15);

//Una función que convierte Celsius a Fahrenheit
function celsiusAFahrenheit(float $c): float{
    error_log("[" . __FUNCTION__ . "] L" . __LINE__ . " - C->F: {$c}");

    //Devolvemos el valor convertido
    return ($c * FACTOR_9_5) + 32.0;
}

//Una función que convierte Celsius a Kelvin
function celsiusAKelvin(float $c): float{
    error_log("[" . __FUNCTION__ . "] L" . __LINE__ . " - C->K: {$c}");

    //Devolvemos el valor convertido
    return $c + DESPLAZAMIENTO_KELVIN;
}

//Una función que convierte Fahrenheit a Celsius
function fahrenheitACelsius(float $f): float{
    error_log("[" . __FUNCTION__ . "] L" . __LINE__ . " - F->C: {$f}");

    //Devolvemos el valor convertido
    return ($f - 32.0) * FACTOR_5_9;
}

//Una función que convierte Kelvin a Celsius
function kelvinACelsius(float $k): float{
    error_log("[" . __FUNCTION__ . "] L" . __LINE__ . " - K->C: {$k}");

    //Devolvemos el valor convertido
    return $k - DESPLAZAMIENTO_KELVIN;
}

//Una función que convierte entre diferentes unidades de temperatura
function convertirTemperatura(float $valor, string $cambioDe, string $cambioA): float{
    //
    $inicio = mb_strtolower(trim($cambioDe));
    $final = mb_strtolower(trim($cambioA));

    //Primero pasamos de unidad origen a Celsius
    switch ($inicio) {
        case 'celsius':
        case 'c':
            $celsius = $valor;
            break;
        case 'fahrenheit':
        case 'f':
            $celsius = fahrenheitACelsius($valor);
            break;
        case 'kelvin':
        case 'k':
            $celsius = kelvinACelsius($valor);
            break;
        default: //Si la unidad no es válida, lanzamos una excepción
            error_log("[convertirTemperatura] L" . __LINE__ . " - Unidad de origen desconocida: {$cambioDe}");
            throw new UnexpectedValueException("Unidad de origen desconocida: {$cambioDe}");
    }

    //Y luego de Celsius a unidad destino
    switch ($final) {
        case 'celsius':
        case 'c':
            $result = $celsius;
            break;
        case 'fahrenheit':
        case 'f':
            $result = celsiusAFahrenheit($celsius);
            break;
        case 'kelvin':
        case 'k':
            $result = celsiusAKelvin($celsius);
            break;
        default: //Si la unidad no es válida, lanzamos una excepción
            error_log("[convertirTemperatura] L" . __LINE__ . " - Unidad destino desconocida: {$cambioA}");
            throw new UnexpectedValueException("Unidad destino desconocida: {$cambioA}");
    }

    //Devolvemos el resultado redondeado a 2 decimales
    return round($result, 2);
}

//Ejemplo de uso
convertirTemperatura(25, 'celsius', 'fahrenheit');
echo convertirTemperatura(25, 'celsius', 'fahrenheit') . PHP_EOL;

