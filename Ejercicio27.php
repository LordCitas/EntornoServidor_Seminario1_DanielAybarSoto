<?php
//Una función que convierte un array en un objeto stdClass de forma recursiva
function arrayAObjetos(array $arr): stdClass{
    //Creamos el objeto vacío
    $obj = new stdClass();

    //Recorremos el array y asignamos sus valores al objeto
    foreach ($arr as $key => $value) {
        $obj->{$key} = is_array($value) ? arrayAObjetos($value) : $value;
    }

    //Devolvemos el objeto generado
    return $obj;
}

//Una función que accede de forma segura al código postal del usuario
function accederAlCodigoPostal(array $datos): string
{
    $usuario = arrayAObjetos($datos);

    //Uso el operador nullsafe para intentar leer codigoPostal de forma segura
    $codigoPostal = $usuario->direccion?->codigoPostal ?? null;

    //Compruebo si la dirección existe
    if(isset($usuario->direccion)) {
        //Compruebo si el código postal existe y no está vacío
        if($codigoPostal !== null && $codigoPostal !== '') {
            return "El código postal es: {$codigoPostal}";
        }
        return "La dirección existe pero no tiene código postal.";
    }
    //Devolvemos un mensaje distinto en cada caso
    return "No hay dirección disponible.";
}

//Una variable que imprime un salto de línea adecuado según el entorno
$nl = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>\n";

//Definimos el array de datos del usuario
$datosUsuario = [
    'nombre' => "Ana Gómez",
    'email' => null,
    'edad' => 25,
    'direccion' => [
        'calle' => "Calle Falsa 123",
        'ciudad' => "Springfield",
        'codigoPostal' => null
    ],
];

//Mostramos el resultado de acceder al código postal
echo accederAlCodigoPostal($datosUsuario) . $nl;