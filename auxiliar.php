<?php


    /**
     * filtra un parámetro recibido mediante GET, lo trimea y 
     * comprueba si es un número ( en caso contrario, devuelve null)
     * 
     * Actualiza el array de errores en caso necesario.
     *
     * @param  string       $par   El nombre del parámetro
     * @param  array        $error El array de errores.
     * @return string|null         El valor del parámetro o null si no es un numero.
     */

    function filtrar_nombre_y_apellido(string $par, array &$error): ?string  
    {
        $val = null;

        if (isset($_GET[$par])):
            $val = trim($_GET[$par]);
            if ($val == ''):
                $error[] = "El parámetro $par es obligatorio";
            elseif (is_numeric($val)):
                $error[] = "El parametro $par no es correcto.";
            endif;
        endif;

        return $val;
    }

    function filtrar_fecha(string $par, array &$error): ?string 
    {
        $val = null;


        if (isset($_GET[$par])):
            $val = trim($_GET[$par]);
            if ($val == ''):
                $error[] = "El parámetro $par es obligatorio";
            else:
                $fecha = explode('-', $val);
                if (count($fecha) == 3):
                    [$a, $m, $d] = $fecha;
                endif;
                if (!isset($a, $m, $d) || !checkdate($m, $d, $a)):
                    $error[] = "El parametro $par contiene una fecha incorrecta.";
                endif;
            endif;
        endif;

        return $val;
    }


    function calcular_edad($fecha_nac)
    {
        return (new DateTime())->diff(new DateTime($fecha_nac))->y;
    }

    

    function mostrar_errores(array $error): void
    {
        foreach($error as $err): ?>
            <p>Error: <?= $err ?></p>
        <?php 
        endforeach;
    }

    

function selected($a, $b)
{
    return ($a == $b) ? 'selected' : '';
}