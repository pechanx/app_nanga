<?php

class mejMejora {

    private $id;
    private $id_sinat;
    private $gen_tipo_mejora_id;
    private $dimension;
    private $gen_estado_conservacion_id;
    private $anio_instalacion;
    private $est_unidad_id;
    private $pre_predio_id;
    private $es_activo;
    private $inventario_patrimonial;
    private $descripcion;
    private $numero_pisos;
    private $tipo;
    private $gen_etapa_construccion_id;
    private $db;
    private $conn;
    private $nombreTabla = 'mej_mejora';

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
        $sql = "INSERT INTO mej_mejora (gen_tipo_mejora_id, dimension, gen_estado_conservacion_id, "
                . "anio_instalacion, est_unidad_id, pre_predio_id, es_activo, inventario_patrimonial, descripcion, "
                . "numero_pisos, tipo, gen_etapa_construccion_id) "
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->gen_tipo_mejora_id);
        $cons->bindParam(2, $this->dimension);
        $cons->bindParam(3, $this->gen_estado_conservacion_id);
        $cons->bindParam(4, $this->anio_instalacion);
        $cons->bindParam(5, $this->est_unidad_id);
        $cons->bindParam(6, $this->pre_predio_id);
        $cons->bindParam(7, $this->es_activo);
        $cons->bindParam(8, $this->inventario_patrimonial);
        $cons->bindParam(9, $this->descripcion);
        $cons->bindParam(10, $this->numero_pisos);
        $cons->bindParam(11, $this->tipo);
        $cons->bindParam(12, $this->gen_etapa_construccion_id);
        if ($cons->execute()) {
            return $id = $this->db->obtenerId('mej_mejora');
        } else {
            $detalle_error = array(
                'tabla' => 'mej_mejora',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            
            return 0;
        }
    }

}
