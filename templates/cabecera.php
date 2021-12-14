<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="templates/css/bootstrap.css" rel="stylesheet">   
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/r-2.2.9/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/r-2.2.9/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.png">
    <title>Tienda</title>

    
    
    <script type="text/javascript" class="init">
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_  registros",
                    "zeroRecords": "Nothing found - sorry",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "search": "Buscar:",
                }
            });
        });
    </script>

<style>
html,
body,
div,
h1,
h2,
h3,
h4,
h5,
h6,
a,
button,
input {
    font-family: 'Montserrat', sans-serif;
}
body {
 background-color:whitesmoke;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand font-weight-bold" href="index.php">TIENDA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="ver_productos.php">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacto.php">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="nosotros.php">Nosotros</a>
        </li>
 <li class="nav-item">
                    <a class="nav-link" href="login.php">Admin </a>
                </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>


    
