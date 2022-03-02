<?php
$id = $nombre = $apellido = $curso = "";

if (isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if (isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];
if (isset($dataToView["data"]["apellido"])) $apellido = $dataToView["data"]["apellido"];
if (isset($dataToView["data"]["curso"])) $curso = $dataToView["data"]["curso"];

?>
<div class="row">
	<?php
	if (isset($_GET["response"]) and $_GET["response"] === true) {
	?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="index.php?controller=alumno&action=list">Volver al listado</a>
		</div>
	<?php
	}
	?>
	<form class="form" action="index.php?controller=alumno&action=save" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="form-group">
			<label>Nombre</label>
			<input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" />
		</div>
		<div class="form-group mb-2">
			<label>Apellidos</label>
			<input class="form-control" style="white-space: pre-wrap;" name="apellido" value="<?php echo $apellido; ?>" />
		</div>
		<div class="form-group mb-2">
			<label>Curso</label>
			<input class="form-control" style="white-space: pre-wrap;" name="curso" value="<?php echo $curso; ?>" />
		</div>
		<input type="submit" value="Guardar" class="btn btn-primary" />
		<a class="btn btn-outline-danger" href="index.php?controller=alumno&action=list">Cancelar</a>
	</form>
</div>