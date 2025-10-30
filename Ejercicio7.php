<?php
function capitalizar($texto){
    //Declaramos las variables que vamos a usar
    $resultado = "";
    $palabra = "";

    //Separamos el texto en palabras
    $array = str_word_count($texto,1);

    //Un bucle para formar la palabra con mayúscula
    foreach ($array as $i){
        //Inicializamos palabra con la inicial en mayúscula
        $palabra = strtoupper($i[0]);
        for($j = 1; $j < strlen($i); $j++){
            $palabra .= $i[$j];
        }
        $resultado .= $palabra . " ";
    }
    return $resultado;
}

$texto = "100 Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, LoremLorem";
$resultado = capitalizar($texto);
echo $resultado;

