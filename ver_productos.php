<?php
include 'templates/cabecera.php';
include 'global/conexion.php';

$categoria_seleccionada = "Todos los productos";
$categoria = (isset($_POST['accion'])) ? $_POST['accion'] : "";

$sentencia = $pdo->prepare("SELECT * FROM tblproductos WHERE stock=1 order by ID ASC");
$sentencia->execute();
$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaProductos);
?>
<br>
<div class="container">
    <div class="row">
        <div class="p-1 bg-primary text-white rounded text-center">
            <h4 style="padding:4px; margin:4px;"><?php echo $categoria_seleccionada; ?></h4>
        </div>
    </div>

    <br>

    <div class="row">
        <br>
        <?php foreach ($listaProductos as $producto) { ?>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="<?php echo $producto['Imagen']; ?>">
                    </div>
                    <div class="card-body text-center">
                        <h5><?php echo $producto['Nombre']; ?></h5>
                        <h4 class="card-title text-primary">$<?php echo $producto['Precio']; ?></h4>
                        <p class="card-text"><?php echo $producto['Descripcion']; ?></p>
                        <a name="item" id="" class="btn btn-success border rounded" href="ver_item.php?item=<?php echo $producto['ID']; ?>" role="button">Ver</a>
                    </div>
                </div>
                <br>
            </div>
        <?php } ?>
    </div>
</div>

<br>

<?php
include 'menu_categorias.php';
?>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<?php
include 'templates/pie.php';
?>