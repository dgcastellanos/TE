<?php

include('crud.php');
session_start();


if(isset($_SESSION['login_usuario'])){



if($_SERVER['REQUEST_METHOD']=='POST'){




$foto = $_FILES["foto"]["name"];
$ruta = $_FILES["foto"]["tmp_name"];

 $dest = "images/reclamos/";
 copy($ruta,$dest.''.$foto);

$datos = array(
'tiporeclamo'=>$_REQUEST['categoria'],
'id_estado'=>0,
'descripcion'=>$_REQUEST['descripcion'],
'img'=>$foto
);



if($foto==null){

  echo "<script>alert('No se ha subido Imagen');</script>";

}

$exito = create($datos,'reclamo');

if($exito){

 echo "<script>alert('Reclamo agregado con Exito');</script>";

}
}







?>


<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nueva Queja</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.ico">

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
                <a class="navbar-brand" href="index.php">SISTEMA DE QUEJAS UPES</a>
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
    Reclamo  <small>Agregar nuevo reclamo</small>
    </h1>
        <ol class="breadcrumb">
    <li>
    <i class="fa fa-dashboard"></i> Consola
    </li>
    <li class="active">
    <i class="fa fa-plus"></i> Nuevo Reclamo
    </li>
    </ol>
    </div>
</div>

<div class="row">

<form role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

<div class="col-lg-6">

<h3>Detalle del Reclamo</h3>

   <div class="form-group">
    <label>Nombre</label>

    <input type="text" name="nombre" 
        class="form-control" value="<?php 
// nombre del usuario 

echo $_SESSION['login_usuario']['0']['nombre'];

?>" readonly >

    </div>

  <div class="form-group">
    <label>Descripcion</label>
    <textarea name="descripcion" class="form-control" required > 
      

    </textarea>
  </div>



  <div class="form-group">
      <label>Tipo de Reclamo</label>
      <select class="form-control" name="categoria">

<?php 


$categoria = findAll('tipo_reclamo');
//var_dump($categoria);


foreach ($categoria as $opcion) {
echo "<option value='".$opcion["nombre"]."'>".$opcion["nombre"]."</option>";
}

?>


    </select>



    <p class="text-info">Si no esta la categoria que busca puede agregar una desde el panel lateral.</p>
    </div>

    <div class="form-group">
    <label>Foto</label>
    <input type="file" name="foto">
    </div>

</div>
<div class="col-lg-6">

<h3>Detalle Reclamo</h3>

<div class="form-group">
  <label>Gestion</label>
  <p>Los reclamos son atendidos en un lapso entre 24 a 48 horas</p>
</div>





<br>

<button name="agregar" type="submit" class="btn btn-success">Enviar</button>
<button type="reset" class="btn btn-danger">Cancelar</button>

</div>

</form>

</div>
<!-- /.row -->
<br>

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

<?php 

}else{

    header('Location:login.php');
}

?>