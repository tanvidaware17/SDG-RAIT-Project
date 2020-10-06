<!DOCTYPE html>
<html lang="en">
<head>
<?php
@session_start();
if (isset($_SESSION['sdrn'])){

        $sdrn = $_SESSION['sdrn'];


}

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Faculty publication Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Sample/css/internal_css.css">
    <link rel="stylesheet" href="../Sample/css/util.css">


    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        *{
            box-sizing: border-box;
        }

        button{
            margin:10px;
            width: 250px;
            height: 50px;
            border-radius:5px;
    background-color:#e0760b;

    border:1px solid #fff;
    color:#fff;
            font-size: 16px;

            padding: 5px;
            box-shadow: 5px 5px 5px #173459;

        }

        button:hover{
            background-color: #f7b417;
            border: 1px solid white;
            border-radius: 30px;
        }

        a{
            text-decoration: none;
            color: maroon;
            font-size:16px;
        }
        a:hover{
            color:black;
            text-decoration:none;
        }
       hr{
          height:5px;
           color:gold;
       }
        </style>




</head>
<body>
    <div style="padding: 10px; border: 1px solid black; float:right ">
		<form class="form-inline my-2 my-lg-0">
        <a href="Report_login.php" class="btn btn-info ">
          <span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </form>
    </div>
   <div style="height:100px; background-color:#fcc84e; padding:30px;border-bottom:2px solid #006400">
    <h2 class="text-center" style=" margin-bottom: 3%; color:#006400"><b>Faculty Publications Management Tool..!</b></h2>
    <p class="text-center" style="font-size: 20px; margin-top: 2%;">Report Generation</p>
    </div><hr>
    <br>

        <!-- Categories -->
        <div class="container ">
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <div class="card" id="chapterCard">
                        <div class="card-body" >
                        <center>
      <button type="button">
        <a href="All_report.php"  target="_blank"><b>All Report</b></a>
      </button><br>
      <button>
        <a href="Monthly_report.php"  target="_blank"><b>Monthly Report</b></a>
    </button><br>
      <button>
        <a href="Yearly_report.php"  target="_blank"><b>Yearly Report</b></a></button><br>

        <button>
        <a href="individual_report.php"  target="_blank"><b>Individual Report</b></a></button><br>

        <button>
        <a href="Report_page.php"  target="_blank"><b>Datewise Report</b></a></button><br>

        <button>
        <a href="../Expenditure/expenditure.php"  target="_blank"><b>Expenditure</b></a></button><br>


        </center>
    </div>

            </div>
        </div>
    </div>
  </div>
</body>
</html>
