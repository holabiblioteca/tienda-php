https://www.w3schools.com/bootstrap4/img_avatar3.png

https://placekitten.com/100/100 

<?php echo ; ?>


<div class="p-1 m-3 bg-default rounded text-center shadow">
        <h3>LISTA DE PRODUCTOS</h3>
    </div>
    <br>

    <div class="row my-3 text-center">
        <div class="col">
            <?php
            // SELECT
            $sentencia = $pdo->prepare("SELECT * FROM tblproductos order by ID asc");
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
            ?>

            <table class="table table-light" id="example">
                <thead class="thead-light">
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>CATEGORIA</th>
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>OFERTA</th>
                        <th>IMAGEN</th>
                        <!-- <th>SELECCIONAR</th> -->
                    </tr>
                </thead>
                <?php foreach ($resultado as $key => $value) : ?>
                    <tr>
                        <!-- <td><?php echo $value['ID']; ?></td> -->
                        <td><?php echo $value['Categoria']; ?></td>
                        <td><?php echo $value['Nombre']; ?></td>
                        <td><?php echo $value['Precio']; ?></td>
                        <td><?php echo $value['Descripcion']; ?></td>
                        <td><?php echo $value['Oferta']; ?></td>
                        <td><img class="img-thumbnail" src="<?php echo $value['Imagen']; ?>"></td>
                        <!-- <td>
                    <form method="post">
                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $value['ID']; ?>">
                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary">
                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger">
                    </form>   -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>



    case "Borrar":
  //   //echo "SWITCH btn Borrar";
  //   //echo $txtID."<br/>";
  //   $sentencia = $pdo->prepare("DELETE FROM tblmensajes WHERE ID=:id");
  //   $sentencia->bindParam(':id', $txtID);
  //   $sentencia->execute();
  //   echo '<script type="text/javascript">;
  //       window.location.href="admin_mens.php";</script>';
  //   break;




  <select class="form-control">
              <option value="">Seleccionar: </option>
              <?php
      $sentencia = $pdo->prepare("SELECT * FROM tblcategorias order by ID asc");
      $sentencia->execute();
      $Resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      foreach ($Resultado as $resultado) {
            echo '<option value="'.$resultado[ID].'">'.$resultado[Categoria].'</option>';
          }
        ?>
            </select>


               <!-- <option value=""><?php echo $txtCategoria; ?></option> -->   


               <a class="btn btn-success btn-sm" href="ver_cat.php?accion=<?php echo $categoria['Categoria']; ?>"><?php echo $categoria['Categoria']; ?></a>


               // $categoria_seleccionada = $_GET["accion"];
// $categoria = (isset($_GET['accion'])) ? $_GET['accion'] : "";
// $categoria = "Categoria1";