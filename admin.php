<?php
include 'session.php';
include 'templates/cabecera.php';
include 'global/conexion.php';
?>


<!--  -->
<div class="container">
  <br>

  <h4>¡Hola <?php echo $name; ?>!</h4>

  <div class="p-1 m-2 bg-primary rounded text-white text-center">
    <h2>Administrador</h2>
    <a class="btn btn-info btn-sm" href="admin.php" role="button">Admin</a>
    <a class="btn btn-info btn-sm" href="admin_prod.php" role="button">Productos</a>
    <a class="btn btn-info btn-sm" href="admin_cat.php" role="button">Categorias</a>
    <a class="btn btn-info btn-sm" href="admin_mens.php" role="button">Mensajes</a>
    <a class="btn btn-info btn-sm" href="salir.php" role="button">Cerrar sesion</a>
  </div>
</div>