<?php

class escInscripcion {

    private $id;
    private $est_canton_id;
    private $matricula;
    private $libro;
    private $foja;
    private $fecha;
    private $es_activo;
    private $id_sinat;
    private $notaria;
    private $db;
    private $conn;
    private $nombreTabla = 'esc_inscripcion';

    function __construct() {
        $this->db = new ConexionDB();
        $this->conn = $this->db->conectar();
    }

    function get($atributo) {
        return $this->$atributo;
    }

    function set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    function guardar() {
        $sql = "INSERT INTO " . $this->nombreTabla
                . " (est_canton_id, matricula, libro, foja, fecha, es_activo, id_sinat, notaria) "
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->est_canton_id);
        $cons->bindParam(2, $this->matricula);
        $cons->bindParam(3, $this->libro);
        $cons->bindParam(4, $this->foja);
        $cons->bindParam(5, $this->fecha);
        $cons->bindParam(6, $this->es_activo);
        $cons->bindParam(7, $this->id_sinat);
        $cons->bindParam(8, $this->notaria);

        if ($cons->execute()) {
            return $this->db->obtenerId($this->nombreTabla);
        } else {
            $detalle_error = array(
                'tabla' => $this->nombreTabla,
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
//            print_r($cons->errorInfo());
            return 0;
        }
    }

}
