<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<title>Pdf file upload: </title>


<body>
	<div style="padding: 20px; border: 1px solid #999; float:right ">
		<form class="form-inline my-2 my-lg-0">
        <a href="login.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Logout
        </a>
            </form>
        </div>

	
<div style="padding: 20px; border: 1px solid #999">


<h2>Upload Plagarism Report :</h2>
 
<form action="<?php print $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
	<label for="email">Enter a file name:</label>
      <input type="text" class="form-control" style="width: 400px ;margin-bottom:15px" id="name" placeholder="Enter a file name" name="name" autocomplete="off" required >
      <input type="submit" value="Submit" name="submit" required>
      <br>
      <br>
  Select file to upload:
  <input type="hidden" style="margin-bottom: 10px" accept=".pdf" name="fileToUpload" id="fileToUpload" required>
  <input type="file" style="margin-bottom: 10px" name="pdfFile" required />
  <input type="submit" style="margin-bottom: 10px" value="Upload Pdf" name="submit" required>
  
 
</form>

</form>
<br/>

</div>
<div style="padding: 20px; border: 1px solid #999">

<h2>Upload Paper :</h2>
<form action="<?php print $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="hidden"style="margin-bottom: 10px"  accept=".pdf" name="fileToUpload" id="fileToUpload" required>
  <input type="file" style="margin-bottom: 10px" name="pdfFile1" required/>
  <input type="submit" style="margin-bottom: 10px" value="Upload Pdf" name="submit" required>
 
  </form>

<br>
</div>
<div style="padding: 20px; border: 1px solid #999">

<h2>Upload Proof of Registration Fees :</h2>

<form action="<?php print $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
	<label for="email">Enter a registration amount:</label>
      <input type="number" class="form-control" style="width: 400px" id="name" placeholder="Registration amount" name="name" autocomplete="off"  required>
      <input type="submit" value="Submit" name="submit" required>
      <br>
      <br>
  Select file to upload:
  <input type="hidden" style="margin-bottom: 10px" accept=".pdf" name="fileToUpload" id="fileToUpload" required>
  <input type="file" style="margin-bottom: 10px" name="pdfFile2" required />
  <input type="submit" style="margin-bottom: 10px" value="Upload Pdf" name="submit" required>
  
</form>

<br>
</div>
<div style="padding: 20px; border: 1px solid #999">

<h2>Upload Approval Letter :</h2>
<form action="<?php print $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="hidden" style="margin-bottom: 10px" accept=".pdf" name="fileToUpload" id="fileToUpload" required>
  <input type="file" style="margin-bottom: 10px" name="pdfFile3" required />
  <input type="submit" style="margin-bottom: 10px" value="Upload Pdf" name="submit" required>
   <br>
  <br>
  </form>
  <form method="POST" action="../../secure_email_form.php">
  <div class="center">
    <input type="submit" value="Send Confirmation Mail" name="submit" required>
  </div>

   
</form>

</div>


</div>
</body>
</html>

<?php
if ( isset( $_FILES['pdfFile'] ) ) {
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$dest_file = "docs/plag/".$_FILES['pdfFile']['name'];

		if (file_exists($dest_file)) {
			print "The file name already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['pdfFile']['error'] == 0) {
				print "Pdf file uploaded successfully!";
				print "<b><u>Details : </u></b><br/>";
				print "File Name : ".$_FILES['pdfFile']['name']."<br.>"."<br/>";
				print "File Size : ".$_FILES['pdfFile']['size']." bytes"."<br/>";
				print "File location : docs/plag/".$_FILES['pdfFile']['name']."<br/>";
			}
		}
	}
	else {
		if ( $_FILES['pdfFile']['type'] != "application/pdf") {
			print "Error occured while uploading file : ".$_FILES['pdfFile']['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
			print "Error Code : ".$_FILES['pdfFile']['error']."<br/>";
		}
	}
}
?>
<?php
if ( isset( $_FILES['pdfFile1'] ) ) {
	if ($_FILES['pdfFile1']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile1']['tmp_name'];
		$dest_file = "docs/paper/".$_FILES['pdfFile1']['name'];

		if (file_exists($dest_file)) {
			print "The file name already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['pdfFile1']['error'] == 0) {
				print "Pdf file uploaded successfully!";
				print "<b><u>Details : </u></b><br/>";
				print "File Name : ".$_FILES['pdfFile1']['name']."<br.>"."<br/>";
				print "File Size : ".$_FILES['pdfFile1']['size']." bytes"."<br/>";
				print "File location : docs/paper/".$_FILES['pdfFile1']['name']."<br/>";
			}
		}
	}
	else {
		if ( $_FILES['pdfFile1']['type'] != "application/pdf") {
			print "Error occured while uploading file : ".$_FILES['pdfFile1']['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
			print "Error Code : ".$_FILES['pdfFile1']['error']."<br/>";
		}
	}
}
?>



<?php
if ( isset( $_FILES['pdfFile2'] ) ) {
	if ($_FILES['pdfFile2']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile2']['tmp_name'];
		$dest_file = "docs/fees/".$_FILES['pdfFile2']['name'];

		if (file_exists($dest_file)) {
			print "The file name already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['pdfFile2']['error'] == 0) {
				print "Pdf file uploaded successfully!";
				print "<b><u>Details : </u></b><br/>";
				print "File Name : ".$_FILES['pdfFile2']['name']."<br.>"."<br/>";
				print "File Size : ".$_FILES['pdfFile2']['size']." bytes"."<br/>";
				print "File location : docs/fees/".$_FILES['pdfFile2']['name']."<br/>";
			}
		}
	}
	else {
		if ( $_FILES['pdfFile2']['type'] != "application/pdf") {
			print "Error occured while uploading file : ".$_FILES['pdfFile2']['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
			print "Error Code : ".$_FILES['pdfFile2']['error']."<br/>";
		}
	}
}
?>
<?php
if ( isset( $_FILES['pdfFile3'] ) ) {
	if ($_FILES['pdfFile3']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile3']['tmp_name'];
		$dest_file = "docs/approval/".$_FILES['pdfFile3']['name'];

		if (file_exists($dest_file)) {
			print "The file name already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['pdfFile3']['error'] == 0) {
				print "Pdf file uploaded successfully!";
				print "<b><u>Details : </u></b><br/>";
				print "File Name : ".$_FILES['pdfFile3']['name']."<br.>"."<br/>";
				print "File Size : ".$_FILES['pdfFile3']['size']." bytes"."<br/>";
				print "File location : docs/approval/".$_FILES['pdfFile3']['name']."<br/>";
			}
		}
	}
	else {
		if ( $_FILES['pdfFile3']['type'] != "application/pdf") {
			print "Error occured while uploading file : ".$_FILES['pdfFile3']['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
			print "Error Code : ".$_FILES['pdfFile3']['error']."<br/>";
		}
	}
}
?>

