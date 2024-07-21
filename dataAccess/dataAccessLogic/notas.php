<?php
class Notas {
    private $connectionDB;
    private $id;
    private $nombre_estudiante;
    private $nota_materia_1;
    private $nota_materia_2;
    private $nota_materia_3;
    private $nota_materia_4;
    private $nota_materia_5;
    private $promedio;

    public function __construct($connectionDB) {
        $this->connectionDB = $connectionDB->conectar();
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNombreEstudiante($nombre_estudiante) {
        $this->nombre_estudiante = $nombre_estudiante;
    }

    public function getNombreEstudiante() {
        return $this->nombre_estudiante;
    }

    public function setNotaMateria1($nota_materia_1) {
        $this->nota_materia_1 = $nota_materia_1;
    }

    public function getNotaMateria1() {
        return $this->nota_materia_1;
    }

    public function setNotaMateria2($nota_materia_2) {
        $this->nota_materia_2 = $nota_materia_2;
    }

    public function getNotaMateria2() {
        return $this->nota_materia_2;
    }

    public function setNotaMateria3($nota_materia_3) {
        $this->nota_materia_3 = $nota_materia_3;
    }

    public function getNotaMateria3() {
        return $this->nota_materia_3;
    }

    public function setNotaMateria4($nota_materia_4) {
        $this->nota_materia_4 = $nota_materia_4;
    }

    public function getNotaMateria4() {
        return $this->nota_materia_4;
    }

    public function setNotaMateria5($nota_materia_5) {
        $this->nota_materia_5 = $nota_materia_5;
    }

    public function getNotaMateria5() {
        return $this->nota_materia_5;
    }

    public function calculatePromedio() {
        $this->promedio = ($this->nota_materia_1 + $this->nota_materia_2 + $this->nota_materia_3 + $this->nota_materia_4 + $this->nota_materia_5) / 5;
    }

    public function getPromedio() {
        return $this->promedio;
    }

    public function addNota(): bool {
        try {
            $this->calculatePromedio();
            $sql = "INSERT INTO sistema (nombre_estudiante, nota_materia_1, nota_materia_2, nota_materia_3, nota_materia_4, nota_materia_5, promedio) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getNombreEstudiante(), $this->getNotaMateria1(), $this->getNotaMateria2(), $this->getNotaMateria3(), $this->getNotaMateria4(), $this->getNotaMateria5(), $this->getPromedio()));
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function readNotas(): array {
        try {
            $sql = "SELECT * FROM sistema";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public function readNotaById($id): array {
        try {
            $sql = "SELECT * FROM sistema WHERE id = ?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($id));
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public function updateNota(): bool {
        try {
            $this->calculatePromedio();
            $sql = "UPDATE sistema SET nombre_estudiante = ?, nota_materia_1 = ?, nota_materia_2 = ?, nota_materia_3 = ?, nota_materia_4 = ?, nota_materia_5 = ?, promedio = ? WHERE id = ?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getNombreEstudiante(), $this->getNotaMateria1(), $this->getNotaMateria2(), $this->getNotaMateria3(), $this->getNotaMateria4(), $this->getNotaMateria5(), $this->getPromedio(), $this->getId()));
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteNota(): bool {
        try {
            $sql = "DELETE FROM sistema WHERE id = ?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getId()));
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>
