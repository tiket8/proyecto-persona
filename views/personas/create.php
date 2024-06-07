<?php
require_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM profesion";
$stmt = $db->prepare($query);
$stmt->execute();
$profesiones = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Agregar Persona</h2>
<form action="/ProyectoPersona/index.php?action=create" method="POST" enctype="multipart/form-data" id="personaForm">
    <div class="form-group">
        <label for="nombres">Nombres</label>
        <input type="text" name="nombres" class="form-control" placeholder="Nombres" required>
    </div>
    <div class="form-group">
        <label for="primer_apellido">Primer Apellido</label>
        <input type="text" name="primer_apellido" class="form-control" placeholder="Primer Apellido" required>
    </div>
    <div class="form-group">
        <label for="segundo_apellido">Segundo Apellido</label>
        <input type="text" name="segundo_apellido" class="form-control" placeholder="Segundo Apellido" required>
    </div>
    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" required>
    </div>
    <div class="form-group">
        <label for="edad">Edad</label>
        <input type="number" name="edad" class="form-control" id="edad" readonly required>
    </div>
    <div class="form-group">
        <label for="sexo">Sexo</label>
        <select name="sexo" class="form-control" required>
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
        </select>
    </div>
    <div class="form-group">
        <label for="fk_profesion">Profesión</label>
        <select name="fk_profesion" class="form-control" required>
            <?php foreach ($profesiones as $profesion): ?>
                <option value="<?php echo $profesion['pk_profesion']; ?>"><?php echo $profesion['profesion']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" class="form-control" placeholder="Dirección" required>
    </div>
    <div class="form-group">
        <label for="codigo_postal">Código Postal</label>
        <input type="text" name="codigo_postal" class="form-control" id="codigo_postal" placeholder="Código Postal" required>
    </div>
    <div class="form-group">
        <label for="municipio">Municipio</label>
        <input type="text" name="municipio" class="form-control" id="municipio" readonly required>
    </div>
    <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" name="estado" class="form-control" id="estado" readonly required>
    </div>
    <div class="form-group">
        <label for="localidad">Localidad</label>
        <input type="text" name="localidad" class="form-control" id="localidad" readonly required>
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" class="form-control" placeholder="Teléfono" required>
    </div>
    <div class="form-group">
        <label for="foto_perfil">Foto de Perfil</label>
        <input type="file" name="foto_perfil" class="form-control-file">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

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
        const codigoPostal = this.value;
        if (codigoPostal.length === 5) {
            fetch(`/ProyectoPersona/index.php?action=getLocation&codigo_postal=${codigoPostal}`)
                .then(response => response.text()) // Get the response as text
                .then(text => {
                    try {
                        const data = JSON.parse(text); // Parse the JSON from the text
                        if (data.error) {
                            console.error(data.error);
                            alert(data.error); // Show an error message to the user
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
