<h2 class="text-center">Detalles de la Persona</h2>
<div class="table-responsive">
    <table class="table table-striped mx-auto" style="width: auto;">
        <tr>
            <th>ID</th>
            <td><?php echo $persona['id']; ?></td>
        </tr>
        <tr>
            <th>Nombres</th>
            <td><?php echo $persona['nombres']; ?></td>
        </tr>
        <tr>
            <th>Primer Apellido</th>
            <td><?php echo $persona['primer_apellido']; ?></td>
        </tr>
        <tr>
            <th>Segundo Apellido</th>
            <td><?php echo $persona['segundo_apellido']; ?></td>
        </tr>
        <tr>
            <th>Fecha de Nacimiento</th>
            <td><?php echo $persona['fecha_nacimiento']; ?></td>
        </tr>
        <tr>
            <th>Edad</th>
            <td><?php echo $persona['edad']; ?></td>
        </tr>
        <tr>
            <th>Sexo</th>
            <td><?php echo $persona['sexo']; ?></td>
        </tr>
        <tr>
            <th>Profesión</th>
            <td><?php echo $persona['profesion']; ?></td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td><?php echo $persona['direccion']; ?></td>
        </tr>
        <tr>
            <th>Código Postal</th>
            <td><?php echo $persona['codigo_postal']; ?></td>
        </tr>
        <tr>
            <th>Municipio</th>
            <td><?php echo $persona['municipio']; ?></td>
        </tr>
        <tr>
            <th>Estado</th>
            <td><?php echo $persona['estado']; ?></td>
        </tr>
        <tr>
            <th>Localidad</th>
            <td><?php echo $persona['localidad']; ?></td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td><?php echo $persona['telefono']; ?></td>
        </tr>
        <tr>
            <th>Foto de Perfil</th>
            <td><img src="<?php echo $persona['foto_perfil']; ?>" alt="Foto de Perfil" width="100"></td>
        </tr>
    </table>
</div>
