<?php

  include('crud.php');

if($_SERVER['REQUEST_METHOD']=='POST'){

    $datos = array(

        'id_usuario' =>null,
        'correo'=>$_REQUEST['correo'],
        'nombre'=>$_REQUEST['nombre'],
        'apellido'=>$_REQUEST['apellido'],
        'celular'=>$_REQUEST['celular'],
        'carnet'=>$_REQUEST['carnet'],
        'password'=>$_REQUEST['pass'],
        'id_rol'=>1

    );

        $result  = create($datos,'usuario');

        if($result){

          echo "<script>alert('Usuario registrado correctamente, ahora puede iniciar sesión con sus credenciales');</script>";        

        }else{
          echo "<script>alert('No se pudo registrar el usuario');</script>";
        }

      }
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrarme</title>

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
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-3">
                          <img src="img/signup.png" width="65px">
                        </div>
                        <div class="col-md-9">
                          <h3>Registrarme</h3>
                        </div>
                      </div>

                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <fieldset>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Correo" name="correo" type="email" autofocus required>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Nombre" name="nombre" type="text" required>
                                </div>

                                  <div class="form-group">
                                    <input class="form-control" placeholder="Apellido" name="apellido" type="text" required>
                                </div>

                                  <div class="form-group">
                                    <input class="form-control" placeholder="Celular" name="celular" type="number" maxlength="8" required>
                                </div>

                                  <div class="form-group">
                                    <input class="form-control" placeholder="Carnet" name="carnet" type="type" maxlength="8" required> 
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña" name="pass" type="password" required>
                                </div>
                      
                                <input type="submit" name="registro" class="btn btn-success btn-block" value="Registrarme">

                            </fieldset>
                        </form>
                    </div>
                    <div class="panel-footer">
                      <p>¿Ya está registrado? <a href="login.php">Inicie sesión aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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