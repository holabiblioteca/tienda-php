<?php
include 'session.php';
include 'templates/cabecera.php';
include 'global/conexion.php';

//print_r($_POST);
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtCategoria = (isset($_POST['txtCategoria'])) ? $_POST['txtCategoria'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtPrecio = (isset($_POST['txtPrecio'])) ? $_POST['txtPrecio'] : "";
$txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
$txtOferta = (isset($_POST['txtOferta'])) ? $_POST['txtOferta'] : "";
$txtStock = (isset($_POST['txtStock'])) ? $_POST['txtStock'] : "";
$txtImagen = (isset($_POST['txtImagen'])) ? $_POST['txtImagen'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

//echo "txt".$txtID."<br/>";
//echo "txt".$txtCategoria."<br/>";
//echo "txt".$txtNombre."<br/>";
//echo "txt".$txtPrecio."<br/>";
//echo "txt".$txtDescripcion."<br/>";
//echo "txt".$txtOferta."<br/>";
//echo "txt".$txtStock."<br/>";
//echo "txt".$txtImagen."<br/>";
//echo "Accion:".$accion."<br/>";

switch ($accion) {

  case "Agregar":
    //echo "SWITCH btn Agregar";
    $sentencia = $pdo->prepare("INSERT INTO `tblproductos` (`Categoria`, `Nombre`, `Precio`, `Descripcion`, `Oferta`, `Stock`, `Imagen`) 
      VALUES (:categoria, :nombre, :precio, :descripcion, :oferta, :stock, :imagen)");
    $sentencia->bindParam(':categoria', $txtCategoria);
    $sentencia->bindParam(':nombre', $txtNombre);
    $sentencia->bindParam(':precio', $txtPrecio);
    $sentencia->bindParam(':descripcion', $txtDescripcion);
    $sentencia->bindParam(':oferta', $txtOferta);
    $sentencia->bindParam(':stock', $txtStock);
    $sentencia->bindParam(':imagen', $txtImagen);
    $sentencia->execute();
    echo '<script type="text/javascript">;
        window.location.href="admin_prod.php";</script>';
    break;

  case "Modificar":
    //echo "SWITCH btn Modificar";
    $sentencia = $pdo->prepare("UPDATE tblproductos SET categoria=:categoria, nombre=:nombre, precio=:precio,
      descripcion=:descripcion, oferta=:oferta, stock=:stock,imagen=:imagen WHERE ID=:id");
    $sentencia->bindParam(':categoria', $txtCategoria);
    $sentencia->bindParam(':nombre', $txtNombre);
    $sentencia->bindParam(':precio', $txtPrecio);
    $sentencia->bindParam(':descripcion', $txtDescripcion);
    $sentencia->bindParam(':oferta', $txtOferta);
    $sentencia->bindParam(':stock', $txtStock);
    $sentencia->bindParam(':imagen', $txtImagen);
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    echo '<script type="text/javascript">;
        window.location.href="admin_prod.php";</script>';
    break;

  case "Cancelar":
    //echo "SWITCH btn Cancelar";
    echo '<script type="text/javascript">;
        window.location.href="admin_prod.php";</script>';
    break;

  case "Editar":
    // echo "SWITCH btn Seleccionar";
    $sentencia = $pdo->prepare("SELECT * FROM tblproductos WHERE ID=:id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_LAZY);
    //print_r($resultado);  
    $txtID = $resultado['ID'];
    $txtCategoria = $resultado['Categoria'];
    $txtNombre = $resultado['Nombre'];
    $txtPrecio = $resultado['Precio'];
    $txtDescripcion = $resultado['Descripcion'];
    $txtOferta = $resultado['Oferta'];
    $txtStock = $resultado['Stock'];
    $txtImagen = $resultado['Imagen'];
    break;

  case "Borrar":
    //echo "SWITCH btn Borrar";
    //echo $txtID."<br/>";
    $sentencia = $pdo->prepare("DELETE FROM tblproductos WHERE ID=:id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    echo '<script type="text/javascript">;
        window.location.href="admin_prod.php";</script>';
    break;
}
?>

<!--  -->
<div class="container">
  <br>

  <h4>¡Hola <?php echo $name; ?>!</h4>

  <div class="p-1 m-2 bg-primary rounded text-white text-center">
    <h2>Administrador de productos</h2>
    <a class="btn btn-info btn-sm" href="admin.php" role="button">Admin</a>
    <a class="btn btn-info btn-sm" href="admin_prod.php" role="button">Productos</a>
    <a class="btn btn-info btn-sm" href="admin_cat.php" role="button">Categorias</a>
    <a class="btn btn-info btn-sm" href="admin_mens.php" role="button">Mensajes</a>
    <a class="btn btn-info btn-sm" href="salir.php" role="button">Cerrar sesion</a>
  </div>

  <?php
  // SELECT
  $sentencia = $pdo->prepare("SELECT * FROM tblproductos order by ID asc");
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
      <label class="control-label col-sm-3" for="">Categoría:</label>
      <div class="col-sm-9">
        <select class="form-control" name="txtCategoria" id="txtCategoria">
          <option value="<?php echo $txtCategoria; ?>"><?php echo $txtCategoria; ?></option>
          <?php
          $sentencia = $pdo->prepare("SELECT * FROM tblcategorias WHERE Stock=1 order by Categoria asc");
          $sentencia->execute();
          $Resultadoss = $sentencia->fetchAll(PDO::FETCH_ASSOC);
          foreach ($Resultadoss as $resultad) {
            echo '<option value="' . $resultad[Categoria] . '">' . $resultad[Categoria] . '</option>';
          }
          ?>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-sm-3" for="">Nombre:</label>
      <div class="col-sm-9">
        <input class="form-control" type="text" name="txtNombre" id="txtNombre" value="<?php echo $txtNombre; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-sm-3" for="">Precio:</label>
      <div class="col-sm-9">
        <input class="form-control" type="text" name="txtPrecio" id="txtPrecio" value="<?php echo $txtPrecio; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-sm-3" for="">Descripción:</label>
      <div class="col-sm-9">
        <input class="form-control" type="text" name="txtDescripcion" id="txtDescripcion" value="<?php echo $txtDescripcion; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-sm-3" for="">Oferta=1 / Sin Oferta=0:</label>
      <div class="col-sm-9">
        <input class="form-control" type="number" min="0" max="1" name="txtOferta" id="txtOferta" value="<?php echo $txtOferta; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-sm-3" for="">Stock=1 / Sin Stock=0:</label>
      <div class="col-sm-9">
        <input class="form-control" type="number" min="0" max="1"name="txtStock" id="txtStock" value="<?php echo $txtStock; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-sm-3" for="txtImagen">Imagen (link):</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="txtImagen" id="txtImagen" value="<?php echo $txtImagen; ?>">
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
  <h4>LISTA DE PRODUCTOS</h4>
</div>

<div class="container-fluid">
  <table class="table table-light" id="example">
    <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>CATEGORIA</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>DESCRIPCIÓN</th>
        <th>OFERTA=1</th>
        <th>STOCK=1</th>
        <th>IMAGEN</th>
        <th>ACCIONES</th>
      </tr>
    </thead>

    <?php foreach ($resultado as $key => $value) : ?>

      <tr>
        <td><?php echo $value['ID']; ?></td>
        <td><?php echo $value['Categoria']; ?></td>
        <td><?php echo $value['Nombre']; ?></td>
        <td><?php echo $value['Precio']; ?></td>
        <td><?php echo $value['Descripcion']; ?></td>
        <td><?php echo $value['Oferta']; ?></td>
        <td><?php echo $value['Stock']; ?></td>
        <td><img class="img-thumbnail" src="<?php echo $value['Imagen']; ?>"></td>
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