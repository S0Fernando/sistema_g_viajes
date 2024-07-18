<?php
//registrar reserva
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtdestino_id"]) and !empty($_POST["txtturista_id"]) and !empty($_POST["txtfecha_reserva"])) {
        $destino_id = $_POST["txtdestino_id"];
        $turista_id = $_POST["txtturista_id"];
        $fecha_reserva = $_POST["txtfecha_reserva"];

        // Validar que no exista una reserva duplicada para el mismo turista y destino en la misma fecha
        $validar = $conexion->query("SELECT * FROM reservas WHERE destino_id='$destino_id' AND turista_id='$turista_id' AND fecha_reserva='$fecha_reserva'");
        if ($validar->num_rows > 0) {
            echo '<div class="alert alert-danger">Ya existe una reserva para este turista en este destino y fecha</div>';
        } else {
            $conexion->query("INSERT INTO reservas (destino_id, turista_id, fecha_reserva) VALUES ('$destino_id', '$turista_id', '$fecha_reserva')");
            echo '<div class="alert alert-success">Reserva registrada correctamente</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Debe llenar todos los campos</div>';
    }

    // Refrescar la url con js
    echo '<script>window.history.replaceState(null, null, window.location.pathname);</script>';
}
//modificar reserva
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtid"]) and !empty($_POST["txtdestino_id"]) and !empty($_POST["txtturista_id"]) and !empty($_POST["txtfecha_reserva"])) {
        $id = $_POST["txtid"];
        $destino_id = $_POST["txtdestino_id"];
        $turista_id = $_POST["txtturista_id"];
        $fecha_reserva = $_POST["txtfecha_reserva"];

        // Validar que no exista una reserva duplicada para el mismo turista y destino en la misma fecha, pero diferente id
        $validar = $conexion->query("SELECT * FROM reservas WHERE destino_id='$destino_id' AND turista_id='$turista_id' AND fecha_reserva='$fecha_reserva' AND reserva_id!='$id'");
        if ($validar->num_rows > 0) {
            echo '<div class="alert alert-danger">Ya existe una reserva para este turista en este destino y fecha</div>';
        } else {
            $conexion->query("UPDATE reservas SET destino_id='$destino_id', turista_id='$turista_id', fecha_reserva='$fecha_reserva' WHERE reserva_id='$id'");
            echo '<div class="alert alert-success">Reserva modificada correctamente</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Debe llenar todos los campos</div>';
    }

    // Refrescar la url con js
    echo '<script>window.history.replaceState(null, null, window.location.pathname);</script>';
}
//eliminar reserva
if (!empty($_GET["id"])) {
    $id = $_GET["id"];

    $conexion->query("DELETE FROM reservas WHERE reserva_id='$id'");
    echo '<div class="alert alert-success">Reserva eliminada correctamente</div>';

    // Refrescar la url con js
    echo '<script>window.history.replaceState(null, null, window.location.pathname);</script>';
}
?>