
<?php
echo '<pre>';
print_r($profesiones);
echo '</pre>';
?>
<h2 class="text-center">Listado de Profesiones</h2>
<a href="/ProyectoPersona/index.php?action=createProfesion" class="btn btn-primary mb-3">Agregar Profesión</a>
<div class="table-responsive">
    <table class="table table-striped mx-auto" style="width: auto;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Profesión</th>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
              <?php if (isset($profesiones) && !empty($profesiones)): ?>
                <?php foreach ($profesiones as $profesion): ?>
                    <tr>
                        <td><?php echo $profesion['pk_profesion']; ?></td>
                        <td><?php echo $profesion['profesion']; ?></td>
                        <td><?php echo $profesion['hora']; ?></td>
                        <td><?php echo $profesion['fecha']; ?></td>
                        <td>
                            <a href="/ProyectoPersona/index.php?action=softDelete&id=<?php echo $profesion['pk_profesion']; ?>" class="btn btn-danger btn-eliminar">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No hay profesiones disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

