<?php 

require_once 'model/alumno.php';

class alumnoController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->view = 'list';
		$this->page_title = '';
		$this->alumnoObj = new Alumno();
	}

	/* List all notes */
	public function list(){
		$this->page_title = 'Listado de Alumnos';
		return $this->alumnoObj->getAlumnos();
	}

	/* Load note for edit */
	public function edit($id = null){
		$this->page_title = 'Crear Alumno';
		$this->view = 'edit';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this->alumnoObj->getAlumnoById($id);
	}

	/* Create or update note */
	public function save(){
		$this->view = 'edit';
		$this->page_title = 'Editar Alumno';
		$id = $this->alumnoObj->save($_POST);
		$result = $this->alumnoObj->getAlumnoById($id);
		$_GET["response"] = true;
		return $result;
	}

	/* Confirm to delete */
	public function confirmDelete(){
		$this->page_title = 'Eliminar Alumno';
		$this->view = 'confirm_delete';
		return $this->alumnoObj->getAlumnoById($_GET["id"]);
	}

	/* Delete */
	public function delete(){
		$this->page_title = 'Listado de Alumnos';
		$this->view = 'delete';
		return $this->alumnoObj->deleteAlumnoById($_POST["id"]);
	}

}

?>