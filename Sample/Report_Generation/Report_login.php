<!DOCTYPE html>
<html lang="en">
<?php
@session_start();
if (isset($_SESSION['sdrn'])){
    $sdrn = $_SESSION['sdrn'];
    echo '<script language="javascript"> alert("LOGIN OUT.."); </script>';
    session_unset();
    session_destroy();

}

?>

<head>
    <title>Report Generation Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/util.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </head>

<body>


    <!-- Categories -->
    <div class="container" style="margin-top: 7%;">

        <!-- Gradient -->


        <div class="row">
            <div class="col-sm-4">
            </div>

            <div class="col-sm-4">
                <div class="card" style="width:450px">
                    <div class="card-body">

                        <!-- Login -->
                        <form action="verify_reportLogin.php" method="POST">
                            <div class="form-group">
                               <h3 class="text-center"> Login</h3>
                                <br>
                                <i class="material-icons">person</i>
                                <input type="text" class="form-control m-b-10" placeholder="Enter sdrn" name="sdrn" required>
                                <i class="material-icons">lock</i>


                                <input type="password" class="form-control m-b-10" placeholder="Enter Password" name="Password" required>

                            <a href="#" class="card-link d-flex justify-content-center">Forgot Password?</a>
                            <br>
                            <button type="submit" class="btn btn-primary btn-lg btn-block m-b-10">Login</button>
                            </div>
                        </form>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-4">
            </div>


        </div>

    </div>

    <br><br><br><br>
</body>

</html>
