<?php
session_start();
if (empty($_SESSION['user']) and empty($_SESSION['clave'])) {
    header('location:./vista/login/login.php');
}else{

header('location:./vista/inicio.php');
}
