<?php
include 'session.php';
include 'templates/cabecera.php';
include 'global/conexion.php';


//print_r($_POST);
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$tblCategoria = (isset($_POST['tblCategoria'])) ? $_POST['tblCategoria'] : "";
$tblStock = (isset($_POST['tblStock'])) ? $_POST['tblStock'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

//echo "txt".$txtID."<br/>";
//echo "txt".$tblCategoria."<br/>";
//echo "txt".$tblStock."<br/>";
//echo "Accion:".$accion."<br/>";

switch ($accion) {

  case "Agregar":
    //echo "SWITCH btn Agregar";
    $sentencia = $pdo->prepare("INSERT INTO `tblcategorias` (`Categoria`, `Stock`) 
      VALUES (:categoria, :stock)");
    $sentencia->bindParam(':categoria', $tblCategoria);
    $sentencia->bindParam(':stock', $tblStock);
    $sentencia->execute();
    echo '<script type="text/javascript">;
        window.location.href="admin_cat.php";</script>';
    break;

  case "Modificar":
    //echo "SWITCH btn Modificar";
    $sentencia = $pdo->prepare("UPDATE tblcategorias SET categoria=:categoria, stock=:stock WHERE ID=:id");
    $sentencia->bindParam(':categoria', $tblCategoria);
    $sentencia->bindParam(':stock', $tblStock);
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    echo '<script type="text/javascript">;
        window.location.href="admin_cat.php";</script>';
    break;

  case "Cancelar":
    //echo "SWITCH btn Cancelar";
    echo '<script type="text/javascript">;
        window.location.href="admin_cat.php";</script>';
    break;

  case "Editar":
    // echo "SWITCH btn Seleccionar";
    $sentencia = $pdo->prepare("SELECT * FROM tblcategorias WHERE ID=:id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_LAZY);
    //print_r($resultado);  
    $txtID = $resultado['ID'];
    $tblCategoria = $resultado['Categoria'];
    $tblStock = $resultado['Stock'];
      break;

  case "Borrar":
    //echo "SWITCH btn Borrar";
    //echo $txtID."<br/>";
    $sentencia = $pdo->prepare("DELETE FROM tblcategorias WHERE ID=:id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    echo '<script type="text/javascript">;
        window.location.href="admin_cat.php";</script>';
    break;
}
?>

<!--  -->
<div class="container">
  <br>

  <h4>¡Hola <?php echo $name; ?>!</h4>

  <div class="p-1 m-2 bg-primary rounded text-white text-center">
    <h2>Administrador de categorias</h2>
    <a class="btn btn-info btn-sm" href="admin.php" role="button">Admin</a>
    <a class="btn btn-info btn-sm" href="admin_prod.php" role="button">Productos</a>
    <a class="btn btn-info btn-sm" href="admin_cat.php" role="button">Categorias</a>
    <a class="btn btn-info btn-sm" href="admin_mens.php" role="button">Mensajes</a>
    <a class="btn btn-info btn-sm" href="salir.php" role="button">Cerrar sesion</a>
  </div>

  <?php
  // SELECT
  $sentencia = $pdo->prepare("SELECT * FROM tblcategorias order by ID asc");
  $sentencia->execute();
  $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
 
  ?>

  <form method="post" enctype="multipart/form-data">
    <div class="form-group row">
      <label class="control-label col-sm-3" for="">ID:</label>
      <div class="col-sm-9">
        <input class="form-control" type="text" name="txtID" id="txtID" value="<?php echo $txtID; ?>" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-sm-3" for="">Categoría:</label>
      <div class="col-sm-9">
        <input class="form-control" type="text" name="tblCategoria" id="tblCategoria" value="<?php echo $tblCategoria; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-sm-3" for="">Stock=1 / Sin Stock=0:</label>
      <div class="col-sm-9">
        <input class="form-control" type="number" min="0" max="1" name="tblStock" id="tblStock" value="<?php echo $tblStock; ?>">
      </div>
    </div>
    
        <div class="input-group">
        <div class="control-label col-sm"></div>
        <button class="btn btn-success btn-sm" type="submit" name="accion" <?php echo ($accion == "Editar") ? "disabled" : ""; ?> value="Agregar" type="button">Agregar</button>
      <button class="btn btn-warning btn-sm" type="submit" name="accion" <?php echo ($accion !== "Editar") ? "disabled" : ""; ?> value="Modificar" type="button">Guardar</button>
      <button class="btn btn-info btn-sm" type="submit" name="accion" <?php echo ($accion !== "Editar") ? "disabled" : ""; ?> value="Cancelar" type="button">Cancelar</button>
      </div>
  </form>
</div>

<!-- container -->
</div>


<div class="m-2 bg-primary text-white rounded text-center">
  <h4>LISTA DE CATEGORIAS</h4>
</div>

<div class="container-fluid">
<table class="table table-light" id="example">
    <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>CATEGORÍA</th>
        <th>STOCK=1</th>
        <th>ACCIONES</th>
      </tr>
    </thead>

    <?php foreach ($resultado as $key => $value) : ?>

      <tr>
        <td><?php echo $value['ID']; ?></td>
        <td><?php echo $value['Categoria']; ?></td>
        <td><?php echo $value['Stock']; ?></td>
        <td>
          <form method="post">
            <input type="hidden" name="txtID" id="txtID" value="<?php echo $value['ID']; ?>">
            <input type="submit" name="accion" value="Editar" class="btn btn-primary btn-sm">
            <input type="submit" name="accion" value="Borrar" class="btn btn-danger btn-sm">
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