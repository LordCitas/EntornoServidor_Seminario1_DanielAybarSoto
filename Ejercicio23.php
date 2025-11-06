<?php
function esNumeroArmstrong(int $numero): bool{
    if($numero < 0){
        throw new UnexpectedValueException;
    } else {
        //Convertimos el número a cadena para poder trabajar con sus dígitos
        $cadena = (array)$numero;

        //Inicializamos los valores que vamos a necesitar para hacer la comprobación
        $exponente = 0;
        $sePasa = false;

        do{
            $suma = 0;
            foreach($cadena as $base){
                $suma += pow($base, $exponente);
            }

            if($suma > $numero){
                $sePasa = true;
            }

            $potencia++;
        }while($suma < $numero && !$sePasa);

        //Comprobamos si la suma es igual al número original
        return $suma === $numero;
    }

}
