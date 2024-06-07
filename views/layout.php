<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Persona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php 
        if (isset($view) && !empty($view)) {
            include($view);
        } else {
            echo "Vista no definida.";
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const eliminarButtons = document.querySelectorAll('.btn-eliminar');
            eliminarButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    if (confirm('¿Seguro que quieres eliminar?')) {
                        if (confirm('¿Seguro segurisimo que quieres eliminar?')) {
                            window.location.href = this.href;
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>