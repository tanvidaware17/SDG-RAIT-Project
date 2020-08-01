<!DOCTYPE html>
<html lang="en">
    <head>
    <?php 
@session_start();
if (isset($_SESSION['sdrn'])){
    
    $sdrn = $_SESSION['sdrn'];
    $First_name= $_SESSION['First_name'];
    $Middle_name= $_SESSION['Middle_name'];
    $Last_name= $_SESSION['Last_name'];

}
?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Faculty publication Management</title>

        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/util.css">

  
        <!-- Bootstrap JS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

         <!-- Fonts -->

        <style>
        label{
            font-weight : 300;
        }
        span{
         color:red;
         font-weight : bold;
        }
        </style>
    </head>

    <body>
   
    <input type="button" value="Go Back!" onclick="history.back(-1)" />
    <?php
        $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
        echo "<a href='$url'>back</a>"; 
    ?>
   
    
        <h2 class="text-center" style="margin-top:1%; margin-bottom: 2% ">Journals</h2>
        
        <!-- Categories -->
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <div class="card" style="width:100%; border:1px solid blue; border-radius:10px">
                        <div class="card-body" >

                        <!-- Login -->
                        <form action="chapter.php" method="POST">
                            <p class="text-center" style="margin-bottom: 2% ;font-weight: bold">All <span>*</span> marked fiels are compulsory</p>
                            <div class="form-group">
                            <label class="col-lg-4"><span>*</span> SDRN Number :</label>
                            <input type="text" class="form-control col-lg-8 m-b-10"  value="<?php echo $sdrn; ?>"  name="sdrn" disabled="disabled">   
                            <label class="col-lg-4"><span>*</span> Faculty Name :</label>
                            <input type="text" class="form-control col-lg-8 m-b-10" value=" <?php echo $First_name ;echo " "; echo $Middle_name; echo " "; echo $Last_name; ?>" name="faculty_name" disabled="disabled">
                            <label class="col-lg-4"><span>*</span> Authors Name :</label>
                            <select name="author1" value=" " id="ddlModels" class="form-control dropClass m-b-10 col-lg-8" onchange = "EnableDisableTextBox(this)" required>
                            <?php include("dropdown.php"); ?></select>
                            <div class="col-lg-4"></div>
                            <select name="author2"  value=" " onchange = "EnableDisableTextBox(this)" class="form-control dropClass m-b-10 col-lg-8" >
                            <?php include("dropdown.php"); ?></select>
                            <div class="col-lg-4"></div>
                            <select name="author3"  value=" " onchange = "EnableDisableTextBox(this)" class="form-control dropClass m-b-10 col-lg-8">
                            <?php include("dropdown.php"); ?></select>
                            <div class="col-lg-4"></div>
                            <select name="author4" value=" "  onchange = "EnableDisableTextBox(this)" class="form-control dropClass m-b-10 col-lg-8">
                            <?php include("dropdown.php"); ?></select> 
                            <label class="col-lg-4"> Other Author :</label>
                            <input type="text" value=" " class="form-control col-lg-8 m-b-10" id="txtOther" disabled="disabled" />
                            <label class="col-lg-4"><span>*</span> Title of paper :</label>
                            <input type="text" class="form-control col-lg-8 m-b-10" value=" " autocomplete="off" placeholder="Enter Title of paper here" name="page_title" required>
                            <label class="col-lg-4"><span>*</span> Journal Name :</label>
                            <input type="text" class="form-control col-lg-8 m-b-10" value=" " autocomplete="off" placeholder="Enter Journal Name here" name="journal_name" required>
                            <label class="col-lg-4"><span>*</span> Volume Number :</label>
                            <input type="number" class="form-control col-lg-8 m-b-10" value=" " autocomplete="off" placeholder="Enter Volume Number here" name="volume_no" required>
                            <label class="col-lg-4"><span>*</span> Page Number :</label>
                            <input type="number" class="form-control col-lg-8 m-b-10" value=" " autocomplete="off" placeholder="Enter Page Number here" name="page_no" required>
                            <label class="col-lg-4"><span>*</span> ISBN/ISSN/ACCN Number :</label>
                            <input type="text" class="form-control col-lg-8 m-b-10" value=" " autocomplete="off" placeholder="Enter ISBN/ISSN/ACCN no. here" name="isbn_no" required>
                            <label class="col-lg-4"><span>*</span> DOI :</label>
                            <input type="text" class="form-control col-lg-8 m-b-10" value=" " placeholder="DOI" name="doi" required>

                            <label class="col-lg-4"><span>*</span> Year of Publication :</label>
                            <input type="date" class="form-control col-lg-8 m-b-10" value=" " name="year" required>
                            <label class="col-lg-4"><span>*</span> Ntnl/Intnl :</label>
                            <input type="text" class="form-control col-lg-8 m-b-10" value=" " autocomplete="off" placeholder="Enter Ntnl/Intnl here" name="ntnl_no" required>
                            <label class="col-lg-4"><span>*</span> Indexed in IEEE Explorer :</label>
                            <input type="text" class="form-control col-lg-8 m-b-10" value=" " autocomplete="off" placeholder="Indexed in IEEE Explorer/ Scopus/..." name="indexed_in" required>
                            <label class="col-lg-4"><span>*</span> No. of Times Cited :</label>
                            <input type="number" class="form-control col-lg-8 m-b-10" value=" " placeholder="Enter No. of Times Cited here" name="no_of_times" required>
                            <label class="col-lg-4"><span>*</span> Registration Amount :</label>
                            <input type="number" class="form-control col-lg-8 m-b-10" value=" " placeholder="Enter Registration Amount here" name="reg_amount" required>
                            <label class="col-lg-4"><span>*</span> Amount Sanctioned :</label>
                            <input type="number" class="form-control col-lg-8 m-b-10" value=" " placeholder="Enter Sanctioned Amount here" name="amount_sanctioned" required>
                            <label class="col-lg-4"><span>*</span> Awadrs :</label>
                            <textarea class= "form-control col-lg-8 m-b-10 " rows="3" value=" " autocomplete="off" placeholder="Enter Awards here.." name="awards"></textarea>
                            <label class="col-lg-4">  Option 1 :</label>
                            <textarea class= "form-control col-lg-8 m-b-10 " rows="3" value=" " autocomplete="off" placeholder="Enter option 1 here.." name="opt1"></textarea>
                            <label class="col-lg-4">  Option 2 :</label>
                            <textarea class= "form-control col-lg-8 m-b-10 " rows="3" value=" " autocomplete="off" placeholder="Enter option 2 here.." name="opt2"></textarea>
                            <label class="col-lg-4">  Option 3 :</label>
                            <textarea class= "form-control col-lg-8 m-b-10 " rows="3" value=" " autocomplete="off" placeholder="Enter option 3 here.." name="opt3"></textarea>
                            <button type="submit" class="btn btn-primary col-lg-4 btn-lg m-t-10" style="float: right ;clear:both" name="submit_journal">Submit</button>
                        </div>  
                    </form>
                    <form action="../verification/upload.php" method="POST">
                        <button type="submit" class="btn btn-primary col-lg-4 btn-lg m-t-10" style="float: right; clear:both" name="upload_proof">Upload Proofs</button>
                    </form>
                           
                </div>
            </div>
        <div class="col-lg-4">
        </div>
        <br>
        
        <div class="card" style="width:100%; border:1px solid blue; border-radius:10px">
                                <div class="card-body" >  
                              
                                <div class="col-lg-4"></div>
                                <form action="../Details_show/show_journal.php" method="POST">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="show_journal" >Show Journal Records</button> 
                              
                                
                                </form>
                                
                                
                          
                            </div>
                            </div>    
 
        </div>
    </div>
    </div> 
    <br>
    <br>
    </body>
</html>


