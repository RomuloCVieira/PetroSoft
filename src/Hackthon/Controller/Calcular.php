<?php

declare (strict_types=1);

namespace Hackthon\Controller;


class Calcular 
{
    public function calcular( $gasolina, $etanol) : array
    {
        $calculo  = $etanol / $gasolina;
        if($calculo >= 0.7){
            $msg = "Abastecer com gasolina!!!";
        }else{
            $msg = "Abastecer com etanol !!!";
        }
        $resultado = [
           '1' => $calculo,
           '2' => $msg,
        ];
        return $resultado;
    }
}