<?php
session_start();
if (empty($_SESSION['id'])) {
    header('location:login/login.php');
}
?>

<style>
    .turista {
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
            if (!confirm("¿Está seguro de eliminar este turista?")) {
                e.preventDefault();
            }
        }
    </script>

    <h4 class="text-secondary text-center font-weight-bold">LISTA DE TURISTAS</h4>

    <?php
    include "../config/conexion.php";
    include "../controlador/controlador_turista.php";
    $sql = $conexion->query("SELECT * FROM turistas");
    ?>

    <a data-toggle="modal" data-target="#exampleModalRegistro" class="btn btn-primary btn-rounded mb-2"><i class="fas fa-plus"></i> &nbsp;Nuevo</a>

    <!-- Modal registro-->
    <div class="modal fade" id="exampleModalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Nuevo Turista</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">

                        <div class="fl-flex-label mb-4 px-2 col-12">
                            <input required type="text" placeholder="Nombre" class="input input__text" name="txtnombre">
                        </div>

                        <div class="fl-flex-label mb-4 px-2 col-12">
                            <input required type="text" placeholder="Apellido" class="input input__text" name="txtapellido">
                        </div>

                        <div class="fl-flex-label mb-4 px-2 col-12">
                            <input required type="email" placeholder="Email" class="input input__text" name="txtemail">
                        </div>

                        <div class="fl-flex-label mb-4 px-2 col-12">
                            <input required type="number" placeholder="Telefono" class="input input__text" name="txttelefono">
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
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TELEFONO</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($datos = $sql->fetch_object()) { ?>
                <tr>
                    <td><?= $datos->turista_id ?></td>
                    <td><?= $datos->nombre ?></td>
                    <td><?= $datos->apellido ?></td>
                    <td><?= $datos->email ?></td>
                    <td><?= $datos->telefono ?></td>

                    <td>
                        <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->turista_id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="turista.php?id=<?= $datos->turista_id ?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>

                <!-- Modal editar -->
                <div class="modal fade" id="exampleModal<?= $datos->turista_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-between">
                                <h5 class="modal-title w-100" id="exampleModalLabel">Modificar Turista</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div hidden class="fl-flex-label mb-4 px-2 col-12">
                                        <input type="text" placeholder="ID" class="input input__text" name="txtid" value="<?= $datos->turista_id ?>">
                                    </div>

                                    <div class="fl-flex-label mb-4 px-2 col-12">
                                        <input type="text" placeholder="Nombre" class="input input__text" name="txtnombre" value="<?= $datos->nombre ?>">
                                    </div>

                                    <div class="fl-flex-label mb-4 px-2 col-12">
                                        <input type="text" placeholder="Apellido" class="input input__text" name="txtapellido" value="<?= $datos->apellido ?>">
                                    </div>

                                    <div class="fl-flex-label mb-4 px-2 col-12">
                                        <input type="email" placeholder="Email" class="input input__text" name="txtemail" value="<?= $datos->email ?>">
                                    </div>

                                    <div class="fl-flex-label mb-4 px-2 col-12">
                                        <input type="number" placeholder="Telefono" class="input input__text" name="txttelefono" value="<?= $datos->telefono ?>">
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
