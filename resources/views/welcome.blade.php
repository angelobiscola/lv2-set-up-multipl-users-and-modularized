<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<!-- NAVBAR
================================================== -->
<body>

<div class="container marketing">

    <div class="row">
        <div class="col-lg-4">
            <h2>User</h2>
            <p></p>
            <p><a class="btn btn-default" href="/user" role="button"> <i class="glyphicon glyphicon-user"></i>Login</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <h2>Api</h2>
            <p></p>
            <p><a class="btn btn-default" href="/api" role="button"><i class="glyphicon glyphicon-sort"></i>Login</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <h2>Admin</h2>
            <p></p>
            <p><a class="btn btn-default" href="/admin" role="button"><i class="glyphicon glyphicon-wrench"></i> Login</a></p>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2016 Mult user modules, Laravel 5.2.</p>
    </footer>

</div>

</body>
</html>
