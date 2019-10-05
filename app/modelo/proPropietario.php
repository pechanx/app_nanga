<?php

class proPropietario {

    private $id;
    private $id_sinat;
    private $per_persona_id;
    private $per_direccion_id;
    private $tiene_titulo;
    private $numero;
    private $representante;
    private $porcentaje_copropiedad;
    private $pro_forma_adquisicion_id;
    private $esc_protocolizacion_id;
    private $sin_perfeccionar;
    private $esc_inscripcion_id;
    private $estado_civil_compra;
    private $con_persona_id;
    private $pro_tipo_poseedor_id;
    private $anio_posesion;
    private $descripcion;
    private $pre_predio_id;
    private $precio_compra_comercial;
    private $pro_pueblo_etnia_id;
    private $db;
    private $conn;
    private $nombreTabla = 'pro_propietario';

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
        $sql = "INSERT INTO pro_propietario "
                . "(per_persona_id, per_direccion_id, tiene_titulo, numero, "
                . "representante, porcentaje_copropiedad, pro_forma_adquisicion_id, "
                . "esc_protocolizacion_id,  sin_perfeccionar, esc_inscripcion_id, "
                . "estado_civil_compra, con_persona_id, pro_tipo_poseedor_id, "
                . "anio_posesion, descripcion, pre_predio_id, precio_compra_comercial, pro_pueblo_etnia_id) "
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->per_persona_id);
        $cons->bindParam(2, $this->per_direccion_id);
        $cons->bindParam(3, $this->tiene_titulo);
        $cons->bindParam(4, $this->numero);
        $cons->bindParam(5, $this->representante);
        $cons->bindParam(6, $this->porcentaje_copropiedad);
        $cons->bindParam(7, $this->pro_forma_adquisicion_id);
        $cons->bindParam(8, $this->esc_protocolizacion_id);
        $cons->bindParam(9, $this->sin_perfeccionar);
        $cons->bindParam(10, $this->esc_inscripcion_id);
        $cons->bindParam(11, $this->estado_civil_compra);
        $cons->bindParam(12, $this->con_persona_id);
        $cons->bindParam(13, $this->pro_tipo_poseedor_id);
        $cons->bindParam(14, $this->anio_posesion);
        $cons->bindParam(15, $this->descripcion);
        $cons->bindParam(16, $this->pre_predio_id);
        $cons->bindParam(17, $this->precio_compra_comercial);
        $cons->bindParam(18, $this->pro_pueblo_etnia_id);

        if ($cons->execute()) {
            return $id = $this->db->obtenerId('pro_propietario');
        } else {
            $detalle_error = array(
                'tabla' => 'pro_propietario',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

}
