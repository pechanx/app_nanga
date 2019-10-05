<?php

class Util {

    private $vista;
    

    function __get($atributo) {
        return $this->$atributo;
    }

    function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    function renderVistas() {
        switch ($this->vista) {
            case 'unipropiedad': require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/unipropiedad/ficha.php';
                break;
            case 'inicio': require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/sistema/inicio.php';
                break;
            case 'vias': require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/vias/ficha.php';
                break;
            
//            case 'gesUnipropiedad': require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/pdf/generarPDFUnipropiedad.php';
//                break;


            default: require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/sistema/inicio.php';
                break;
        }
    }

    public function validarContrasena($contrasena, $hash) {
        if (password_verify($contrasena, $hash)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function validarIngreso() {
        if (isset($_SESSION['usuario'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function validarRol() {
        if ($_SESSION['tipo'] === 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function validarCedula($cedula) {
        $cedulaArray = str_split($cedula);
        $numeroCaracteres = count($cedulaArray);
        if ($numeroCaracteres === 10) {
            $total = 0;
            $digito = $cedulaArray[9] * 1;
            for ($i = 0; $i < ($numeroCaracteres - 1); $i++) {
                $mult = 0;
                if (($i % 2) !== 0) {
                    $total = $total + ($cedulaArray[$i]);
                } else {
                    $mult = $cedulaArray[$i] * 2;
                    $mult > 9 ? $total = $total + ($mult - 9) : $total = $total + $mult;
                }
            }

            $decena = $total / 10;
            $decena = floor($decena);
            $decena = ($decena + 1) * 10;
            $final = ($decena - $total);

            if (($final == 10 && $digito == 0) || ($final == $digito)) {
                return 1; //cedula bien
            } else {
                return 0; //cedula mal
            }
        } else {
            return 2; // número de caracteres erroneo
        }
    }

    public function validarRuc($ruc) {
        $rucArray = str_split($ruc);
        $numeroCaracteres = count($rucArray);
        $valor = 0;
        $acu = 0;

        if ($numeroCaracteres == 13) {
            $tresUltimosDigitos = $rucArray[10] . $rucArray[11] . $rucArray[12];
            $dosPrimerosDigitos = $rucArray[0] . $rucArray[1];
            for ($i = 0; $i < $numeroCaracteres; $i++) {
                if ($valor[$i] == 0 || $valor[$i] == 1 || $valor[$i] == 2 || $valor[$i] == 3 || $valor[$i] == 4 || $valor[$i] == 5 || $valor[$i] == 6 || $valor[$i] == 7 || $valor[$i] == 8 || $valor[$i] == 9) {
                    $acu = $acu + 1;
                }
            }
            if ($acu == $numeroCaracteres) {
                while ($tresUltimosDigitos != 001) {
                    return 2; //error en tres ultimos digitos
                }
                while ($dosPrimerosDigitos > 24) {
                    return 2; //Los dos primeros dígitos no pueden ser mayores a 24
                }
                return 1;
            } else {
                return 0;
            }
        } else {
            return 2;
        }
    }
    
    

}
