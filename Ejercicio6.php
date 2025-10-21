<?php
function contarSubcadenaEnTexto($subcadena, $texto){
    $contador = 0;
    $coincide = true;
    for($i = 0; $i<strlen($texto); $i++){
        $coincide = true;
        for($j = 0; $j<strlen($subcadena) && $coincide; $j++){
            if($texto[$i + $j] !== $subcadena[$j]){
                $coincide = false;
            }
        }
        if($coincide){
            $contador++;
        }
    }
    return $contador;
}

$texto = "Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, LoremLorem";
$subcadena = "Zapatilla";
echo "La subcadena \"" . $subcadena . "\" aparece un total de " . contarSubcadenaEnTexto($subcadena, $texto) . " veces en el texto.";
