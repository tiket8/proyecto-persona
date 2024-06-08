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

    public function readOne($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->id = $row['id'];
            $this->nombres = $row['nombres'];
            $this->primer_apellido = $row['primer_apellido'];
            $this->segundo_apellido = $row['segundo_apellido'];
            $this->fecha_nacimiento = $row['fecha_nacimiento'];
            $this->edad = $row['edad'];
            $this->sexo = $row['sexo'];
            $this->fk_profesion = $row['fk_profesion'];
            $this->direccion = $row['direccion'];
            $this->codigo_postal = $row['codigo_postal'];
            $this->estado = $row['estado'];
            $this->municipio = $row['municipio'];
            $this->localidad = $row['localidad'];
            $this->telefono = $row['telefono'];
            $this->foto_perfil = $row['foto_perfil'];
        }

        return $row;
    }
    
    

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET
            nombres = :nombres,
            primer_apellido = :primer_apellido,
            segundo_apellido = :segundo_apellido,
            fecha_nacimiento = :fecha_nacimiento,
            edad = :edad,
            sexo = :sexo,
            fk_profesion = :fk_profesion,
            direccion = :direccion,
            codigo_postal = :codigo_postal,
            estado = :estado,
            municipio = :municipio,
            localidad = :localidad,
            telefono = :telefono,
            foto_perfil = :foto_perfil
            WHERE id = :id";

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
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':municipio', $this->municipio);
        $stmt->bindParam(':localidad', $this->localidad);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':foto_perfil', $this->foto_perfil);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }



    public function getProfesiones() {
        $query = "SELECT * FROM profesion WHERE estado = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
