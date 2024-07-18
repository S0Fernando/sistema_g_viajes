<?php
//registar turista
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtnombre"]) and !empty($_POST["txtapellido"]) and !empty($_POST["txtemail"]) and !empty($_POST["txttelefono"])) {
        $nombre = $_POST["txtnombre"];
        $apellido = $_POST["txtapellido"];
        $email = $_POST["txtemail"];
        $telefono = $_POST["txttelefono"];

        // validar que no exista un turista con el mismo email
        $validar = $conexion->query("SELECT * FROM turistas WHERE email='$email'");
        if ($validar->num_rows > 0) {
            echo '<div class="alert alert-danger">Ya existe un turista con ese email</div>';
        } else {
            $conexion->query("INSERT INTO turistas (nombre, apellido, email, telefono) VALUES ('$nombre', '$apellido', '$email', '$telefono')");
            echo '<div class="alert alert-success">Turista registrado correctamente</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Debe llenar todos los campos</div>';
    }

    // refrescar la url con js
    echo '<script>window.history.replaceState(null, null, window.location.pathname);</script>';
}
//eliminar turista
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $conexion->query("DELETE FROM turistas WHERE turista_id='$id'");
    echo '<div class="alert alert-success">Turista eliminado correctamente</div>';
    echo '<script>window.history.replaceState(null, null, window.location.pathname);</script>';

}
//modificar turista
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtid"]) and !empty($_POST["txtnombre"]) and !empty($_POST["txtapellido"]) and !empty($_POST["txtemail"]) and !empty($_POST["txttelefono"])) {
        $id = $_POST["txtid"];
        $nombre = $_POST["txtnombre"];
        $apellido = $_POST["txtapellido"];
        $email = $_POST["txtemail"];
        $telefono = $_POST["txttelefono"];

        // validar que no exista un turista con el mismo email, pero diferente id
        $validar = $conexion->query("SELECT * FROM turistas WHERE email='$email' AND turista_id!='$id'");
        if ($validar->num_rows > 0) {
            echo '<div class="alert alert-danger">Ya existe un turista con ese email</div>';
        } else {
            $conexion->query("UPDATE turistas SET nombre='$nombre', apellido='$apellido', email='$email', telefono='$telefono' WHERE turista_id='$id'");
            echo '<div class="alert alert-success">Turista modificado correctamente</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Debe llenar todos los campos</div>';
    }

    // refrescar la url con js
    echo '<script>window.history.replaceState(null, null, window.location.pathname);</script>';
}
?>
