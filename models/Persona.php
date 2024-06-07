<?php
class Persona {
    private $conn;
    private $table_name = "persona";

    public $id;
    public $nombres;
    public $primer_apellido;
    public $segundo_apellido;
    public $fecha_nacimiento;
    public $edad;
    public $sexo;
    public $fk_profesion;
    public $direccion;
    public $codigo_postal;
    public $municipio;
    public $estado;
    public $localidad;
    public $telefono;
    public $foto_perfil;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
            (nombres, primer_apellido, segundo_apellido, fecha_nacimiento, edad, sexo, fk_profesion, direccion, codigo_postal, municipio, estado, localidad, telefono, foto_perfil)
            VALUES 
            (:nombres, :primer_apellido, :segundo_apellido, :fecha_nacimiento, :edad, :sexo, :fk_profesion, :direccion, :codigo_postal, :municipio, :estado, :localidad, :telefono, :foto_perfil)";
    
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':nombres', $this->nombres);
        $stmt->bindParam(':primer_apellido', $this->primer_apellido);
        $stmt->bindParam(':segundo_apellido', $this->segundo_apellido);
        $stmt->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);
        $stmt->bindParam(':edad', $this->edad);
        $stmt->bindParam(':sexo', $this->sexo);
        $stmt->bindParam(':fk_profesion', $this->fk_profesion);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':codigo_postal', $this->codigo_postal);
        $stmt->bindParam(':municipio', $this->municipio);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':localidad', $this->localidad);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':foto_perfil', $this->foto_perfil);
    
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }
    
    

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " 
            SET
                nombres = :nombres,
                primer_apellido = :primer_apellido,
                segundo_apellido = :segundo_apellido,
                fecha_nacimiento = :fecha_nacimiento,
                edad = :edad,
                sexo = :sexo,
                fk_profesion = :fk_profesion,
                direccion = :direccion,
                codigo_postal = :codigo_postal,
                municipio = :municipio,
                estado = :estado,
                localidad = :localidad,
                telefono = :telefono,
                foto_perfil = :foto_perfil
            WHERE
                id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombres', $this->nombres);
        $stmt->bindParam(':primer_apellido', $this->primer_apellido);
        $stmt->bindParam(':segundo_apellido', $this->segundo_apellido);
        $stmt->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);
        $stmt->bindParam(':edad', $this->edad);
        $stmt->bindParam(':sexo', $this->sexo);
        $stmt->bindParam(':fk_profesion', $this->fk_profesion);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':codigo_postal', $this->codigo_postal);
        $stmt->bindParam(':municipio', $this->municipio);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':localidad', $this->localidad);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':foto_perfil', $this->foto_perfil);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
