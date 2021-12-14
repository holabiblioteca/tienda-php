<?php
include 'templates/cabecera.php';
include 'global/conexion.php';
?>

<br><br>
<?php
include 'mensajes.php';
?>

<br><br>
<?php
include 'menu_ofertas_rand.php';
?>

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