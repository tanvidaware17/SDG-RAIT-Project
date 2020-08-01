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
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/util.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Faculty Publication Management</title>
    <style>
    .table{
	width: 100%;
    border-collapse: collapse;
    }
    .table td,.table th{
    padding:12px 15px;
    border:1px solid blue;
    text-align: center;
    font-size:14px;
    }
    .table th{
	    background-color: darkblue;
	    color:#ffffff;
    }
    .table tbody tr:nth-child(even){
	    background-color: #f5f5f5;
    }
    </style>
</head>

<body>
    <div class= "container" style="overflow : visible;width=100%" id="display_chapter" name="display_chapter">
    <h3 style="margin-top :2%; text-align :center">Book Publication Records</h3>
            <form method="post">  
                <input type="submit" name="generate_pdf"  value="Generate PDF" id="generate_pdf"/>  
            </form>  

            <form method="post">  
                <input type="submit" name="excel" value="Export to Excel" id="excel" />  
            </form>  
           
        <div style="margin:2%">  
        <table class="table table-responsive">
        <?php
        if (isset($_SESSION['sdrn'])){ 
            $id = $_SESSION['sdrn'];
            $conn = mysqli_connect("localhost", "root", "", "test");
            $sql = "SELECT * FROM book_publication where sdrn = $id";  
            $mysql_query= mysqli_query($conn, $sql);  
            echo "<thead>";
            echo "<tbody>";
            while($mysql_query_fields = mysqli_fetch_field($mysql_query)){
                $mysql_fields[] = $mysql_query_fields->name;
                echo "<th >".ucfirst($mysql_query_fields->name)."</th>";
            } 
            echo "</thead>";
            while($mysql_rows = mysqli_fetch_array($mysql_query)){
                echo "<tr>";
                foreach($mysql_fields as $fields){
                    echo "<td>".$mysql_rows[$fields]."</td>";
                }
                echo "</tr>";
            }
            echo " </tbody>";
        }
        ?>
        </table>
        <br>
        </div>  
        </div>
        <br>
       <hr>
</head>
<body>


