<?php
declare(strict_types=1);

//Una función para leer la entrada del usuario
function leer(string $prompt): string{
    return readline($prompt);
}

//Una función para validar que la entrada es un número
function validarNumero(string $entrada): float{
    //Comprobamos si la entrada está vacía o no es numérica
    if ($entrada == ''){ //Si está vacía, lanzamos una excepción
        throw new UnexpectedValueException('Entrada vacía: se esperaba un número.');
    } else if (!is_numeric($entrada)){ //Si no es numérica, lanzamos una excepción
        throw new UnexpectedValueException("Valor no numérico: '{$entrada}'.");
    }

    //En cualquier otro caso, devolvemos el número convertido a float
    return (float)$entrada;
}

//Una función para realizar la operación solicitada
function calcular(float $a, float $b, string $operador): float{
    //Realizamos la operación según el operador indicado y devolvemos el resultado
    switch ($operador) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            //Comprobamos que no se intente dividir por 0
            if ($b == 0.0) { //Si es así, lanzamos una excepción
                throw new DivisionByZeroError('No se puede dividir por 0');
            }
            //En cualquier otro caso, realizamos la división
            return $a / $b;
        default: //Si el operador no es válido, lanzamos una excepción
            throw new UnexpectedValueException("El operador '{$operador}' no está reconocido. Use +, -, * o /.");
    }
}

//Una variable que imprime un salto de línea adecuado según el entorno
$nl = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>\n";

//Llamamos a la función dentro de un bloque try-catch
try {
    //Leemos y validamos los números
    $entrada1 = leer("Ingrese el primer número: ");
    $num1 = validarNumero($entrada1);

    $entrada2 = leer("Ingrese el segundo número: ");
    $num2 = validarNumero($entrada2);

    $operador = leer("Ingrese la operación (+, -, *, /): ");
    $operador = trim($operador)[0] ?? '';

    //Realizamos el cálculo
    $resultado = calcular($num1, $num2, $operador);
    echo "Resultado: " . $resultado . $nl;

//Las excepciones que vamos a controlar
} catch (DivisionByZeroError $e) {
    echo $e->getMessage() . $nl;
} catch (UnexpectedValueException $e) {
    echo "Entrada inválida: " . $e->getMessage() . $nl;
}

