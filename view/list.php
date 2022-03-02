<div class="row">
	<div class="col-md-12 text-right">
		<a href="index.php?controller=alumno&action=edit" class="btn btn-outline-primary">Crear Alumno</a>
		<hr />
	</div>
	<table class="table table-bordered mt-4">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nombres</th>
				<th scope="col">Apellidos</th>
				<th scope="col">Curso</th>
			</tr>
		</thead>
		<?php
		if (count($dataToView["data"]) > 0) {
			foreach ($dataToView["data"] as $alumno) {
		?>
				<tr>
					<td><?php echo $alumno['id']; ?></td>
					<td><?php echo $alumno['nombre']; ?></td>
					<td><?php echo $alumno['apellido']; ?></td>
					<td><?php echo nl2br($alumno['curso']); ?></td>
					<td><a href="index.php?controller=alumno&action=edit&id=<?php echo $alumno['id']; ?>" class="btn btn-primary">Editar</a></td>
					<td><a href="index.php?controller=alumno&action=confirmDelete&id=<?php echo $alumno['id']; ?>" class="btn btn-danger">Eliminar</a></td>
				</tr>
			<?php
			}
		} else {
			?>
			<div class="alert alert-info">
				Actualmente no existen Alumnos.
			</div>
		<?php
		}
		?>

	</table>
</div>