<!DOCTYPE html>
<html lang="en">
<?php
  @session_start();
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/internal_css.css">
    <link rel="stylesheet" href="../css/util.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <title>Report Generation</title>
</head>

<style>
    .table td,.table th{
    border:1px solid #006400;
  }
  #pdf_individual{
              background-color:#006400;
              border:1px solid #fff;
              color:#fff;
              margin-left:70px;
              margin-right:10px;
              }

              #btnExport{
              background-color:#006400;
              border:1px solid #fff;
              color:#fff;

              }
  </style>

<body>
<div style="padding: 10px; border: 1px solid black; float:right ">
		<form class="form-inline my-2 my-lg-0">
        <a href="Report_login.php" class="btn btn-info ">
          <span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </form>
    </div>
<div style="margin:2%">
<h3 id="heading"><center>Department Report</center></h3>


<input type="submit" id="pdf_individual" class="btn" onClick="createPdf()" name="pdf_individual" value="Convert to PDF">
<button name="create_excel" id="btnExport" class="btn btn-success">Create Excel File</button>

<div id="chapter" style="padding:3%">
<div id="allReport_tab">
<?php


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
    function ChapterData(){


    echo "<label> Book Chapter Records :</label><br>";
    $output = "";
    $conn = mysqli_connect("localhost", "root", "", "test");
    $sql =   "SELECT * from book_chapter ";
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
echo ChapterData();
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

    function PublicationData(){
        //$year1 = $_POST['year1'];
        $output = "";
        echo "<label> Book Publications Records :</label><br>";
        $conn = mysqli_connect("localhost", "root", "", "test");
        $sql =   "SELECT * from book_publication ";
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
echo PublicationData();
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

    function PatentData(){
      //$year1 = $_POST['year1'];
      $output = "";
      $conn = mysqli_connect("localhost", "root", "", "test");
      $sql =   "SELECT * from patent";
        echo"<label>Patent Records :</label><br>";

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
      echo PatentData();
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

    function CopyrightData(){
      //$year1 = $_POST['year1'];
      echo '<label> Copyright Records :</label><br>';
      $output = "";
      $conn = mysqli_connect("localhost", "root", "", "test");
      $sql =   "SELECT * from copyright ";
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
      echo CopyrightData();
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

    function JournalData(){
     // $year1 = $_POST['year1'];
      echo '<label> Journal Records :</label><br>';
      $output = "";
      $conn = mysqli_connect("localhost", "root", "", "test");
      $sql =   "SELECT * from journal";
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
      echo journalData();
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

    function ConferenceData(){
      //$year1 = $_POST['year1'];
      echo '<label> Conference Records :</label><br>';
      $output = "";
      $conn = mysqli_connect("localhost", "root", "", "test");
      $sql =   "SELECT * from conference";
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
      echo ConferenceData();
      echo'</table></div><br>';

?>
</div>
</div>

</div>
<br>
</body>

<script>
function createPdf(){
    var sTab=document.getElementById('allReport_tab').innerHTML;
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
encodeURIComponent($('#allReport_tab').html()));
e.preventDefault();
});
</script>
</html>
