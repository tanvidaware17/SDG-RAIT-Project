<!DOCTYPE html>
<html lang="en">
<head>
<?php 
@session_start();
if (isset($_SESSION['sdrn'])){
    
        $sdrn = $_SESSION['sdrn'];
        $First_name= $_SESSION['First_name'];
   
}

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Faculty publication Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/util.css">

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


     <style>
         button{
           
            width: 300px;
            height: 90px;
            margin-bottom: 20px;
            box-shadow: 5px 5px 5px #173459;

         }
     </style>

     
 
</head>
<body>
    <div style="padding: 10px; border: 1px solid black; float:right ">
		<form class="form-inline my-2 my-lg-0">
        <a href="../login.php" class="btn btn-info ">
          <span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </form>
    </div>
   
    <p class="text-center" style="font-size: 50px; margin-top: 2%;">Faculty Publication Management.!</p>
   
    
    <!-- Categories -->

    
        <div class="jumbotron text-center" style="background-color:transparent">
            <div class="btn-group text-center">
                <div class="row" style="width: 50%;">
                   
                    <div class="col-lg-6"><button type="button" class="btn" style="background-color: aqua;">
                        <a href="book_chapter.php" class="btn" target="_blank"><b>BOOK CHAPTER</b></a>
                    </button></div>

                    <div class="col-lg-6"><button type="button" class="btn" style="background-color: aqua;" >
                        <a href="patent.php" class="btn" target="_blank"><b>PATENT</b></a>
                    </button></div>

                    <div class="col-lg-6"><button type="button" class="btn" style="background-color: aqua;">
                        <a href="copyright.php" class="btn" target="_blank"><b>COPYRIGHT</b></a>
                        </button></div>
                   
                    <div class="col-lg-6"><button type="button" class="btn" style="background-color: aqua;">
                    <a href="book_publication.php" class="btn" target="_blank"><b>BOOK PUBLICATION</b></a>
                    </button></div>
                    

                    <div class="col-lg-6"><button type="button" class="btn" style="background-color: aqua;">
                        <a href="journals.php" class="btn" target="_blank"><b>JOURNALS</b></a>
                    </button></div>
                    

                    <div class="col-lg-6"><button type="button" class="btn" style="background-color: aqua;">
                        <a href="conference.php" class="btn" target="_blank"><b>CONFERENCE</b></a>
                    </button></div>
                    

                    <div class="col-lg-6"><button type="submit" class="btn" style="background-color: aqua">
                        <a href="../Details_show/test.php" target="_blank" class="btn"><b>SHOW ALL PUBLICATIONS</b></a>
                    </button></div>

                    <div class="col-lg-6"><button type="submit" class="btn" style="background-color: aqua">
                        <a href="../Generate_Report" target="_blank" class="btn"><b>REPORT GENERATION</b></a>
                    </button></div>
                   
    

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
