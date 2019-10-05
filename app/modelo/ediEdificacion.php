<?php

class ediEdificacion {

    private $id;
    private $est_unidad_id;
    private $denominacion;
    private $aumento_constructivo;
    private $gen_uso_construccion_id;
    private $gen_estado_conservacion_id;
    private $gen_etapa_construccion_id;
    private $gen_tipo_acabado_id;
    private $anio_construccion;
    private $anio_restauracion;
    private $id_sinat;
    private $es_activo;
    private $pre_predio_id;
    private $area_declaratoria;
    private $inventario_patrimonial;
    private $area_ingresada;
    private $numero_pisos;
    private $descripcion;
    private $db;
    private $conn;
    private $nombreTabla = 'edi_edificacion';

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
        $sql = "INSERT INTO edi_edificacion "
                . "(est_unidad_id, denominacion, aumento_constructivo, "
                . "gen_uso_construccion_id, gen_estado_conservacion_id, "
                . "gen_etapa_construccion_id, gen_tipo_acabado_id, "
                . "anio_construccion, anio_restauracion, "
                . "es_activo, pre_predio_id, area_declaratoria, "
                . "inventario_patrimonial, area_ingresada, "
                . "numero_pisos, descripcion) "
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->est_unidad_id);
        $cons->bindParam(2, $this->denominacion);
        $cons->bindParam(3, $this->aumento_constructivo);
        $cons->bindParam(4, $this->gen_uso_construccion_id);
        $cons->bindParam(5, $this->gen_estado_conservacion_id);
        $cons->bindParam(6, $this->gen_etapa_construccion_id);
        $cons->bindParam(7, $this->gen_tipo_acabado_id);
        $cons->bindParam(8, $this->anio_construccion);
        $cons->bindParam(9, $this->anio_restauracion);
        $cons->bindParam(10, $this->es_activo);
        $cons->bindParam(11, $this->pre_predio_id);
        $cons->bindParam(12, $this->area_declaratoria);
        $cons->bindParam(13, $this->inventario_patrimonial);
        $cons->bindParam(14, $this->area_ingresada);
        $cons->bindParam(15, $this->numero_pisos);
        $cons->bindParam(16, $this->descripcion);

        if ($cons->execute()) {
            return $id = $this->db->obtenerId('edi_edificacion');
        } else {
            $detalle_error = array(
                'tabla' => 'edi_edificacion',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
//            print_r($cons->errorInfo());
            return 0;
        }
    }

    function guardarUnidad() {
        $sql = 'UPDATE edi_edificacion SET est_unidad_id = ? WHERE id = ?';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->est_unidad_id);
        $cons->bindParam(2, $this->id);
        if ($cons->execute()) {
            return $this->est_unidad_id;
        } else {
            $detalle_error = array(
                'tabla' => 'edi_edificacion',
                'metodo' => 'guardarUnidad',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

}
