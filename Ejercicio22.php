<?php
function esNumeroPerfecto($numero): bool{
    if(!is_int($numero) || $numero < 2){
        throw new InvalidArgumentException;
    } else {
        $sumaDivisores = 0;
        $max = $numero / 2;

        for($i = 1; $i <= $max; $i++){
            if($numero % $i == 0){
                $sumaDivisores += $i;
            }
        }
        return $sumaDivisores == $numero;
    }
}