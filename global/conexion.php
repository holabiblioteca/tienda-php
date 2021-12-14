<?php

//define("KEY","matias");
//define("COD","AES-128-ECB");

try {
    // definicion de variables
    $host = 'localhost:3306';
    $db = 'bibli82_biblio';
    $username = 'bibli82_root';
    $passwd = '0~70hcqzBDWA';

    // Conexion a la db
    $dsn = "mysql:host=$host;dbname=$db";
    $pdo = new PDO($dsn,$username,$passwd);
   //echo "<h4>Conectado...</h4>";
} catch (\Exception $e) {
    echo "<h3>No se puede conectar a la DB</h3>";
    echo "<h3>Mensaje: " . $e->getMessage() . "</h3>";
}
