<?php
// SELECT
$sentencia = $pdo->prepare("SELECT * FROM tblproductos WHERE oferta=1 and stock=1 order by RAND() LIMIT 4");
$sentencia->execute();
$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaProductos);
?>


<div class="container">
    <div class="row">
    <div class="p-1 bg-light rounded border text-center">
            <H4 style="padding:4px; margin:4px;">PRODUCTOS EN OFERTA</H4>
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