<?php
 


        ////////////////////////////////////////////////
        //generate_pdf

        if(isset($_POST["generate_pdf"])) {  
        require_once('tcpdf/tcpdf_min/tcpdf.php');  
        //require_once('Sample/book_chapter.php');  
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("Book Chapter Records in pdf :");  
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
        $obj_pdf->SetDefaultMonospacedFont('helvetica');  
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '7', PDF_MARGIN_RIGHT);  
        $obj_pdf->setPrintHeader(false);  
        $obj_pdf->setPrintFooter(false);  
        $obj_pdf->SetAutoPageBreak(TRUE, 10);  
        $obj_pdf->SetFont('helvetica', '', 12);  
        $obj_pdf->AddPage();  
        $content = '';  
        $content .= '  
        <h3 align="center">Book Chapter Records</h3><br /><br />  
        <table border="1" cellspacing="0" cellpadding="0">  
        <tr>  
            <th width="10%">Faculty Name</th>  
            <th width="10%">Chapter Name</th>
            <th width="10%">Book Name</th>
            <th width="10%"> Publisher Name</th>  
            <th width="10%">ISBN No.</th>  
            <th width="15%">Year</th>  
        </tr> ';  
        $content .= fetch_chapter();  
        $content .= '</table>';  
        $obj_pdf->writeHTML($content);  
        $obj_pdf->Output('sample.pdf', 'I');  
    
}  
?>  


<!DOCTYPE html>  
<html>  
    <head>  
        <title>Faculty Management Publication</title>  
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      
	    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   

        <style>
            #name{
                background : green;
                color : white;
                width : 120px;
                height : 30px;
            }
            
        </style>         
    </head>  

    <body>  
    <header>
    <nav id="header-nav" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <div class="navbar-brand">
            <p class="nav-brand text-center" >All Publication Records</p>
          </div>

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        
        <div id="collapsable-nav" class="navbar-collapse collapse-in" aria-expanded="false" >
           <ul id="nav-list" class="nav navbar-navv visible-xs">
            <li><a href="#show_chapter" class="text-center">Book Chapter Records</a>
            </li>      
            <hr>      
            <li>
              <a href="#display_patent" class="text-center">Patent Records</a>
              
            </li>
            <hr>
            <li>
              <a href="#display_copyright" class="text-center">Copyright Records</a>
              
            </li>
            <hr>
            <li>
              <a href="#display_publication" class="text-center">Book Publication Records</a>
              
            </li>
            <hr>
            <li>
              <a href="#display_journal" class="text-center">Journal Records</a>
              
            </li>
            <hr>
            <li >
              <a href="#display_conference" class="text-center">Conference Records</a>
            </li>
            
          </ul> 
        </div>
      </div>
    </nav>
  	</header>
    <input type="button" value="Go Back!" onclick="history.back(-1)" />
    <?php
        $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
        echo "<a href='$url'>back</a>"; 
    
   
   

