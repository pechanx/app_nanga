<?php

class viaVia {

    private $id;
    private $id_sinat;
    private $via_via_total_id;
    private $es_activo;
    private $est_pec_id;
    private $db;
    private $conn;
    private $nombreTabla = 'via_via';
    private $nombreTablaForaneaTotal = 'via_via_total';
    private $nombreTablaForaneaPec = 'est_pec';

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
        $sql = "INSERT INTO via_via (via_via_total_id, es_activo, est_pec_id) VALUES (?, ?, ?)";
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->via_via_total_id);
        $cons->bindParam(2, $this->es_activo);
        $cons->bindParam(3, $this->est_pec_id);

        if ($cons->execute()) {
            return $this->db->obtenerId('via_via');
        } else {
            $detalle_error = array(
                'tabla' => 'via_via',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

    function obtenerNumeroViasIngresadas() {
        $sql = 'SELECT
	COUNT (*) AS numero_vias
        FROM 
	' . $this->nombreTabla . ', ' . $this->nombreTablaForaneaPec . ', ' . $this->nombreTablaForaneaTotal . ' WHERE
	est_pec. ID = via_via.est_pec_id
        AND via_via_total. ID = via_via.via_via_total_id;';
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        return $datos[0]['numero_vias'];
    }

    function listarVias() {
        $sql = 'select 
                    via_via.id, 
                    est_pec.codigo,
                    via_via_total.nombre 
                    from 
                    ' . $this->nombreTabla . ' as via_via,
                    ' . $this->nombreTablaForaneaPec . ' as est_pec,
                    ' . $this->nombreTablaForaneaTotal . ' as via_via_total 
                    where
                    via_via.est_pec_id = est_pec.id and
                    via_via.via_via_total_id = via_via_total.id
                    order by codigo asc';
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        return $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
    }
    
//    function obtenerDatosViasPorNombreVia(){
//        $sql = 'SELECT id, codigo, nombre FROM est_pec, via_via_total, via_via WHERE
//	est_pec. ID = via_via.est_pec_id
//        AND via_via_total."id" = via_via.via_via_total_id
//        AND via_via_total.id = ?';
//        $cons = $this->conn->prepare($sql);
//        $cons->execute();
//        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
//        return $datos;
//    }

}
