<!DOCTYPE html>
<html lang="en">
<head>
<?php
@session_start();

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Report generation</title>

    <style>
    .table{
	width: 100%;
    border-collapse: collapse;
    margin-right : 2%;

    }
    .table td,.table th{
    padding:12px 15px;
    border:1px solid black;
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
  <!--------------------------------------------------- Individual Data------------------------------------------->
  <div style=" float:right ">
		<form class="form-inline my-2 my-lg-0">
        <a href="Report_login.php" class="btn btn-info ">
          <span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </form>
    </div>

  <div  style="margin: 5%">
  <h3><center>Individual Report</center></h3><br>
   <form method="POST">
   <select id="individual" name="individual"  style="margin-right:20px">
   <option >--Select Faculty Name--</option>
    <?php
    include("../Details_collection/dropdown.php");
    ?>
    </select>
    <label style="margin-right:10px">From Date: </label><input type="date" name="from" style="margin-right:20px">
    <label style="margin-right:10px">To Date: </label><input type="date" name="to" style="margin-right:20px">
    <input type="submit" id="search" name="search_individual" value="search">

    </form>
    <input type="submit" id="pdf_individual" onClick="createPdf()" name="pdf_individual" value="Convert to PDF">
    <button name="create_excel" id="btnExport" class="btn btn-success">Create Excel File</button>
   <br><hr>

   <div id="tab">

    <?php
      if(isset($_POST['search_individual'])){
   echo '<div class="table-responsive">
          <table class="table table-bordered" >
          <tr>
            <th>SDRN</th>
            <th>Faculty Name</th>
            <th>Author Name</th>
            <th>Author Name 2</th>
            <th>Author Name 3</th>
            <th>Author Name 4</th>
            <th>Chapter Name</th>
            <th>Book Name</th>
            <th>Through Conference/ Journal</th>
            <th> Publisher Name</th>
            <th>ISBN/ ISSN No.</th>
            <th>Year</th>
            <th>Category</th>
          </tr> ';


          function individual_chapter(){
            $name = $_POST['individual'];
            $from=date('Y-m-d',strtotime($_POST['from']));
            $to=date('Y-m-d',strtotime($_POST['to']));
            echo "<p><center> Records of <b>$name</b> from date <b>$from to $to </b>are :</center></p> <br>";
            echo "<p>Book Chapter Records</p>";
            $output = '';
            $connect = mysqli_connect("localhost", "root", "", "test");
            $sql = "SELECT * FROM book_chapter where faculty_name = '$name' and publication_year between '$from' and '$to'";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_array($result)){
              $output .= '<tr>
                            <td>'.$row["sdrn"].'</td>
                            <td>'.$row["faculty_name"].'</td>
                            <td>'.$row["author1"].'</td>
                            <td>'.$row["author2"].'</td>
                            <td>'.$row["author3"].'</td>
                            <td>'.$row["author4"].'</td>
                            <td>'.$row["chapter_name"].'</td>
                            <td>'.$row["book_name"].'</td>
                            <td>'.$row["through"].'</td>
                            <td>'.$row["publisher_name"].'</td>
                            <td>'.$row["isbn_no"].'</td>
                            <td>'.$row["publication_year"].'</td>
                            <td>'.$row["opt1"].'</td>
                          </tr> ';
              }
              return $output;
            }
            echo individual_chapter();

            echo '</table>  </div><br />';




          //////////////////////////////////////////////////////Book Publications////////////////////////////////////////////////////
           echo '<div class="table-responsive">
          <table class="table table-bordered" >
          <tr>
            <th>SDRN</th>
            <th>Faculty Name</th>
            <th>Author Name</th>
            <th>Author Name 2</th>
            <th>Author Name 3</th>
            <th>Author Name 4</th>

            <th>Book Name</th>

            <th> Publisher Name</th>
            <th>ISBN/ ISSN No.</th>
            <th>Year</th>
            <th>Category</th>
          </tr>  ';

          function individual_publication(){
            $name1 = $_POST['individual'];
            $from=date('Y-m-d',strtotime($_POST['from']));
    		  $to=date('Y-m-d',strtotime($_POST['to']));
            echo "<p>Book publication Records</p>";
            $output1 = '';
            $connect = mysqli_connect("localhost", "root", "", "test");
            $sql1 = "SELECT * FROM book_publication where faculty_name1 = '$name1' and year between '$from' and '$to'";
            $result1 = mysqli_query($connect, $sql1);
            while($row = mysqli_fetch_array($result1)){
              $output1 .= '<tr>
                            <td>'.$row["sdrn"].'</td>
                            <td>'.$row["faculty_name1"].'</td>
                            <td>'.$row["author1"].'</td>
                            <td>'.$row["author2"].'</td>
                            <td>'.$row["author3"].'</td>
                            <td>'.$row["author4"].'</td>

                            <td>'.$row["book_name"].'</td>

                            <td>'.$row["publisher_name"].'</td>
                            <td>'.$row["isbn_no"].'</td>
                            <td>'.$row["year"].'</td>
                            <td>'.$row["opt1"].'</td>
                          </tr> ';
              }
              return $output1;
            }
            echo individual_publication();
            echo '</table>  </div><br />';


////////////////////////////////////////////////////// Patent ////////////////////////////////////////////////////////////////
echo'<div class="table-responsive">
      <table class="table table-bordered" >
      <tr>
        <th>SDRN</th>
        <th>Faculty Name</th>
        <th>Author Name</th>
        <th>Author Name 2</th>
        <th>Author Name 3</th>
        <th>Author Name 4</th>
        <th>Designation</th>
        <th>Patent</th>
        <th>Title</th>
        <th>Application No.</th>
        <th>Status</th>
        <th>Registration Amount</th>
        <th>Amount Funded</th>
        <th>Registeration Date</th>
        <th>Category</th>
      </tr>  ';

      function individual_PatentData(){
        $name = $_POST['individual'];
        $from=date('Y-m-d',strtotime($_POST['from']));
        $to=date('Y-m-d',strtotime($_POST['to']));
        echo "<p>Patent Records</p>";
        $output2 = '';
        $connect = mysqli_connect("localhost", "root", "", "test");
        $sql = "SELECT * FROM patent where faculty_name = '$name' and reg_date between '$from' and '$to'";
          $result = mysqli_query($connect, $sql);
          while($row = mysqli_fetch_array($result)){
            $output2 .= '<tr>
              <td>'.$row["sdrn"].'</td>
              <td>'.$row["faculty_name"].'</td>
              <td>'.$row["author1"].'</td>
              <td>'.$row["author2"].'</td>
              <td>'.$row["author3"].'</td>
              <td>'.$row["author4"].'</td>
              <td>'.$row["designation"].'</td>
              <td>'.$row["patent"].'</td>
              <td>'.$row["title"].'</td>
              <td>'.$row["application_no"].'</td>
              <td>'.$row["status"].'</td>
              <td>'.$row["reg_amount"].'</td>
              <td>'.$row["amount_funded"].'</td>
              <td>'.$row["reg_date"].'</td>
              <td>'.$row["opt1"].'</td>
            </tr> ';
    }
return $output2;
    }
echo individual_PatentData();
echo'</table></div><br>';


////////////////////////////////////////////////////// Copyright ////////////////////////////////////////////////////////////////
echo'<div class="table-responsive">
      <table class="table table-bordered" >
      <tr>
        <th>SDRN</th>
        <th>Faculty Name</th>
        <th>Author Name</th>
        <th>Author Name 2</th>
        <th>Author Name 3</th>
        <th>Author Name 4</th>
        <th>Designation</th>
        <th>Copyright</th>
        <th>Title</th>
        <th> Application No.</th>
        <th>Status</th>
        <th>Registration Amount</th>
        <th>Amount Funded</th>
        <th>Registration Date</th>
        <th>Category</th>
      </tr>  ';

      function individual_CopyrightData(){
        $name = $_POST['individual'];
        $from=date('Y-m-d',strtotime($_POST['from']));
        $to=date('Y-m-d',strtotime($_POST['to']));
        echo "<p>Copyright Records</p>";
        $output3 = '';
        $connect = mysqli_connect("localhost", "root", "", "test");
        $sql = "SELECT * FROM copyright where faculty_name = '$name'  and reg_date between '$from' and '$to'";
          $result = mysqli_query($connect, $sql);
          while($row = mysqli_fetch_array($result)){
            $output3 .= '<tr>
              <td>'.$row["sdrn"].'</td>
              <td>'.$row["faculty_name"].'</td>
              <td>'.$row["author1"].'</td>
              <td>'.$row["author2"].'</td>
              <td>'.$row["author3"].'</td>
              <td>'.$row["author4"].'</td>
              <td>'.$row["designation"].'</td>
              <td>'.$row["copyright"].'</td>
              <td>'.$row["title"].'</td>
              <td>'.$row["application_no"].'</td>
              <td>'.$row["status"].'</td>
              <td>'.$row["reg_amount"].'</td>
              <td>'.$row["amount_funded"].'</td>
              <td>'.$row["reg_date"].'</td>
              <td>'.$row["opt1"].'</td>
            </tr> ';
    }
return $output3;
    }
echo individual_CopyrightData();
echo'</table></div><br>';

////////////////////////////////////////////////////// Journal ////////////////////////////////////////////////////////////////
echo'<div class="table-responsive">

      <table class="table table-bordered" >
      <tr>
        <th>SDRN</th>
        <th>Faculty Name</th>
        <th>Author Name</th>
        <th>Author Name 2</th>
        <th>Author Name 3</th>
        <th>Author Name 4</th>
        <th>Paper Title</th>
        <th>Journal Name</th>
        <th>Volume No.</th>
        <th>Page No.</th>
        <th> ISBN/ISSN No.</th>
        <th>DOI</th>
        <th>Publication Year</th>
        <th>NTNL/INTNL</th>
        <th>Indexed in IEEE</th>
        <th>No. of Times Cited</th>
        <th>Registration Amount</th>
        <th>Amount Sanctioned</th>
        <th>Awards</th>
        <th>Category</th>
      </tr>  ';

      function individual_JournalData(){
        $name = $_POST['individual'];
        $from=date('Y-m-d',strtotime($_POST['from']));
        $to=date('Y-m-d',strtotime($_POST['to']));
        echo "<p>Journal Records :</p>";
        $output4 = '';
        $connect = mysqli_connect("localhost", "root", "", "test");
        $sql = "SELECT * FROM journal where faculty_name = '$name' and year between '$from' and '$to'";
          $result = mysqli_query($connect, $sql);
          while($row = mysqli_fetch_array($result)){
            $output4 .= '<tr>
              <td>'.$row["sdrn"].'</td>
              <td>'.$row["faculty_name"].'</td>
              <td>'.$row["author1"].'</td>
              <td>'.$row["author2"].'</td>
              <td>'.$row["author3"].'</td>
              <td>'.$row["author4"].'</td>
              <td>'.$row["page_title"].'</td>
              <td>'.$row["journal_name"].'</td>
              <td>'.$row["volume_no"].'</td>
              <td>'.$row["page_no"].'</td>
              <td>'.$row["isbn_no"].'</td>
              <td>'.$row["doi"].'</td>
              <td>'.$row["year"].'</td>
              <td>'.$row["ntnl_no"].'</td>
              <td>'.$row["indexed_in"].'</td>
              <td>'.$row["no_of_times"].'</td>
              <td>'.$row["reg_amount"].'</td>
              <td>'.$row["amount_sanctioned"].'</td>
              <td>'.$row["awards"].'</td>
              <td>'.$row["opt1"].'</td>
            </tr> ';
    }
return $output4;
    }
echo individual_journalData();
echo'</table></div><br>';

  ////////////////////////////////////////////////////// Conferences ////////////////////////////////////////////////////////////////
echo'<div class="table-responsive">

      <table class="table table-bordered" >
      <tr>
        <th>SDRN</th>
        <th>Faculty Name</th>
        <th>Author Name</th>
        <th>Author Name 2</th>
        <th>Author Name 3</th>
        <th>Author Name 4</th>
        <th>Paper Title</th>
        <th>Conference Name</th>
        <th>Conference Place</th>
        <th>Conference Date</th>
        <th>NTNL/INTNL</th>
        <th>ISBN/ISSN No.</th>
        <th>DOI</th>
        <th>Publication Year</th>
        <th>Indexed in IEEE</th>
        <th>No. of Times Cited</th>
        <th>Registration Amount</th>
        <th>Amount Sanctioned</th>
        <th>Presented Personally</th>
        <th>Awards</th>
        <th>Category</th>
      </tr>  ';

      function individual_ConferenceData(){
        $name = $_POST['individual'];
        $from=date('Y-m-d',strtotime($_POST['from']));
        $to=date('Y-m-d',strtotime($_POST['to']));
        echo "<p>Conference Records</p>";
        $output5 = '';
        $connect = mysqli_connect("localhost", "root", "", "test");
        $sql = "SELECT * FROM conference where faculty_name = '$name' and year between '$from' and '$to'";
          $result = mysqli_query($connect, $sql);
          while($row = mysqli_fetch_array($result)){
            $output5 .= '<tr>
              <td>'.$row["sdrn"].'</td>
              <td>'.$row["faculty_name"].'</td>
              <td>'.$row["author1"].'</td>
              <td>'.$row["author2"].'</td>
              <td>'.$row["author3"].'</td>
              <td>'.$row["author4"].'</td>
              <td>'.$row["paper_title"].'</td>
              <td>'.$row["con_name"].'</td>
              <td>'.$row["con_place"].'</td>
              <td>'.$row["con_date"].'</td>
              <td>'.$row["ntnl_no"].'</td>
              <td>'.$row["isbn_no"].'</td>
              <td>'.$row["doi"].'</td>
              <td>'.$row["year"].'</td>
              <td>'.$row["indexed_in"].'</td>
              <td>'.$row["no_of_times"].'</td>
              <td>'.$row["reg_amount"].'</td>
              <td>'.$row["amount_sanctioned"].'</td>
              <td>'.$row["presented_personally"].'</td>
              <td>'.$row["awards"].'</td>
              <td>'.$row["opt1"].'</td>
            </tr> ';
    }
return $output5;
    }
echo individual_ConferenceData();
echo'</table></div><br>';
}


?>
</div>
</div>
</body>

<script>
function createPdf(){
    var sTab=document.getElementById('tab').innerHTML;
    //var Tab2=document.getElementById('tab2').innerHTML;
    var style="<style>";
    style = style + "table{ width : 100%; font: 17px Calibri;}"
    style = style + "table,th,td{border: solid 1px black; border-collapse : collapse;";
    style = style + "padding : 2px 3px; text-align: center;}";
    style = style + "</style>";
    var win=window.open(",","height=700,width=700");
    win.document.write('<html><head>');
    win.document.write('<title>Report Genaration</title>');
    win.document.write(style);
    win.document.write('</head>');
    win.document.write('<body>');
    win.document.write(sTab);
    //win.document.write(Tab2);
    win.document.write('</body>');
    win.document.close();
    win.print();
}
</script>


<script type="text/javascript">
$("#btnExport").click(function(e) {
window.open('data:application/vnd.ms-excel,' +
encodeURIComponent($('#tab').html()));
e.preventDefault();
});
</script>
</html>