?>
        <div class="container" style="overflow : visible; width=100%" id="display_chapter" name="display_chapter">
            <h3 >Book Chapter Records</h3>
            <form method="post">  
                <input type="submit" name="generate_pdf" class="btn btn-danger" value="Generate PDF" id="name" />  
            </form>  
            <br />
            <div class="table-responsive">  
                <table class="table table-bordered" >  
                <tr>  
                    <th width="20%">SDRN</th>  
                    <th width="20%">Faculty Name</th>
                    <th width="20%">Author Name</th>  
                    <th width="20%">Author Name 2</th>  
                    <th width="20%">Author Name 3</th>  
                    <th width="20%">Author Name 4</th>    
                    <th width="20%">Chapter Name</th>
                    <th width="20%">Book Name</th>
                    <th width="20%"> Publisher Name</th> 
                    <th width="20%">Through Conference/ Journal</th>   
                    <th width="10%">ISBN/ ISSN No.</th>  
                    <th width="15%">Year</th>  
                    <th width="20%">Option 1</th>  
                    <th width="20%">Option 2</th>  
                    <th width="20%">Option 3 </th>  
                </tr>  
                <?php  
               
                     function fetch_chapter(){  
                      $output = '';  
                      $connect = mysqli_connect("localhost", "root", "", "test");  
                      $sql = "SELECT * FROM book_chapter ";  
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
                              <td>'.$row["year"].'</td>  
                              <td>'.$row["opt1"].'</td>
                              <td>'.$row["opt2"].'</td>    
                              <td>'.$row["opt3"].'</td>  
              
                          </tr> ';  
                      }  
                      return $output;  
                  }
                  echo fetch_chapter();  
                ?>  
                </table>  
                <br />
            </div>  
        </div>
       <hr>
       

        <!--Patent Records -->
        <!--////////////////////////////////////////////-->

        <div class="container" style="overflow : visible; width=100%" name="display_patent" id="display_patent">
            <h3 >Patent Records</h3>
            <form method="post">  
                <input type="submit" name="generate_pdf" class="btn btn-danger" value="Generate PDF" id="name" />  
            </form>  
            <br />
            <div class="table-responsive">  
                <table class="table table-bordered" >  
                <tr>  
                    <th width="20%">SDRN</th>  
                    <th width="20%">Faculty Name</th>
                    <th width="20%">Author Name</th>  
                    <th width="20%">Author Name 2</th>  
                    <th width="20%">Author Name 3</th>  
                    <th width="20%">Author Name 4</th>    
                    <th width="20%">Designation</th>
                    <th width="20%">Patent</th>
                    <th width="20%">Title</th>
                    <th width="20%"> Application No.</th> 
                    <th width="20%">Status</th>   
                    <th width="10%">Registeration Amount</th>  
                    <th width="10%">Amount Funded</th>  
                    <th width="10%">Registeratnion Date</th>  
                    <th width="20%">Option 1</th>  
                    <th width="20%">Option 2</th>  
                    <th width="20%">Option 3 </th>  
                </tr>  
                <?php  
                     function fetch_patent(){  
                      $output = '';  
                      $connect = mysqli_connect("localhost", "root", "", "test");  
                      $sql = "SELECT * FROM patent ";  
                      $result = mysqli_query($connect, $sql);  
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
                              <td>'.$row["opt2"].'</td>    
                              <td>'.$row["opt3"].'</td>  
              
                          </tr> ';  
                      }  
                      return $output;  
                  }  
                  echo fetch_patent();  
                ?>  
                </table>  
                <br />
            </div>  
        </div>
       <br><br>
       <hr style="color:blue">

        <!--Copyright Records -->
        <!--////////////////////////////////////////////-->

        <div class="container" style="overflow : visible; width=100%" name="display_copyright" id="display_copyright">
            <h3 >Copyright Records</h3>
            <form method="post">  
                <input type="submit" name="generate_pdf" class="btn btn-danger" value="Generate PDF" id="name" />  
            </form>  
            <br />
            <div class="table-responsive">  
                <table class="table table-bordered" >  
                <tr>  
                    <th width="20%">SDRN</th>  
                    <th width="20%">Faculty Name</th>
                    <th width="20%">Author Name</th>  
                    <th width="20%">Author Name 2</th>  
                    <th width="20%">Author Name 3</th>  
                    <th width="20%">Author Name 4</th>    
                    <th width="20%">Designation</th>
                    <th width="20%">Copyright</th>
                    <th width="20%">Title</th>
                    <th width="20%"> Application No.</th> 
                    <th width="20%">Status</th>   
                    <th width="10%">Registeration Amount</th>  
                    <th width="10%">Amount Funded</th>  
                    <th width="10%">Registeratnion Date</th>  
                    <th width="20%">Option 1</th>  
                    <th width="20%">Option 2</th>  
                    <th width="20%">Option 3 </th>  
                </tr>  
                <?php  
                     function fetch_copyright(){  
                      $output = '';  
                      $connect = mysqli_connect("localhost", "root", "", "test");  
                      $sql = "SELECT * FROM copyright";  
                      $result = mysqli_query($connect, $sql);  
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
                              <td>'.$row["opt2"].'</td>    
                              <td>'.$row["opt3"].'</td>  
              
                          </tr> ';  
                      }  
                      return $output;  
                  }  
                  echo fetch_copyright();  
                ?>  
                </table>  
                <br /> 
            </div>  
        </div>
        <br><br><hr>

        <!--Journal Records -->
        <!--////////////////////////////////////////////-->

        <div class="container" style="overflow : visible; width=100%" name="display_journal" id="display_journal">
            <h3 >Journal Records</h3>
            <form method="post">  
                <input type="submit" name="generate_pdf" class="btn btn-danger" value="Generate PDF" id="name" />  
            </form>  
            <br />
            <div class="table-responsive">  
                <table class="table table-bordered" >  
                <tr>  
                    <th width="20%">SDRN</th>  
                    <th width="20%">Author Name</th>  
                    <th width="20%">Author Name 2</th>  
                    <th width="20%">Author Name 3</th>  
                    <th width="20%">Author Name 4</th>    
                    <th width="20%">Paper Title</th>
                    <th width="20%">Journal Name</th>
                    <th width="20%">Volume No.</th>
                    <th width="20%"> Page No.</th> 
                    <th width="20%">ISBN No.</th>   
                    <th width="20%">DOI</th>   
                    <th width="20%">Year</th>   
                    <th width="20%">Indexed In</th> 
                    <th width="20%">Number of Times Cited</th>     
                    <th width="10%">Registeration Amount</th>  
                    <th width="10%">Amount Sanctioned</th>  
                    <th width="10%">Awards</th>  
                    <th width="20%">Option 1</th>  
                    <th width="20%">Option 2</th>  
                    <th width="20%">Option 3 </th>  
                </tr>  
                <?php  
                     function fetch_journal(){  
                      $output = '';  
                      $connect = mysqli_connect("localhost", "root", "", "test");  
                      $sql = "SELECT * FROM copyright";  
                      $result = mysqli_query($connect, $sql);  
                      while($row = mysqli_fetch_array($result)){       
                          $output .= '<tr>  
                              <td>'.$row["sdrn"].'</td>
                              <td>'.$row["faculty_name"].'</td>  
                              <td>'.$row["author1"].'</td>  
                              <td>'.$row["author2"].'</td>  
                              <td>'.$row["author3"].'</td>  
                              <td>'.$row["author4"].'</td>  
                              <td>'.$row["pege_title"].'</td>  
                              <td>'.$row["journal_name"].'</td>  
                              <td>'.$row["volume_no"].'</td>
                              <td>'.$row["page_no"].'</td>
                              <td>'.$row["isbn_no"].'</td>  
                              <td>'.$row["doi"].'</td>  
                              <td>'.$row["year"].'</td>  
                              <td>'.$row["indexed_in"].'</td>  
                              <td>'.$row["reg_amount"].'</td>  
                              <td>'.$row["amount_sanctioned"].'</td>  
                              <td>'.$row["reg_date"].'</td>  
                              <td>'.$row["opt1"].'</td>
                              <td>'.$row["opt2"].'</td>    
                              <td>'.$row["opt3"].'</td>  
              
                          </tr> ';  
                      }  
                      return $output;  
                  }  
                  echo fetch_journal();  
                ?>  
                </table>  
                <br /> 
            </div>  
        </div>
        <br><br><br>
    </body>  
</html>
