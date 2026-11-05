<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM usuarios WHERE id=$id");
    $usuario = $result->fetch_assoc();
}

// ACTUALIZAR (Update)
if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE usuarios SET nombre='$nombre', email='$email', telefono='$telefono' WHERE id=$id";
    $conn->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="col-md-5 mx-auto">
        <div class="card card-body">
            <h4>Actualizar Usuario</h4>
            <form action="editar.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $usuario['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="<?php echo $usuario['telefono']; ?>" required>
                </div>
                <button type="submit" name="actualizar" class="btn btn-primary w-100">Actualizar (Update)</button>
                <a href="index.php" class="btn btn-secondary w-100 mt-2">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>
