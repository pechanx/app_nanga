<?php

class prePredio {

    private $id;
    private $id_sinat;
    private $pre_uso_predio_id;
    private $descripcion;
    private $nombre;
    private $lot_lote_id;
    private $codigo;
    private $codigo_acumulado;
    private $alicuota_ph;
    private $numero_propietarios;
    private $lev_levantamiento_id;
    private $clave_catastral_anterior;
    private $es_activo;
    private $cen_persona_id;
    private $alicuota_declaratoria;
    private $lot_lote_via_id;
    private $db;
    private $conn;
    private $nombreTabla = 'pre_predio';
    private $claveCatastral;

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
        $sql = "INSERT INTO pre_predio "
                . "(pre_uso_predio_id, descripcion, nombre, lot_lote_id, codigo, codigo_acumulado, "
                . "alicuota_ph, numero_propietarios, lev_levantamiento_id, clave_catastral_anterior, "
                . "es_activo, cen_persona_id, alicuota_declaratoria, lot_lote_via_id) "
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->pre_uso_predio_id);
        $cons->bindParam(2, $this->descripcion);
        $cons->bindParam(3, $this->nombre);
        $cons->bindParam(4, $this->lot_lote_id);
        $cons->bindParam(5, $this->codigo);
        $cons->bindParam(6, $this->codigo_acumulado);
        $cons->bindParam(7, $this->alicuota_ph);
        $cons->bindParam(8, $this->numero_propietarios);
        $cons->bindParam(9, $this->lev_levantamiento_id);
        $cons->bindParam(10, $this->clave_catastral_anterior);
        $cons->bindParam(11, $this->es_activo);
        $cons->bindParam(12, $this->cen_persona_id);
        $cons->bindParam(13, $this->alicuota_declaratoria);
        $cons->bindParam(14, $this->lot_lote_via_id);

        if ($cons->execute()) {
            return $this->db->obtenerId('pre_predio');
        } else {
            $detalle_error = array(
                'tabla' => 'pre_predio',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

    public function obtenerViaPrincipal() {
        $sql = 'SELECT lot_lote_via_id FROM pre_predio WHERE lot_lote_id = ?';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->lot_lote_id);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        return $datos[0]['lot_lote_via_id'];
    }

    public function obtenerNumeroUnipropiedadesIngresados() {

        $sql = 'SELECT COUNT(id) as numero_predios FROM ' . $this->nombreTabla . ';';
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        return $datos[0]['numero_predios'];
    }

    public function obtenerNumeroPredio() {
        $sql = 'SELECT max(pre.codigo) as codigo  FROM ' . $this->nombreTabla . ' pre, lot_lote lot, est_poligono po
                    WHERE pre.lot_lote_id = lot.id AND
                    lot.est_poligono_id = po.id AND
                    po.codigo_acumulado = ?';
        $cod = 0;
        $consulta = $this->conn->prepare($sql);
        $consulta->bindParam(1, $this->claveCatastral);
        $consulta->execute();
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        if ($consulta->rowCount() > 0) {
            empty($datos[0]['codigo']) ? $cod = 0 : $cod = $datos[0]['codigo'];
            return $cod;
        } else {
            return 0;
        }
    }
    
    public function listarPrediosInicio() {
        try {
            $sql = "select poligono.codigo_acumulado, predio.codigo , zona.nombre as zona, 
                    sector.nombre as sector, manzana.codigo as manzana 
                    from sch_catastro_urbano.est_poligono as poligono, 
                    sch_catastro_urbano.pre_predio as predio, 
                    sch_catastro_urbano.est_zona as zona,
                    sch_catastro_urbano.est_sector as sector , 
                    sch_catastro_urbano.est_manzana as manzana,
                    sch_catastro_urbano.lot_lote as lote
                    where poligono.est_manzana_id = manzana.id
                    and manzana.est_sector_id = sector.id
                    and sector.est_zona_id = zona.id
                    and lote.est_poligono_id = poligono.id
                    and predio.lot_lote_id = lote.id
                    ORDER BY poligono.codigo_acumulado ASC";
            $consulta = $this->conn->prepare($sql);
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            if ($consulta->rowCount() > 0) {
                return $datos;
            } else {
                return 0;
            }
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }

}
