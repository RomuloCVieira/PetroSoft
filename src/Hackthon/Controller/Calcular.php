<?php

declare (strict_types=1);

namespace Hackthon\Controller;


class Calcular 
{
    public function calcular( $gasolina, $etanol)
    {
        $resultado = $gasolina - $etanol;
        return $resultado;
    }
}