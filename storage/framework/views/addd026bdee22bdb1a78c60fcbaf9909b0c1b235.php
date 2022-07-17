<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Usuarios</title>
</head>
<body>
    <div class="row mt-5 justify-content-center">
        <div class="col-sm-3 align-self-center">
            <h2 class="text-center">FORMULARIO DE REGISTRO</h2>
            <form action="">
            <?php echo csrf_field(); ?>
                <input class="form-control form-control-sm" type="text" name="usuario"  placeholder="Usuario">
                <input class="form-control form-control-sm" type="text" name="password" placeholder="Contraseña">
                <input class="form-control form-control-sm" type="text" name="nombre" placeholder="Nombre">
                <input class="form-control form-control-sm" type="text" name="apellido" placeholder="Apellido">
                <input class="form-control form-control-sm" type="text" name="nacionalidad" placeholder="Nacionalidad">
                <input class="btn btn-primary form-control" type="submit" value="Registrarse">
            </form>
        </div>
    </div>
<script src="./app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Pruebas\backend\resources\views/Usuarios/UsuariosAlta.blade.php ENDPATH**/ ?>