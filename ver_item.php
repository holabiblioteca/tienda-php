<?php
include 'templates/cabecera.php';
include 'global/conexion.php';

$categoria_seleccionada = "Detalle producto";
$item = (isset($_REQUEST['item'])) ? $_REQUEST['item'] : "";
//print_r($item);

$sentencia = $pdo->prepare("SELECT * FROM tblproductos WHERE ID=:item");
$sentencia->bindParam(':item', $item);
$sentencia->execute();
$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($resultado);
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
        <?php foreach ($resultado as $producto) { ?>
            <div class="col-sm">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="<?php echo $producto['Imagen']; ?>">
                    </div>
                    <div class="card-body text-center">
                        <h5><?php echo $producto['Nombre']; ?></h5>
                        <h4 class="card-title text-primary">$<?php echo $producto['Precio']; ?></h4>
                        <p class="card-text"><?php echo $producto['Descripcion']; ?></p>
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