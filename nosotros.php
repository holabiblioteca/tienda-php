<?php
include 'templates/cabecera.php';
include 'global/conexion.php';
?>

</html>
<?php
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
?>
<?php
include 'templates/pie.php';
?>