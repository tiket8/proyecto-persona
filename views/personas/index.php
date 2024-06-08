<div class="container mt-5">
        <h2 class="text-center">Listado de Personas</h2>
        <a href="/ProyectoPersona/index.php?action=create" class="btn btn-primary mb-3">Agregar Persona</a>
        <a href="/ProyectoPersona/index.php?action=readProfesion" class="btn btn-secondary mb-3">Gestionar Profesiones</a>
        <div class="row">
            <?php foreach ($personas as $persona): ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <strong>ID:</strong> <?php echo $persona['id']; ?>
                        </div>
                        <div class="card-body">
                            <p><strong>Nombres:</strong> <?php echo $persona['nombres']; ?></p>
                            <p><strong>Primer Apellido:</strong> <?php echo $persona['primer_apellido']; ?></p>
                            <p><strong>Segundo Apellido:</strong> <?php echo $persona['segundo_apellido']; ?></p>
                            <p><strong>Fecha Nacimiento:</strong> <?php echo $persona['fecha_nacimiento']; ?></p>
                            <p><strong>Edad:</strong> <?php echo $persona['edad']; ?></p>
                            <p><strong>Sexo:</strong> <?php echo $persona['sexo']; ?></p>
                            <p><strong>Profesión:</strong> <?php echo $persona['fk_profesion']; ?></p>
                            <p><strong>Dirección:</strong> <?php echo $persona['direccion']; ?></p>
                            <p><strong>Código Postal:</strong> <?php echo $persona['codigo_postal']; ?></p>
                            <p><strong>Municipio:</strong> <?php echo $persona['municipio']; ?></p>
                            <p><strong>Estado:</strong> <?php echo $persona['estado']; ?></p>
                            <p><strong>Localidad:</strong> <?php echo $persona['localidad']; ?></p>
                            <p><strong>Teléfono:</strong> <?php echo $persona['telefono']; ?></p>
                            <p><strong>Foto de Perfil:</strong> <img src="<?php echo $persona['foto_perfil']; ?>" alt="Foto de Perfil" width="50"></p>
                            <div class="d-flex">
                                <a href="/ProyectoPersona/index.php?action=readOne&id=<?php echo $persona['id']; ?>" class="btn btn-info me-2" target="_blank">Ver</a>
                                <a href="/ProyectoPersona/index.php?action=update&id=<?php echo $persona['id']; ?>" class="btn btn-warning me-2">Editar</a>
                                <a href="/ProyectoPersona/index.php?action=delete&id=<?php echo $persona['id']; ?>" class="btn btn-danger btn-eliminar">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
