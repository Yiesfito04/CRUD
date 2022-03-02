<?php 

class Alumno {

	private $table = 'alumnos';
	private $conection;

	public function __construct() {
		
	}

	/* Set conection */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* Get all notes */
	public function getAlumnos(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get note by id */
	public function getAlumnoById($id){
		if(is_null($id)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$id]);

		return $stmt->fetch();
	}

	/* Save note */
	public function save($param){
		$this->getConection();

		/* Set default values */
		$title = $content = "";

		/* Check if exists */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !=''){
			$actualNote = $this->getAlumnoById($param["id"]);
			if(isset($actualNote["id"])){
				$exists = true;	
				/* Actual values */
				$id = $param["id"];
				$nombre = $actualNote["nombre"];
				$apellido = $actualNote["apellido"];
				$curso = $actualNote["curso"];
			}
		}

		/* Received values */
		if(isset($param["nombre"])) $nombre = $param["nombre"];
		if(isset($param["apellido"])) $apellido = $param["apellido"];
		if(isset($param["curso"])) $curso = $param["curso"];

		/* Database operations */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET nombre=?, apellido=?, curso=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$nombre, $apellido, $curso, $id]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (nombre, apellido, curso) values(?, ?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$nombre, $apellido, $curso]);
			$id = $this->conection->lastInsertId();
		}	

		return $id;	

	}

	/* Delete note by id */
	public function deleteAlumnoById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>