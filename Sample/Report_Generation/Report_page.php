<!DOCTYPE html>
<html lang="en">
<?php
  @session_start();
  if (isset($_SESSION['sdrn'])){
    $sdrn = $_SESSION['sdrn'];

}
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <title>Report Generation</title>
</head>

<style>
 label {
    display: block;
    font: 1rem 'Fira Sans', sans-serif;
}

input, label {
    margin: .4rem 0;
}

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

<body>
<div style="padding: 10px; border: 1px solid black; float:right ">
		<form class="form-inline my-2 my-lg-0">
        <a href="Report_login.php" class="btn btn-info ">
          <span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </form>
    </div>
<div  style="margin: 5%">
<h3><center>Departmenal/All Report:</center></h3><br>
<form method="post">
<label style="margin-right:10px">From Date: </label><input type="date" name="from" style="margin-right:20px">
<label style="margin-right:10px">To Date: </label><input type="date" name="to" style="margin-right:20px">
<input type="submit" value="Submit" name="all_data">
  </form>
  <input type="submit" id="pdf_individual" onClick="createPdf()" name="pdf_individual" value="Convert to PDF">
  <button name="create_excel" id="btnExport" class="btn btn-success">Create Excel File</button>
   <br><hr>


<div id="DeptReport_tab">

<?php

    if(isset($_POST['all_data'])){
    //////////////////////////////////////////////////////Book Chapter////////////////////////////////////////////////////

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
            <th>Publication Year</th>
            <th>Category</th>
        </tr>  ';
    function all_ChapterData(){
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));

    echo "<p> Book Chapter Records :</p>";
    $output = "";
    $conn = mysqli_connect("localhost", "root", "", "test");
    $sql =   "SELECT * from book_chapter where publication_year between '$from' and '$to'";
    $result = mysqli_query($conn, $sql);
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
echo all_ChapterData();
echo'</table></div><br>';

    //////////////////////////////////////////////////////Book Publications////////////////////////////////////////////////////
    echo'<div class="table-responsive">
    <table class="table table-bordered" >
    <tr>
      <th>SDRN</th>
      <th>Faculty Name</th>
      <th>Author Name</th>
      <th>Author Name 2</th>
      <th>Author Name 3</th>
      <th>Author Name 4</th>
      <th>Book Name</th>
      <th>Publisher Name</th>
      <th>ISBN/ISSN No.</th>
      <th>Publication Year</th>
      <th>Category</th>
    </tr>  ';

    function all_PublicationData(){
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
        $output = "";
        echo "<p> Book Publications Records :</p>";
        $conn = mysqli_connect("localhost", "root", "", "test");
        $sql =   "SELECT * from book_publication  where year between '$from' and '$to'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
          $output .= '<tr>
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
return $output;
  }
echo all_PublicationData();
echo'</table></div><br>';


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

    function all_PatentData(){
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
      $output = "";
      $conn = mysqli_connect("localhost", "root", "", "test");
      $sql =   "SELECT * from patent  where reg_date between '$from' and '$to'" ;
        echo"<p>Patent Records :</p>";

        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
          $output .= '<tr>
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
        return $output;
      }
      echo all_PatentData();
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

    function all_CopyrightData(){
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
      echo '<p> Copyright Records :</p>';
      $output = "";
      $conn = mysqli_connect("localhost", "root", "", "test");
      $sql =   "SELECT * from copyright  where reg_date between '$from' and '$to'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
          $output .= '<tr>
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
        return $output;
      }
      echo all_CopyrightData();
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

    function all_JournalData(){
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
      echo '<p> Journal Records :</p>';
      $output = "";
      $conn = mysqli_connect("localhost", "root", "", "test");
      $sql =   "SELECT * from journal  where year between '$from' and '$to'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
          $output .= '<tr>
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
        return $output;
       }
      echo all_journalData();
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

    function all_ConferenceData(){
      $from=date('Y-m-d',strtotime($_POST['from']));
      $to=date('Y-m-d',strtotime($_POST['to']));
      echo '<p> Conference Records :</p>';
      $output = "";
      $conn = mysqli_connect("localhost", "root", "", "test");
      $sql =   "SELECT * from conference  where year between '$from' and '$to'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
          $output .= '<tr>
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
        return $output;
      }
      echo all_ConferenceData();
      echo'</table></div><br>';
    }
?>
</div>
</div>
</body>
<script>
function createPdf(){
    var sTab=document.getElementById('DeptReport_tab').innerHTML;
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
encodeURIComponent($('#DeptRreport_tab').html()));
e.preventDefault();
});
</script>
</html>
