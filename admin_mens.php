<?php
include 'session.php';
include 'templates/cabecera.php';
include 'global/conexion.php';


//print_r($_POST);
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtLineaUno = (isset($_POST['txtLineaUno'])) ? $_POST['txtLineaUno'] : "";
$txtLineaDos = (isset($_POST['txtLineaDos'])) ? $_POST['txtLineaDos'] : "";
$txtLineaTres = (isset($_POST['txtLineaTres'])) ? $_POST['txtLineaTres'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

//echo "txt".$txtID."<br/>";
//echo "txt".$txtLineaUno."<br/>";
//echo "txt".$txtLineaDos."<br/>";
//echo "txt".$txtLineaTres."<br/>";
//echo "Accion:".$accion."<br/>";

switch ($accion) {

  case "Modificar":
    //echo "SWITCH btn Modificar";
    $sentencia = $pdo->prepare("UPDATE tblmensajes SET LineaUno=:lineauno, LineaDos=:lineados, LineaTres=:lineatres 
    WHERE ID=:id");
    $sentencia->bindParam(':lineauno', $txtLineaUno);
    $sentencia->bindParam(':lineados', $txtLineaDos);
    $sentencia->bindParam(':lineatres', $txtLineaTres);
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    echo '<script type="text/javascript">;
        window.location.href="admin_mens.php";</script>';
    break;

  case "Cancelar":
    //echo "SWITCH btn Cancelar";
    echo '<script type="text/javascript">;
        window.location.href="admin_mens.php";</script>';
    break;

  case "Editar":
    // echo "SWITCH btn Seleccionar";
    $sentencia = $pdo->prepare("SELECT * FROM tblmensajes WHERE ID=:id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_LAZY);
    //print_r($resultado);  
    $txtID = $resultado['ID'];
    $txtLineaUno = $resultado['LineaUno'];
    $txtLineaDos = $resultado['LineaDos'];
    $txtLineaTres = $resultado['LineaTres'];
    break;
}
?>

<!--  -->
<div class="container">
  <br>

  <h4>¡Hola <?php echo $name; ?>!</h4>

  <div class="p-1 m-2 bg-primary rounded text-white text-center">
    <h2>Administrador de mensajes</h2>
    <a class="btn btn-info btn-sm" href="admin.php" role="button">Admin</a>
    <a class="btn btn-info btn-sm" href="admin_prod.php" role="button">Productos</a>
    <a class="btn btn-info btn-sm" href="admin_cat.php" role="button">Categorias</a>
    <a class="btn btn-info btn-sm" href="admin_mens.php" role="button">Mensajes</a>
    <a class="btn btn-info btn-sm" href="salir.php" role="button">Cerrar sesion</a>
  </div>

  <?php
  // SELECT
  $sentencia = $pdo->prepare("SELECT * FROM tblmensajes order by ID asc");
  $sentencia->execute();
  $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
  //print_r($listaProductos);
  ?>

  <form method="post" enctype="multipart/form-data">
    <div class="form-group row">
      <label class="control-label col-sm-3" for="">ID:</label>
      <div class="col-sm-9">
        <input class="form-control" type="text" name="txtID" id="txtID" value="<?php echo $txtID; ?>" readonly>
      </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-sm-3" for="">Línea Uno:</label>
      <div class="col-sm-9">
        <input class="form-control" type="text" name="txtLineaUno" id="txtLineaUno" value="<?php echo $txtLineaUno; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-sm-3" for="">Línea Dos:</label>
      <div class="col-sm-9">
        <input class="form-control" type="text" name="txtLineaDos" id="txtLineaDos" value="<?php echo $txtLineaDos; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-sm-3" for="">Línea Tres:</label>
      <div class="col-sm-9">
        <input class="form-control" type="text" name="txtLineaTres" id="txtLineaTres" value="<?php echo $txtLineaTres; ?>">
      </div>
    </div>

    <div class="input-group">
      <div class="control-label col-sm"></div>
      <button class="btn btn-warning btn-sm" type="submit" name="accion" <?php echo ($accion !== "Editar") ? "disabled" : ""; ?> value="Modificar" type="button">Guardar</button>
      <button class="btn btn-info btn-sm" type="submit" name="accion" <?php echo ($accion !== "Editar") ? "disabled" : ""; ?> value="Cancelar" type="button">Cancelar</button>
    </div>
  </form>
</div>

<!-- container -->
</div>


<div class="m-2 bg-primary text-white rounded text-center">
  <h4>LISTA DE MENSAJES</h4>
</div>

<div class="container-fluid">

  <table class="table table-light" id="example">
    <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>LineaUno</th>
        <th>LineaDos</th>
        <th>LineaTres</th>
        <th>ACCIONES</th>
      </tr>
    </thead>

    <?php foreach ($resultado as $key => $value) : ?>

      <tr>
        <td><?php echo $value['ID']; ?></td>
        <td><?php echo $value['LineaUno']; ?></td>
        <td><?php echo $value['LineaDos']; ?></td>
        <td><?php echo $value['LineaTres']; ?></td>
        <td>
          <form method="post">
            <input type="hidden" name="txtID" id="txtID" value="<?php echo $value['ID']; ?>">
            <input type="submit" name="accion" value="Editar" class="btn btn-primary btn-sm">
          </form>
        </td>

      </tr>
    <?php endforeach; ?>

  </table>
</div>





<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>

<?php
// include 'templates/pie.php';
?>