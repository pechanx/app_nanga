<?php

class estPec {

    private $id;
    private $id_sinat;
    private $es_activo;
    private $codigo;
    private $codigo_acumulado;
    private $est_canton_id;
    private $area;
    private $poligono;
    private $tipo_ficha;
    private $descripcion;
    private $linea;
    private $db;
    private $conn;
    private $nombreTabla = 'est_pec';
    private $nombreTablaForaneaViaVia = 'via_via';

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

    function listarPorTipoFicha() {
        
        $sql = 'select * from ' . $this->nombreTabla . ' '
                . 'where id not in (select est_pec_id from ' . $this->nombreTablaForaneaViaVia . ') '
                . 'and tipo_ficha = ? order by codigo_acumulado asc';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->tipo_ficha);
        $cons->execute();
        return $cons->fetchAll(PDO::FETCH_ASSOC);
    }

}
