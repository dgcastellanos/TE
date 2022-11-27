<?php
include('crud.php');

session_start();

if(!isset($_SESSION["login_usuario"])){
//Redirecciona al login
header("Location: login.php");
}
//Se verifica si existe una variable get id si no redirecciona

if(!$_GET["id"]){

header("Location: cuenta.php");
}

//Si no redirecciona guardamos la variable get en una variable
$id = $_GET["id"];

$econtrado = find($id,'reclamo');

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Subasta de producto</title>

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/sb-admin.css" rel="stylesheet">

<!-- Morris Charts CSS -->
<link href="css/plugins/morris.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>


<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="subastas.php">Subastas</a>
</div>
<!-- Top Menu Items -->
<?php
include ("header.php");
?>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<?php
include ("sidebar.php");
?>
<!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Reclamo <small>Ver Informacion</small>
</h1>
<ol class="breadcrumb">
<li>
<i class="fa fa-comment"></i> Reclamo
</li>
<li>
<i class="fa fa-comments"></i> Detalles
</li>
<li class="active">
<i class="fa fa-certificate"></i> Ver info
</li>
</ol>
</div>
</div>

<!-- Listado de subastas -->
<div class="row">

<div class="col-sm-6 col-md-6">

  <?php


 $url = $econtrado['img'];

//Aqui se mostrara la imagen del producto en grande
echo "<img src='images/reclamos/$url' style='max-height: 450px; width: 100%;'>";

//echo $econtrado['img'];

?>


</div>


<!--detalle de los reclamos -->
<div class="col-sm-6 col-md-6">

<div class="thumbnail">

<h3>Detalle Reclamo</h3>

<div class="form-group">
  <label>Descripcion</label>
        <p>
    <?php 
    
        $encontrado = find($id,'reclamo'); 
          echo $encontrado['descripcion']; 
    ?>
        </p>
    </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>







<!-- Archivo de cuenta regresiva -->
<script src="js/regresivo.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>



</body>

</html>
