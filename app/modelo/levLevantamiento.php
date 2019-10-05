<?php

class levLevantamiento {

    private $id;
    private $id_sinat;
    private $inf_persona_id;
    private $lev_persona_id;
    private $fecha_levantamiento;
    private $sup_persona_id;
    private $fecha_supervisor;
    private $fis_persona_id;
    private $fecha_fiscalizar;
    private $rel_tipo_informante_id;
    private $descripcion;
    private $db;
    private $conn;
    private $nombreTabla = 'lev_levantamiento';

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

    public function guardar() {
        $sql = "INSERT INTO " . $this->nombreTabla
                . " (inf_persona_id, lev_persona_id, fecha_levantamiento, sup_persona_id, "
                . "fecha_supervisor, fis_persona_id, fecha_fiscalizar, rel_tipo_informante_id, "
                . "descripcion) "
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->inf_persona_id);
        $cons->bindParam(2, $this->lev_persona_id);
        $cons->bindParam(3, $this->fecha_levantamiento);
        $cons->bindParam(4, $this->sup_persona_id);
        $cons->bindParam(5, $this->fecha_levantamiento);
        $cons->bindParam(6, $this->fis_persona_id);
        $cons->bindParam(7, $this->fecha_levantamiento);
        $cons->bindParam(8, $this->rel_tipo_informante_id);
        $cons->bindParam(9, $this->descripcion);
        if ($cons->execute()) {
            return $this->db->obtenerId('lev_levantamiento');
        } else {
            $detalle_error = array(
                'tabla' => 'lev_levantamiento',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

}
