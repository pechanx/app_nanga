<?php

class estPiso {

    private $id;
    private $id_sinat;
    private $est_bloque_id;
    private $codigo;
    private $codigo_acumulado;
    private $area;
    private $es_activo;
    private $poligono;
    private $nombre;
    private $est_poligono_id;
    private $db;
    private $conn;
    private $nombreTabla = 'est_piso';

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

    function obtenerPisos() {
        $sql = 'select pi.id, pol.id as cod_poligono, pi.codigo_acumulado, pi.area from sch_catastro_urbano.est_piso pi, sch_catastro_urbano.est_bloque blo, sch_catastro_urbano.est_poligono pol
            where pi.est_bloque_id = blo.id and blo.est_poligono_id = pol.id and pol.id = ?';

        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->est_poligono_id);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        if ($cons->rowCount() > 0) {
            return $datos;
        } else {
            return 0;
        }
    }

}
