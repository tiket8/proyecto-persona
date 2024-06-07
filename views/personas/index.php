<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Personas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
    <h2>Listado de Personas</h2>
<a href="/ProyectoPersona/index.php?action=create" class="btn btn-primary mb-3">Agregar Persona</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Fecha Nacimiento</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Profesión</th>
            <th>Dirección</th>
            <th>Código Postal</th>
            <th>Municipio</th>
            <th>Estado</th>
            <th>Localidad</th>
            <th>Teléfono</th>
            <th>Foto de Perfil</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($personas as $persona): ?>
            <tr>
                <td><?php echo $persona['id']; ?></td>
                <td><?php echo $persona['nombres']; ?></td>
                <td><?php echo $persona['primer_apellido']; ?></td>
                <td><?php echo $persona['segundo_apellido']; ?></td>
                <td><?php echo $persona['fecha_nacimiento']; ?></td>
                <td><?php echo $persona['edad']; ?></td>
                <td><?php echo $persona['sexo']; ?></td>
                <td><?php echo $persona['fk_profesion']; ?></td>
                <td><?php echo $persona['direccion']; ?></td>
                <td><?php echo $persona['codigo_postal']; ?></td>
                <td><?php echo $persona['municipio']; ?></td>
                <td><?php echo $persona['estado']; ?></td>
                <td><?php echo $persona['localidad']; ?></td>
                <td><?php echo $persona['telefono']; ?></td>
                <td>
                    <img src="<?php echo $persona['foto_perfil']; ?>" alt="Foto de Perfil" width="50">
                </td>
                <td>
                    <a href="/ProyectoPersona/index.php?action=readOne&id=<?php echo $persona['id']; ?>" class="btn btn-info">Ver</a>
                    <a href="/ProyectoPersona/index.php?action=update&id=<?php echo $persona['id']; ?>" class="btn btn-warning">Editar</a>                    
                    <a href="/ProyectoPersona/index.php?action=delete&id=<?php echo $persona['id']; ?>" class="btn btn-danger btn-eliminar">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>
</body>
</html>
