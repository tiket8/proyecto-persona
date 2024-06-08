<h2>Editar Persona</h2>
        <form action="/ProyectoPersona/index.php?action=updatePersona&id=<?php echo $persona['id']; ?>" method="POST" enctype="multipart/form-data" id="personaForm">
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" name="nombres" class="form-control" value="<?php echo htmlspecialchars($persona['nombres']); ?>" required>
            </div>
            <div class="form-group">
                <label for="primer_apellido">Primer Apellido</label>
                <input type="text" name="primer_apellido" class="form-control" value="<?php echo htmlspecialchars($persona['primer_apellido']); ?>" required>
            </div>
            <div class="form-group">
                <label for="segundo_apellido">Segundo Apellido</label>
                <input type="text" name="segundo_apellido" class="form-control" value="<?php echo htmlspecialchars($persona['segundo_apellido']); ?>" required>
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
                    <option value="hombre" <?php if ($persona['sexo'] == 'hombre') echo 'selected'; ?>>Hombre</option>
                    <option value="mujer" <?php if ($persona['sexo'] == 'mujer') echo 'selected'; ?>>Mujer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fk_profesion">Profesión</label>
                <select name="fk_profesion" class="form-control" required>
                    <?php foreach ($profesiones as $profesion): ?>
                        <option value="<?php echo $profesion['pk_profesion']; ?>" <?php if ($persona['fk_profesion'] == $profesion['pk_profesion']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($profesion['profesion']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="<?php echo htmlspecialchars($persona['direccion']); ?>" required>
            </div>
            <div class="form-group">
                <label for="codigo_postal">Código Postal</label>
                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="<?php echo htmlspecialchars($persona['codigo_postal']); ?>" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo htmlspecialchars($persona['estado']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="municipio">Municipio</label>
                <input type="text" class="form-control" id="municipio" name="municipio" value="<?php echo htmlspecialchars($persona['municipio']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="localidad">Localidad</label>
                <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo htmlspecialchars($persona['localidad']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo htmlspecialchars($persona['telefono']); ?>" required>
            </div>
            <div class="form-group">
                <label for="foto_perfil">Foto de Perfil</label>
                <input type="file" name="foto_perfil" class="form-control-file">
                <input type="hidden" name="foto_perfil_actual" value="<?php echo htmlspecialchars($persona['foto_perfil']); ?>">
                <img src="<?php echo htmlspecialchars($persona['foto_perfil']); ?>" alt="Foto de Perfil" width="100">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    
    <script>
        document.getElementById('fecha_nacimiento').addEventListener('change', function() {
            const birthDate = new Date(this.value);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById('edad').value = age;
        });

        document.getElementById('codigo_postal').addEventListener('change', function() {
            const codigoPostal = this.value.trim();
            if (codigoPostal.length === 5) {
                fetch(`/ProyectoPersona/index.php?action=getLocation&codigo_postal=${codigoPostal}`)
                    .then(response => response.text()) // Obtener la respuesta como texto
                    .then(text => {
                        try {
                            const data = JSON.parse(text); // Parsear el JSON del texto
                            if (data.error) {
                                console.error(data.error);
                                alert(data.error); // Mostrar un mensaje de error al usuario
                            } else {
                                document.getElementById('municipio').value = data.municipio;
                                document.getElementById('estado').value = data.estado;
                                document.getElementById('localidad').value = data.localidad;
                            }
                        } catch (error) {
                            console.error('Error parsing JSON:', error);
                            console.error('Server response:', text);
                            alert('Error al procesar la respuesta del servidor.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error al obtener datos de ubicación.');
                    });
            }
        });
    </script>

