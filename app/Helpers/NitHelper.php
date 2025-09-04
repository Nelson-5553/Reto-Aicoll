<?php

namespace App\Helpers;

class NitHelper
{
    public static function calcularDV($nit)
    {
        $factores = [3, 7, 13, 17, 19, 23, 29, 37, 41, 43, 47, 53, 59, 67, 71];
        $suma = 0;
        $nitReverso = strrev($nit);

        for ($i = 0; $i < strlen($nitReverso); $i++) {
            $suma += intval($nitReverso[$i]) * $factores[$i];
        }

        $residuo = $suma % 11;
        return $residuo > 1 ? 11 - $residuo : $residuo;
    }

    public static function generarNIT()
    {
        $numero = strval(rand(100000000, 999999999));
        $dv = self::calcularDV($numero);
        return $numero . "-" . $dv;
    }
}
