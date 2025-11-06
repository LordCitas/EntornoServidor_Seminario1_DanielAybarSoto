<?php
function asignarValoresPorDefecto(array $datos){
    return [
        'nombre' => $datos['nombre'] ?? "Anónimo",
        'email' => $datos['email'] ?? "sin-email@example.com",
        'edad' => $datos['edad'] ?? 18,
        'ciudad' => $datos['ciudad'] ?? "Desconocida",
    ];
}

//una variable que imprime un salto de línea adecuado según el entorno
$nl = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>\n";

//Definimos el array de datos incompleto
$datosUsuario = [
    'nombre' => "Juan Pérez",
    'email' => null,
    'edad' => null,
    'ciudad' => "Madrid",
];

//Mostramos los datos antes de asignar valores por defecto
echo "Datos del usuario antes de asignar valores por defecto:" . $nl;
print_r($datosUsuario);

//Asignamos los valores por defecto
$datosCompletos = asignarValoresPorDefecto($datosUsuario);

//Mostramos los datos después de asignar valores por defecto
echo $nl . "Datos del usuario después de asignar valores por defecto:" . $nl;
print_r($datosCompletos);


