<?php

class lotLote {

    private $id;
    private $id_sinat;
    private $area_escritura;
    private $gen_unidad_medida_id;
    private $descripcion;
    private $est_poligono_id;
    private $tipo_inmueble;
    private $lote_conflicto;
    private $es_activo;
    private $descripcion_lote_conflicto;
    private $lot_barrio_id;
    private $lot_lote_ocupacion_id;
    private $db;
    private $conn;
    private $nombreTabla = 'lot_lote';

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
        $sql = "INSERT INTO "
                . $this->nombreTabla . " (area_escritura, "
                . "gen_unidad_medida_id, "
                . "descripcion, "
                . "est_poligono_id, "
                . "tipo_inmueble, "
                . "lote_conflicto, "
                . "es_activo, "
                . "descripcion_lote_conflicto, "
                . "lot_barrio_id, "
                . "lot_lote_ocupacion_id)"
                . "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->area_escritura);
        $cons->bindParam(2, $this->gen_unidad_medida_id);
        $cons->bindParam(3, $this->descripcion);
        $cons->bindParam(4, $this->est_poligono_id);
        $cons->bindParam(5, $this->tipo_inmueble);
        $cons->bindParam(6, $this->lote_conflicto);
        $cons->bindParam(7, $this->es_activo);
        $cons->bindParam(8, $this->descripcion_lote_conflicto);
        $cons->bindParam(9, $this->lot_barrio_id);
        $cons->bindParam(10, $this->lot_lote_ocupacion_id);
        if ($cons->execute()) {
            return $this->db->obtenerId($this->nombreTabla);
        } else {
            $detalle_error = array(
                'tabla' => $this->nombreTabla,
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

    public function obtenerNumeroLotesClonflicto() {
        $sql = "SELECT count(id) as conflictos FROM " . $this->nombreTabla . " WHERE lote_conflicto = TRUE ";
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        return $datos[0]['conflictos'];
    }

}
