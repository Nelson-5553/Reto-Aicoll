<?php

namespace App\Helpers;

class NitHelper
{
    /**
     * Calcula el Dígito de Verificación (DV) para un NIT colombiano.
     *
     * @param string|int $nit Número de Identificación Tributaria (NIT) sin DV.
     * @return int Dígito de Verificación calculado.
     */
    public static function calcularDV($nit)
    {
        // Factores usados para el cálculo del DV
        $factores = [3, 7, 13, 17, 19, 23, 29, 37, 41, 43, 47, 53, 59, 67, 71];
        $suma = 0;

        $nitReverso = strrev($nit);// Invertir el NIT

        // Sumar el producto de cada dígito por su factor correspondiente
        for ($i = 0; $i < strlen($nitReverso); $i++) {
            $suma += intval($nitReverso[$i]) * $factores[$i];
        }
        // Obtener el residuo de la suma al dividir por 11
        $residuo = $suma % 11;
        // Si el residuo es mayor a 1, el DV es 11 menos el residuo; de lo contrario, el DV es igual al residuo
        return $residuo > 1 ? 11 - $residuo : $residuo;
    }

    /**
     * Genera un NIT colombiano aleatorio con su Dígito de Verificación (DV).
     *
     * @return string NIT generado en formato "XXXXXXXXX-D".
     */
    public static function generarNIT()
    {
        // Generar un número aleatorio de 9 dígitos | El número del NIT lo asigna la DIAN no se genera aleatoriamente
        $numero = strval(rand(100000000, 999999999));
        $dv = self::calcularDV($numero);
        return $numero . "-" . $dv;
    }
}
