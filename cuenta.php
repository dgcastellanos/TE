<?php
  include ("crud.php");

  session_start();

  if(isset($_SESSION["login_usuario"])){


  
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mi Reclamos</title>

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
                    Mi cuenta <small>Reclamos [Activas / Inactivas]</small>
                </h1>
                <ol class="breadcrumb">
                  <li>
                      <i class="fa fa-dashboard"></i> Consola
                  </li>
                  <li class="active">
                      <i class="fa fa-tasks"></i> Mi cuenta
                  </li>
                </ol>
            </div>
        </div>

<!-- Listado de subastas -->
<div class="row">
  <div class="col-lg-6">

    <div class="table-responsive">
      <h2>Activos</h2>
      <hr>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Tipo Reclamo</th>
                    <th>Descripcion</th>
                    <th>Fecha Creado</th>
                </tr>
            </thead>
            <tbody>
<?php 

$url = 'images/reclamos/';

$reclamos = findAll('reclamo');

foreach ($reclamos as $value) {
  
     


?>           

      <tr>
          <td width="180px">
            <center>
<a href="<?php echo "reclamo.php?id=".$value['id_reclamo']; ?>">               
<img src="<?php echo $url.$value['img']; ?>" style="height: 50px;">
              </a>
            </center>
          </td>
          <td><?php 

          echo "<b class='text-success'>".$value['tiporeclamo']."</b>";?>
            
          </td>
          <td><?php echo $value['descripcion'];?></td>
          <td><?php 


          echo "<b class='text-danger'>".
          date("d-m-y", strtotime($value['fecha_creacion'])).
          "</b>";?>
        

      </td>
      </tr>


<?php 

}


?>



</tbody>
              </table>
          </div>
      </div>






<div class="col-lg-6">

<div class="table-responsive">
<h2>Cerradas</h2>
<hr>
<table class="table table-hover">
<thead>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Categoria</th>
        <th>Pagado</th>
    </tr>
</thead>
<tbody>



          <tr>
              <td width="180px">
                <center>
                  <a href="<?php echo "subasta.php?id=$sub"; ?>">
                    <img src="<?php echo "images/productos/$imagen_p";?>" style="height: 80px;">
                  </a>
                </center>
                                          </td>
        <td><?php echo "<b class='text-success'>$nombre_p</b>";?></td>
        <td><?php echo $categoria;?></td>
        <td><?php echo "<b class='text-danger'>$$of_final.00</b>";?></td>
    </tr>

    </tbody>
                        </table>
                    </div>
                </div>
                <!-- Termina  -->

              </div>
              <!-- Fin de listado -->

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