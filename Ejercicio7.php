<?php
function capitalizar($texto){
    $resultado = $texto;
    $array = str_word_count($resultado,1);
    var_dump($array);
}

$texto = "Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, LoremLorem";
capitalizar($texto);