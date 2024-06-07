<h2>Editar Persona</h2>
<form action="/ProyectoPersona/index.php?action=update&id=<?php echo $persona['id']; ?>" method="POST" enctype="multipart/form-data" id="personaForm">
    <div class="form-group">
        <label for="nombres">Nombres</label>
        <input type="text" name="nombres" class="form-control" value="<?php echo $persona['nombres']; ?>" required>
    </div>
    <div class="form-group">
        <label for="primer_apellido">Primer Apellido</label>
        <input type="text" name="primer_apellido" class="form-control" value="<?php echo $persona['primer_apellido']; ?>" required>
    </div>
    <div class="form-group">
        <label for="segundo_apellido">Segundo Apellido</label>
        <input type="text" name="segundo_apellido" class="form-control" value="<?php echo $persona['segundo_apellido']; ?>" required>
    </div>
    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" value="<?php echo $persona['fecha_nacimiento']; ?>" required>
    </div>
    <div class="form-group">
        <label for="edad">Edad</label>
        <input type="number" name="edad" class="form-control" id="edad" value="<?php echo $persona['edad']; ?>" readonly required>
    </div>
    <div class="form-group">
        <label for="sexo">Sexo</label>
        <select name="sexo" class="form-control" required>
            <option value="hombre" <?php echo ($persona['sexo'] == 'hombre') ? 'selected' : ''; ?>>Hombre</option>
            <option value="mujer" <?php echo ($persona['sexo'] == 'mujer') ? 'selected' : ''; ?>>Mujer</option>
        </select>
    </div>
    <div class="form-group">
        <label for="fk_profesion">Profesión</label>
        <select name="fk_profesion" class="form-control" required>
            <?php foreach ($profesiones as $profesion): ?>
                <option value="<?php echo $profesion['pk_profesion']; ?>" <?php echo ($profesion['pk_profesion'] == $persona['fk_profesion']) ? 'selected' : ''; ?>>
                    <?php echo $profesion['profesion']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" class="form-control" value="<?php echo $persona['direccion']; ?>" required>
    </div>
    <div class="form-group">
        <label for="codigo_postal">Código Postal</label>
        <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="<?php echo $persona['codigo_postal']; ?>" required>
    </div>
    <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $persona['estado']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="municipio">Municipio</label>
        <input type="text" class="form-control" id="municipio" name="municipio" value="<?php echo $persona['municipio']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="localidad">Localidad</label>
        <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo $persona['localidad']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="<?php echo $persona['telefono']; ?>" required>
    </div>
    <div class="form-group">
        <label for="foto_perfil">Foto de Perfil</label>
        <input type="file" name="foto_perfil" class="form-control-file">
        <input type="hidden" name="foto_perfil_actual" value="<?php echo $persona['foto_perfil']; ?>">
        <img src="<?php echo $persona['foto_perfil']; ?>" alt="Foto de Perfil" width="100">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
