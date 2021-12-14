<?php
$sentencia = $pdo->prepare("SELECT * FROM tblmensajes");
$sentencia->execute();
$Mensajes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($Mensajes);
?>

<div class="container">
    <div class="row">
        <div class="p-1 bg-info rounded border text-center text-white">
            <?php foreach ($Mensajes as $mensaje) { ?>
                <H3><?php echo $mensaje['LineaUno']; ?></H3>
                <H4><?php echo $mensaje['LineaDos']; ?></H4>
                <H5><?php echo $mensaje['LineaTres']; ?></H5>
            <?php } ?>
        </div>
    </div>
</div>