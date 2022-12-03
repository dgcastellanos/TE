<?php


require_once 'crud.php';

session_start();


if($_SERVER['REQUEST_METHOD']=='POST'){

    $user = $_REQUEST['user'];   
    $pass = $_REQUEST['pass'];

    $user = findUser('usuario',$user,$pass);

    if($user){
        $_SESSION['login_usuario'] = $user;

        header('Location:index.php');
    }else{
          echo "<script>alert('Datos incorrectos');</script>";
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

    <title>Iniciar sesion</title>

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
                          <img src="img/signin.png" width="65px">
                        </div>
                        <div class="col-md-9">
                          <h3>Iniciar sesion</h3>
                        </div>
                      </div>

                    </div>
                    <div class="panel-body">
<form role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset>

    <div class="form-group">
        <input class="form-control" placeholder="Usuario" name="user" type="text" autofocus required>
    </div>

    <div class="form-group">
        <input class="form-control" placeholder="Contraseña" name="pass" type="password" required>
    </div>

    <div class="checkbox">
        <label>
            <input name="remember" type="checkbox" value="Remember Me"> Recordarme
        </label>
    </div>

    <!-- Change this to a button or input when using this as a form -->
    <input type="submit" name="entrar" class="btn btn-primary btn-block" value="Entrar">

</fieldset>
</form>
        </div>
        <div class="panel-footer">
          <p>¿No tiene una cuenta? <a href="registro.php">Regístrese aquí</a></p>
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