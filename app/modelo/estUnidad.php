<?php

class estUnidad {

    private $id;
    private $id_sinat;
    private $es_activo;
    private $codigo;
    private $codigo_acumulado;
    private $est_piso_id;
    private $area;
    private $tipo_ficha;
    private $poligono;
    private $cod_acumulado_bloque;
    private $db;
    private $conn;
    private $nombreTabla = 'est_unidad';

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
        $sql = "INSERT INTO est_unidad (es_activo, codigo, codigo_acumulado, est_piso_id, area, tipo_ficha) "
                . "VALUES (?, ?, ?, ?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->es_activo);
        $cons->bindParam(2, $this->codigo);
        $cons->bindParam(3, $this->codigo_acumulado);
        $cons->bindParam(4, $this->est_piso_id);
        $cons->bindParam(5, $this->area);
        $cons->bindParam(6, $this->tipo_ficha);

        if ($cons->execute()) {
            return $id = $this->db->obtenerId('est_unidad');
        } else {
            $detalle_error = array(
                'tabla' => 'est_unidad',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

    function validarUnidadIngresada() {
        $sql = 'select id, codigo_acumulado from est_unidad 
            where codigo_acumulado = ?';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->codigo_acumulado);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        if ($cons->rowCount() > 0) {
            return $datos[0]['id'];
        } else {
            return 0;
        }
    }
    
    function obtenerUnidadPorCodBloque() {
        $sql = 'select u.id as unidad from sch_catastro_urbano.est_unidad u, 
                            sch_catastro_urbano.est_piso pi, 
                            sch_catastro_urbano.est_bloque blo
                            where pi.id = u.est_piso_id and 
                            blo.id = pi.est_bloque_id  and 
                            blo.codigo_acumulado = ? LIMIT 1';

        $consulta = $this->conn->prepare($sql);
        $consulta->bindParam(1, $this->cod_acumulado_bloque);
        $consulta->execute();
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        if ($consulta->rowCount() > 0) {
            return $datos[0]['unidad'];
        } else {
            return 0;
        }
    }

}
