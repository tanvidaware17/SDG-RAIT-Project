<!--verify login 
 decide if the credentials entered are correct -->
<?php
    @session_start();
    include 'connect.php';
    //setting variable using post array
    $sdrn = $_POST['sdrn'];
    $Password = $_POST['Password'];

    //check if the user exists in the user table
    $query = "select * from faculty where sdrn = '$sdrn'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);

    if(mysqli_num_rows($res) > 0){

        if(strcmp($row['Password'],$Password)==0){
        //if the user exists then create seesion variables emailid and password
        $_SESSION['sdrn']=$sdrn;
        $_SESSION['Password']=$Password;
        $_SESSION['Email'] = $row['Email'];
        $_SESSION['First_name'] = $row['First_name'];
        $_SESSION['Contact_no'] = $row['Contact_no'];
        $_SESSION['Middle_name'] = $row['Middle_name'];
        $_SESSION['Last_name'] = $row['Last_name'];
        
        //redirect to explore page
        header('Location: Details_collection/page1.php');
    }
    //incorrect password
    else{
        echo '<script>alert("Invalid Credentials. ")</script>';
        header('Location: login.php');
    }
}
    //if user is not found
    else {
        echo "<script> alert('User not found!') </script>";
        header('Location: login.php');
    }
?>