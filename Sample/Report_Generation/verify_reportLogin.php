<!--verify login
 decide if the credentials entered are correct -->
<?php
    @session_start();
    $conn = mysqli_connect("localhost", "root", "", "test");
    //setting variable using post array
    $sdrn = $_POST['sdrn'];
    $Password = $_POST['Password'];

    //check if the user exists in the user table
    $query = "select * from rd where sdrn = '$sdrn'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);

    if(mysqli_num_rows($res) > 0){

        if(strcmp($row['Password'],$Password)==0){
        //if the user exists then create seesion variables emailid and password
        $_SESSION['sdrn']=$sdrn;
        $_SESSION['Password']=$Password;
        $_SESSION['Email'] = $row['Email'];

        $_SESSION['Contact_no'] = $row['Contact_no'];


        //redirect to explore page
        header('Location: main_page.php');
    }
    //incorrect password
    else{
        echo '<script>alert("Invalid Credentials. ")</script>';
        header('Location: Report_login.php');
    }
}
    //if user is not found
    else {
        echo "<script> alert('User not found!') </script>";
        header('Location: Report_login.php');
    }
?>
