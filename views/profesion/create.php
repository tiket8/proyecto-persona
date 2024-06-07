<h2>Agregar Profesión</h2>
<form action="/ProyectoPersona/index.php?action=saveProfesion" method="POST">
    <div class="form-group">
        <label for="profesion">Profesión</label>
        <input type="text" name="profesion" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="hora">Hora</label>
        <input type="time" name="hora" class="form-control" id="hora" required>
    </div>
    <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" class="form-control" id="fecha" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Obtener la fecha y hora actuales
    const now = new Date();
    
    // Formatear la fecha como YYYY-MM-DD
    const year = now.getFullYear();
    const month = ('0' + (now.getMonth() + 1)).slice(-2);
    const day = ('0' + now.getDate()).slice(-2);
    const formattedDate = `${year}-${month}-${day}`;

    // Formatear la hora como HH:MM
    const hours = ('0' + now.getHours()).slice(-2);
    const minutes = ('0' + now.getMinutes()).slice(-2);
    const formattedTime = `${hours}:${minutes}`;

    // Establecer los valores en los campos del formulario
    document.getElementById('fecha').value = formattedDate;
    document.getElementById('hora').value = formattedTime;
});
</script>
