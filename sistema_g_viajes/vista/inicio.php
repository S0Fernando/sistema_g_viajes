<?php
session_start();
error_reporting(0);
if (empty($_SESSION['id'])) {
    header('location:login/login.php');
}

?>

<style>
    .destino {
        background: #000000!important;
    }
</style>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

<script>
    function advertencia(e) {
        if (!confirm("¿Está seguro de eliminar este destino?")) {
            e.preventDefault();
        }
    }
</script>

    <h4 class="text-secondary text-center font-weight-bold">DESTINOS REGISTRADOS</h4>

    <?php
    include "../config/conexion.php";
    include "../controlador/controlador_destino.php";

    $sql = $conexion->query(" SELECT * from destinos ");
    ?>

    <a data-toggle="modal" data-target="#exampleModalRegistro" class="btn btn-primary btn-rounded mb-2"><i class="fas fa-plus"></i> &nbsp;Nuevo</a>

    <!-- Modal registro-->
    <div class="modal fade" id="exampleModalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Nuevo Destino</h5>
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
                            <input required type="text" placeholder="País" class="input input__text" name="txtpais">
                        </div>

                        <div class="fl-flex-label mb-4 px-2 col-12">
                            <textarea placeholder="Descripción" class="input input__text" name="txtdescripcion"></textarea>
                        </div>

                        <div class="fl-flex-label mb-4 px-2 col-12">
                            <input required type="number" placeholder="Costo" class="input input__text" name="txtcosto">
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
                <th scope="col">PAIS</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col">COSTO</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($datos = $sql->fetch_object()) { ?>
                <tr>
                    <td><?= $datos->destino_id ?></td>
                    <td><?= $datos->nombre ?></td>
                    <td><?= $datos->pais ?></td>
                    <td><?= $datos->descripcion ?></td>
                    <td><?= $datos->costo ?></td>

                    <td>
                        <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->destino_id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="inicio.php?id=<?= $datos->destino_id ?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>

                <!-- Modal editar -->
                <div class="modal fade" id="exampleModal<?= $datos->destino_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-between">
                                <h5 class="modal-title w-100" id="exampleModalLabel">Modificar Destino</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div hidden class="fl-flex-label mb-4 px-2 col-12">
                                        <input type="text" placeholder="ID" class="input input__text" name="txtid" value="<?= $datos->destino_id ?>">
                                    </div>

                                    <div class="fl-flex-label mb-4 px-2 col-12">
                                        <input type="text" placeholder="Nombre" class="input input__text" name="txtnombre" value="<?= $datos->nombre ?>">
                                    </div>

                                    <div class="fl-flex-label mb-4 px-2 col-12">
                                        <input type="text" placeholder="País" class="input input__text" name="txtpais" value="<?= $datos->pais ?>">
                                    </div>

                                    <div class="fl-flex-label mb-4 px-2 col-12">
                                        <textarea placeholder="Descripción" class="input input__text" name="txtdescripcion"><?= $datos->descripcion ?></textarea>
                                    </div>

                                    <div class="fl-flex-label mb-4 px-2 col-12">
                                        <input type="text" placeholder="Costo" class="input input__text" name="txtcosto" value="<?= $datos->costo ?>">
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
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>
