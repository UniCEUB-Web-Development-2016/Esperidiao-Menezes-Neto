<?php     session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <!--<link href="signin.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="js/ie-emulation-modes-warning.js"></script>-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery/jquery-1.11.3.min.js"></script>
    <script src="js/client.js"></script>
    <link href="css/singin.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container col-lg-6 col-md-6">

    <form class="form-signin" method="get" action="login.php/">
        <h2 class="form-signin-heading"><img src="img/coruja.jpg" width="300px" height="300px"></h2>
        <label for="email_usuario" class="sr-only">Email address</label>
        <input type="email" id="email_usuario" name="email_usuario"  class="form-control" placeholder="Email address" required autofocus>
        <label for="senha_usuario" class="sr-only">Password</label>
        <input type="password" id="senha_usuario"  name="senha_usuario" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <input class="btn btn-lg  btn-info btn-block" type="submit">Sign in</input>

    </form>
    <button class="btn btn-lg  btn-success btn-block"  onclick="window.location = 'Cadastro.html'">Cadastre-se</button>
</div>
<!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
</body>
</html>




<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
    <!--<meta charset="utf-8">-->
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <!--&lt;!&ndash; The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags &ndash;&gt;-->
    <!--<meta name="description" content="">-->
    <!--<meta name="author" content="">-->
    <!--<link rel="icon" href="../../favicon.ico">-->

    <!--<title>Signin Template for Bootstrap</title>-->

    <!--&lt;!&ndash; Bootstrap core CSS &ndash;&gt;-->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->

    <!--&lt;!&ndash; IE10 viewport hack for Surface/desktop Windows 8 bug &ndash;&gt;-->
    <!--<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!--&lt;!&ndash; Custom styles for this template &ndash;&gt;-->
    <!--<link href="css/singin.css" rel="stylesheet">-->

    <!--&lt;!&ndash; HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries &ndash;&gt;-->
    <!--&lt;!&ndash;[if lt IE 9]>-->
    <!--&lt;!&ndash;<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>&ndash;&gt;-->
    <!--&lt;!&ndash;<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>&ndash;&gt;-->

    <!--<script src="js/jquery/jquery-1.11.3.min.js"></script>-->
    <!--<script src="js/client.js"></script>-->

    <!--<![endif]&ndash;&gt;-->
<!--</head>-->

<!--<body>-->

<!--<div class="container">-->

    <!--<form class="form-signin">-->
        <!--<h2 class="form-signin-heading"><img src="img/coruja.jpg" width="300px" height="300px"></h2>-->
        <!--<label for="inputEmail" class="sr-only">Email address</label>-->
        <!--<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>-->
        <!--<label for="inputPassword" class="sr-only">Password</label>-->
        <!--<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>-->
        <!--<div class="checkbox">-->
            <!--<label>-->
                <!--<input type="checkbox" value="remember-me"> Remember me-->
            <!--</label>-->
        <!--</div>-->
        <!--<button class="btn btn-lg btn-primary btn-block" onclick="submitSignIn()">Sign in</button>-->
    <!--</form>-->

<!--</div> &lt;!&ndash; /container &ndash;&gt;-->


<!--</body>-->
<!--</html>-->





