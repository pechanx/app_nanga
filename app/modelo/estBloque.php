<?php

class estBloque {

    private $id;
    private $id_sinat;
    private $numero_pisos;
    private $codigo;
    private $codigo_acumulado;
    private $nombre;
    private $es_activo;
    private $est_poligono_id;
    private $db;
    private $conn;
    private $nombreTabla = 'est_bloque';
    private $nombreTablaForaneaPoligono = 'est_poligono';
    private $nombreTablaForaneaPiso = 'est_piso';
    private $claveCatastral;
    private $numeroBloque;

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

    public function listar() {
        $sql = 'SELECT id, nombre FROM ' . $this->nombreTabla;
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        return $cons->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerAreaPorBloque() {
        $this->codigo_acumulado = $this->claveCatastral . '00' . $this->numeroBloque;

        $sql = 'SELECT sum(pi.area) as area_total, blo.numero_pisos
        FROM ' . $this->nombreTabla . ' blo, 
        ' . $this->nombreTablaForaneaPoligono . ' pol, 
        ' . $this->nombreTablaForaneaPiso . ' pi
        WHERE blo.est_poligono_id = pol.id AND pi.est_bloque_id = blo.id
        AND blo.codigo_acumulado = ? GROUP BY blo.numero_pisos';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->codigo_acumulado);
        $cons->execute();
        return $cons->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function obtenerNumeroBloques() {
            $sql = "SELECT count(est_poligono_id) AS num_bloques FROM sch_catastro_urbano.est_bloque WHERE est_poligono_id = 
                    (SELECT id as est_poligono_id FROM sch_catastro_urbano.est_poligono WHERE codigo_acumulado = ?)";
            $consulta = $this->conn->prepare($sql);
            $consulta->bindParam(1, $this->claveCatastral);
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            if ($consulta->rowCount() > 0) {
                if (!empty($datos[0]['num_bloques'])) {
                    echo $datos[0]['num_bloques'];
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
    }

}
