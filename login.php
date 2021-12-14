<?php
include 'templates/cabecera.php';
?>

<div class="container text-primary text-center">
  <br><br><br><br>

  <h4>LOGIN ADMINISTRADOR</h4>
  <br>
  <div class="row">

    <div class="col-sm-4"></div>

    <div class="col-sm-4">
      <form action="validar.php" method="post" enctype="multipart/form-data">
        <div class="form-group font-weight-bold">
          <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Usuario">
        </div>
        <br>
        <div class="form-group  font-weight-bold">
          <input type="password" class="form-control" id="txtClave" name="txtClave" placeholder="Contraseña">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Ingresar</button>
      </form>
    </div>

    <div class="col-sm-4"></div>
  </div>
</div>







</body>

</html>