<?php
//registrar destino
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtnombre"]) and !empty($_POST["txtpais"]) and !empty($_POST["txtdescripcion"]) and !empty($_POST["txtcosto"])) {
        $nombre = $_POST["txtnombre"];
        $pais = $_POST["txtpais"];
        $descripcion = $_POST["txtdescripcion"];
        $costo = $_POST["txtcosto"];

        // validar que no exista un destino con el mismo nombre y país
        $validar = $conexion->query("SELECT * FROM destinos WHERE nombre='$nombre' AND pais='$pais'");
        if ($validar->num_rows > 0) {
            echo '<div class="alert alert-danger">Ya existe un destino con ese nombre en ese país</div>';
        } else {
            $conexion->query("INSERT INTO destinos (nombre, pais, descripcion, costo) VALUES ('$nombre', '$pais', '$descripcion', '$costo')");
            echo '<div class="alert alert-success">Destino registrado correctamente</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Debe llenar todos los campos</div>';
    }

    // refrescar la url con js
    echo '<script>window.history.replaceState(null, null, window.location.pathname);</script>';
}
//modificar destino
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtid"]) and !empty($_POST["txtnombre"]) and !empty($_POST["txtpais"]) and !empty($_POST["txtdescripcion"]) and !empty($_POST["txtcosto"])) {
        $id = $_POST["txtid"];
        $nombre = $_POST["txtnombre"];
        $pais = $_POST["txtpais"];
        $descripcion = $_POST["txtdescripcion"];
        $costo = $_POST["txtcosto"];

        // validar que no exista un destino con el mismo nombre y país, pero diferente id
        $validar = $conexion->query("SELECT * FROM destinos WHERE nombre='$nombre' AND pais='$pais' AND destino_id!='$id'");
        if ($validar->num_rows > 0) {
            echo '<div class="alert alert-danger">Ya existe un destino con ese nombre en ese país</div>';
        } else {
            $conexion->query("UPDATE destinos SET nombre='$nombre', pais='$pais', descripcion='$descripcion', costo='$costo' WHERE destino_id='$id'");
            echo '<div class="alert alert-success">Destino modificado correctamente</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Debe llenar todos los campos</div>';
    }

    // refrescar la url con js
    echo '<script>window.history.replaceState(null, null, window.location.pathname);</script>';
}
//eliminar destino
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $conexion->query("DELETE FROM destinos WHERE destino_id='$id'");
    echo '<div class="alert alert-success">Destino eliminado correctamente</div>';
    echo '<script>window.history.replaceState(null, null, window.location.pathname);</script>';
}
?>