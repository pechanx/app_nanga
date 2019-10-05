<?php

class genServicioBasicoDet {

    private $id;
    private $gen_servicio_basico_id;
    private $id_sinat;
    private $es_activo;
    private $gen_tipo_servicio_id;
    private $db;
    private $conn;
    private $nombreTabla = 'gen_servicio_basico_det';
    private $nombreTablaForanea = 'gen_servicio_basico';
    private $nombreTablaForanea2 = 'gen_tipo_servicio';
    private $tipoServicioBasicoId;
    private $servicioBasicoId;

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

    function listarPorServicioBasico() {
        $sql = 'SELECT tipo.id, tipo.nombre, det.id as gen_servicio_basico_det_id
            FROM
            ' . $this->nombreTablaForanea . ' ser,
            ' . $this->nombreTablaForanea2 . ' tipo,
            ' . $this->nombreTabla . ' det
            WHERE det.gen_servicio_basico_id = ser.id AND
            det.gen_tipo_servicio_id = tipo.id AND
            det.gen_servicio_basico_id = ?
            ORDER BY id ASC';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->gen_servicio_basico_id);
        $cons->execute();
        return $cons->fetchAll(PDO::FETCH_ASSOC);
    }

    public function retornarId() {
        $sql = 'SELECT det.id 
                        FROM 
                        ' . $this->nombreTablaForanea . ' ser, 
                        ' . $this->nombreTablaForanea2 . ' tipo, 
                        ' . $this->nombreTabla . ' det
                        WHERE det.gen_servicio_basico_id = ser.id AND
                        det.gen_tipo_servicio_id = tipo.id AND
                        det.gen_tipo_servicio_id = ? AND 
                        det.gen_servicio_basico_id = ?';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->tipoServicioBasicoId);
        $cons->bindParam(2, $this->servicioBasicoId);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        if ($cons->rowCount() > 0) {
            return $datos[0]['id'];
        } else {
            return 0;
        }
    }

}
