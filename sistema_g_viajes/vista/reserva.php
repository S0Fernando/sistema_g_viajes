<?php
session_start();
if (empty($_SESSION['id'])) {
    header('location:login/login.php');
}
?>

<style>
    .reserva {
        background: #000000!important;
    }
</style>

<?php
require('./layout/topbar.php');
require('./layout/sidebar.php');
?>

<div class="page-content">

    <script>
        function advertencia(e) {
            if (!confirm("¿Está seguro de eliminar esta reserva?")) {
                e.preventDefault();
            }
        }
    </script>

    <h4 class="text-secondary text-center font-weight-bold">LISTA DE RESERVAS</h4>

    <?php
    include "../config/conexion.php";
    include "../controlador/controlador_reserva.php";
    $sql = $conexion->query("SELECT reservas.*, destinos.nombre AS destino_nombre, turistas.nombre AS turista_nombre, turistas.apellido AS turista_apellido FROM reservas
                             INNER JOIN destinos ON reservas.destino_id = destinos.destino_id
                             INNER JOIN turistas ON reservas.turista_id = turistas.turista_id");
    ?>

    <a data-toggle="modal" data-target="#exampleModalRegistro" class="btn btn-primary btn-rounded mb-2"><i class="fas fa-plus"></i> &nbsp;Nuevo</a>

    <!-- Modal registro-->
    <div class="modal fade" id="exampleModalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Nueva Reserva</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">

                        <?php
                        // traer los destinos
                        $destinos = $conexion->query("SELECT * FROM destinos");
                        // traer los turistas
                        $turistas = $conexion->query("SELECT * FROM turistas");
                        ?>

                        <div class="fl-flex-label mb-4 px-2 col-12">
                            <select required class="input input__text" name="txtdestino_id">
                                <option value="">Seleccione un destino</option>
                                <?php
                                while ($destino = $destinos->fetch_object()) {
                                    echo '<option value="' . $destino->destino_id . '">' . $destino->nombre . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="fl-flex-label mb-4 px-2 col-12">
                            <select required class="input input__text" name="txtturista_id">
                                <option value="">Seleccione un turista</option>
                                <?php
                                while ($turista = $turistas->fetch_object()) {
                                    echo '<option value="' . $turista->turista_id . '">' . $turista->nombre . ' ' . $turista->apellido . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="fl-flex-label mb-4 px-2 col-12">
                            <label>Fecha de reserva</label>
                            <input required type="date" class="input input__text" name="txtfecha_reserva">
                        </div>

                        <div class="text-right p-2">
                            <button type="submit" value="ok" name="btnregistrar" class="btn btn-primary btn-rounded">Registrar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <table class="table table-bordered table-hover w-100" id="example">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">DESTINO</th>
                <th scope="col">TURISTA</th>
                <th scope="col">FECHA DE RESERVA</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($datos = $sql->fetch_object()) { ?>
                <tr>
                    <td><?= $datos->reserva_id ?></td>
                    <td><?= $datos->destino_nombre ?></td>
                    <td><?= $datos->turista_nombre . ' ' . $datos->turista_apellido ?></td>
                    <td><?= $datos->fecha_reserva ?></td>

                    <td>
                        <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->reserva_id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="reserva.php?id=<?= $datos->reserva_id ?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>

                <!-- Modal editar -->
                <div class="modal fade" id="exampleModal<?= $datos->reserva_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-between">
                                <h5 class="modal-title w-100" id="exampleModalLabel">Modificar Reserva</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div hidden class="fl-flex-label mb-4 px-2 col-12">
                                        <input type="text" placeholder="ID" class="input input__text" name="txtid" value="<?= $datos->reserva_id ?>">
                                    </div>

                                    <div class="fl-flex-label mb-4 px-2 col-12">
                                        <select required class="input input__text" name="txtdestino_id">
                                            <option value="">Seleccione un destino</option>
                                            <?php
                                            $destinos = $conexion->query("SELECT * FROM destinos");
                                            while ($destino = $destinos->fetch_object()) {
                                                echo '<option ' . ($datos->destino_id == $destino->destino_id ? "selected" : "") . ' value="' . $destino->destino_id . '">' . $destino->nombre . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="fl-flex-label mb-4 px-2 col-12">
                                        <select required class="input input__text" name="txtturista_id">
                                            <option value="">Seleccione un turista</option>
                                            <?php
                                            $turistas = $conexion->query("SELECT * FROM turistas");
                                            while ($turista = $turistas->fetch_object()) {
                                                echo '<option ' . ($datos->turista_id == $turista->turista_id ? "selected" : "") . ' value="' . $turista->turista_id . '">' . $turista->nombre . ' ' . $turista->apellido . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="fl-flex-label mb-4 px-2 col-12">
                                        <label>Fecha de reserva</label>
                                        <input type="date" placeholder="Fecha de reserva" class="input input__text" name="txtfecha_reserva" value="<?= $datos->fecha_reserva ?>">
                                    </div>

                                    <div class="text-right p-2">
                                        <button type="submit" value="ok" name="btnmodificar" class="btn btn-primary btn-rounded">Modificar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </tbody>
    </table>
</div>
</div>

<?php require('./layout/footer.php'); ?>
