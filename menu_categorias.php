<?php
$sentencia = $pdo->prepare("SELECT * FROM tblcategorias WHERE Stock=1 order by Categoria asc");
$sentencia->execute();
$resCategoria = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($resCategoria);
?>

<br>

<div class="container">
    <div class="row">
        <div class="bg-light border rounded text-center">
            <H4 style="padding:4px; margin:4px;">PRODUCTOS / CATEGORIAS</H4>
        </div>
    </div>
    <br>
    <a name="" id="" class="btn btn-success border rounded" href="ver_productos.php" role="button">Ver todos los productos</a>
    <br>
    <div class="row">
        <form class="input-group" action="ver_cat.php" method="post" enctype="multipart/form-data">
            <?php foreach ($resCategoria as $categoria) { ?>
                <button type="submit" class="btn btn-info btn-sm p-2 m-3" name="accion" value="<?php echo $categoria['Categoria']; ?>"><?php echo $categoria['Categoria']; ?></button>
            <?php } ?>
        </form>
    </div>
</div>