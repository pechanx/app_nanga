<?php

class perPersona {

    private $id;
    private $id_sinat;
    private $tipo_identificacion;
    private $numero_identificacion;
    private $personeria;
    private $dominio;
    private $nombres;
    private $apellidos;
    private $razon_social;
    private $estado_civil;
    private $fecha_nacimiento;
    private $carnet_discapacidad;
    private $porcentaje_discapacidad;
    private $tipo_discapacidad;
    private $descripcion;
    private $es_validado;
    private $es_activo;
    private $rep_per_persona_id;
    private $fecha_defuncion;
    private $db;
    private $conn;
    private $nombreTabla = 'per_persona';

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
        $sql = 'SELECT * FROM ' . $this->nombreTabla;
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        $perPersona = $cons->fetchAll(PDO::FETCH_ASSOC);
        return $perPersona;
    }

    public function guardar() {
        $sql = 'INSERT INTO ' . $this->nombreTabla . '(tipo_identificacion, numero_identificacion, personeria, dominio, nombres, apellidos, razon_social, estado_civil, fecha_nacimiento, carnet_discapacidad , porcentaje_discapacidad , tipo_discapacidad, descripcion, es_validado, es_activo, rep_per_persona_id, fecha_defuncion) '
                . 'VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->tipo_identificacion);
        $cons->bindParam(2, $this->numero_identificacion);
        $cons->bindParam(3, $this->personeria);
        $cons->bindParam(4, $this->dominio);
        $cons->bindParam(5, $this->nombres);
        $cons->bindParam(6, $this->apellidos);
        $cons->bindParam(7, $this->razon_social);
        $cons->bindParam(8, $this->estado_civil);
        $cons->bindParam(9, $this->fecha_nacimiento);
        $cons->bindParam(10, $this->carnet_discapacidad);
        $cons->bindParam(11, $this->porcentaje_discapacidad);
        $cons->bindParam(12, $this->tipo_discapacidad);
        $cons->bindParam(13, $this->descripcion);
        $cons->bindParam(14, $this->es_validado);
        $cons->bindParam(15, $this->es_activo);
        $cons->bindParam(16, $this->rep_per_persona_id);
        $cons->bindParam(17, $this->fecha_defuncion);

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

    public function actualizar() {
        $sql = 'UPDATE ' . $this->nombreTabla . ' SET '
                . 'tipo_identificacion = ?, '
                . 'numero_identificacion = ?, '
                . 'personeria = ?, '
                . 'dominio = ?, '
                . 'nombres = ?, '
                . 'apellidos = ?, '
                . 'razon_social = ?, '
                . 'estado_civil = ?, '
                . 'fecha_nacimiento = ?, '
                . 'carnet_discapacidad = ? , '
                . 'porcentaje_discapacidad = ? , '
                . 'tipo_discapacidad = ?, '
                . 'descripcion = ?, '
                . 'es_validado = ?, '
                . 'es_activo = ?, '
                . 'rep_per_persona_id = ?, '
                . 'fecha_defuncion = ? '
                . 'WHERE id = ? ';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->tipo_identificacion);
        $cons->bindParam(2, $this->numero_identificacion);
        $cons->bindParam(3, $this->personeria);
        $cons->bindParam(4, $this->dominio);
        $cons->bindParam(5, $this->nombres);
        $cons->bindParam(6, $this->apellidos);
        $cons->bindParam(7, $this->razon_social);
        $cons->bindParam(8, $this->estado_civil);
        $cons->bindParam(9, $this->fecha_nacimiento);
        $cons->bindParam(10, $this->carnet_discapacidad);
        $cons->bindParam(11, $this->porcentaje_discapacidad);
        $cons->bindParam(12, $this->tipo_discapacidad);
        $cons->bindParam(13, $this->descripcion);
        $cons->bindParam(14, $this->es_validado);
        $cons->bindParam(15, $this->es_activo);
        $cons->bindParam(16, $this->rep_per_persona_id);
        $cons->bindParam(17, $this->fecha_defuncion);
        $cons->bindParam(18, $this->id);

        if ($cons->execute()) {
            return $this->id;
        } else {
            $detalle_error = array(
                'tabla' => 'per_persona',
                'error' => $cons->errorInfo()
            );
            print_r($detalle_error);
            return 0;
        }
    }

    public function obtenerPersonaPorIdentificacion() {
        $sql = 'SELECT * FROM ' . $this->nombreTabla . ' WHERE numero_identificacion = ? ';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->numero_identificacion);
        $cons->execute();
        $persona = $cons->fetchAll(PDO::FETCH_ASSOC);
        return $persona;
    }

    function validarPersonaCreada() {
        $sql = 'SELECT id FROM ' . $this->nombreTabla . ' WHERE numero_identificacion = ? ';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->numero_identificacion);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        if ($cons->rowCount() > 0) {
            return $datos[0]['id'];
        } else {
            return 0;
        }
    }

    function listarResponsablesRelevadores() {
        $sql = 'SELECT * FROM ' . $this->nombreTabla . ' WHERE descripcion = ?';
        $cons = $this->conn->prepare($sql);
        $cons->bindParam(1, $this->descripcion);
        $cons->execute();
        return $cons->fetchAll(PDO::FETCH_ASSOC);
    }

}
