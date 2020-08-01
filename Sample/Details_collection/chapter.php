<?php
    
    //////////////////////////////////////////////////////////////
    //connect to database
    $conn = new mysqli('localhost', 'root', '');  
    mysqli_select_db($conn, 'test'); 


    //////////////////////////////////////////////////////////
    //submit book chapter data into table book_chapter

    if(isset($_POST["submit_chapter"])) {
        $sdrn = $_POST['sdrn'];
        $faculty_name = $_POST['faculty_name']; 
        $author1 = $_POST['author1'];
        $author2 = $_POST['author2'];
        $author3 = $_POST['author3'];
        $author4 = $_POST['author4'];
        $chapter_name = $_POST['chapter_name'];
        $book_name = $_POST['book_name'];
        $through = $_POST['through'];
        $publisher_name = $_POST['publisher_name'];
        $isbn_no = $_POST['isbn_no'];
        $publication_year = $_POST['publication_year'];
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        $opt3 = $_POST['opt3'];
        
        $query = "INSERT INTO `book_chapter`(`sdrn`,`faculty_name`, `author1`,`author2`,`author3`,`author4`,`chapter_name`,`book_name`,`through`,`publisher_name`, `isbn_no`, `publication_year`,`opt1`,`opt2`,`opt3`) 
        VALUES ('$sdrn','$faculty_name','$author1','$author2','$author3','$author4','$chapter_name','$book_name', '$through','$publisher_name', '$isbn_no', '$publication_year','$opt1','$opt2','$opt3')";
        if(!mysqli_query($conn,$query)) {
            echo "not inserted";
        }
        else{
            $last_id = mysqli_insert_id($conn);
            echo '<script>alert("New record created successfully. ")</script>';
            echo "<input type=\"button\" value=\"Go Back!\" onclick=\"history.back(-1)\" /> ";
            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<a href='$url'>back</a>"; 

            echo "<br>Last inserted ID is: " . $last_id;
            echo "<br> <hr> <br>";

            $lastdata = "SELECT * FROM book_chapter WHERE id = $last_id";
            $showLastData = mysqli_query($conn,$lastdata);
            if(mysqli_num_rows($showLastData)>0){
                while ($row = mysqli_fetch_assoc($showLastData)) { 
                  
                    echo "SDRN : {$row['sdrn']} <br> <br>";     
                    echo "Faculty Name : {$row['faculty_name']} <br> <br>";
                    echo "Author Name : {$row['author1']} <br> <br>";
                    echo "Author Name 2 : {$row['author2']} <br> <br>";
                    echo "Author Name 3: {$row['author3']} <br> <br>";
                    echo "Author Name 4: {$row['author4']} <br> <br>";
                    echo "Chapter Name : {$row['chapter_name']} <br> <br>";
                    echo "Book Name : {$row['book_name']} <br> <br>";
                    echo "Through Conference/Journal : {$row['through']} <br> <br>";
                    echo "Publisher Name : {$row['publisher_name']} <br> <br>";
                    echo "ISBN Number : {$row['isbn_no']} <br> <br>";
                    echo "Year of Publication : {$row['publication_year']} <br> <br>";
                    echo "Option 1 : {$row['opt1']} <br> <br>";
                    echo "Option 2 : {$row['opt2']} <br> <br>";
                    echo "Option 3 : {$row['opt3']} <br> <br> <hr>";
                } 
            }
            else{
                    echo "0 result";
            }
        }
    }



    //submit book publication data into table book_publication
    ///////////////////////////////////////////////////////////

    if(isset($_POST["submit_publication"])) {
        $sdrn = $_POST['sdrn'];
        $faculty_name = $_POST['faculty_name']; 
        $author1 = $_POST['author1'];
        $author2 = $_POST['author2'];
        $author3 = $_POST['author3'];
        $author4 = $_POST['author4'];
        $book_name = $_POST['book_name'];
        $publisher_name = $_POST['publisher_name'];
        $isbn_no = $_POST['isbn_no'];
        $year = $_POST['year'];
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        $opt3 = $_POST['opt3'];
        
        $query1 = "INSERT INTO `book_publication`(`sdrn`,`faculty_name`, `author1`,`author2`,`author3`,`author4`,`book_name`,`publisher_name`, `isbn_no`, `year`,`opt1`,`opt2`,`opt3`) 
        VALUES ('$sdrn','$faculty_name','$author1','$author2','$author3','$author4','$book_name', '$publisher_name', '$isbn_no', '$year','$opt1','$opt2','$opt3')";
        if(!mysqli_query($conn,$query1)) {
            echo "not inserted";
        }
        else{
            $last_id = mysqli_insert_id($conn);
            echo '<script>alert("New record created successfully. ")</script>';
            echo "<input type=\"button\" value=\"Go Back!\" onclick=\"history.back(-1)\" /> ";
            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<a href='$url'>back</a>"; 

            echo "<br>Last inserted ID is: " . $last_id;
            echo "<br> <hr> <br>";

            $lastdata = "SELECT * FROM book_publication WHERE id = $last_id";
            $showLastData = mysqli_query($conn,$lastdata);
            if(mysqli_num_rows($showLastData)>0){
                while ($row = mysqli_fetch_assoc($showLastData)) { 
                  
                    echo "SDRN : {$row['sdrn']} <br> <br>";     
                    echo "Faculty Name : {$row['faculty_name']} <br> <br>";
                    echo "Author Name : {$row['author1']} <br> <br>";
                    echo "Author Name 2 : {$row['author2']} <br> <br>";
                    echo "Author Name 3: {$row['author3']} <br> <br>";
                    echo "Author Name 4: {$row['author4']} <br> <br>";
                    echo "Book Name : {$row['book_name']} <br> <br>";
                    echo "Publisher Name : {$row['publisher_name']} <br> <br>";
                    echo "ISBN Number : {$row['isbn_no']} <br> <br>";
                    echo "Year of Publication : {$row['year']} <br> <br>";
                    echo "Option 1 : {$row['opt1']} <br> <br>";
                    echo "Option 2 : {$row['opt2']} <br> <br>";
                    echo "Option 3 : {$row['opt3']} <br> <br> <hr>";
                } 
            }
            else{
                    echo "0 result";
            }
        }
    }

    //submit patent data into table patent
    ///////////////////////////////////////////////////////////////////////////

    if(isset($_POST["submit_patent"])) {
        $sdrn = $_POST['sdrn'];
        $faculty_name = $_POST['faculty_name']; 
        $author1 = $_POST['author1'];
        $author2 = $_POST['author2'];
        $author3 = $_POST['author3'];
        $author4 = $_POST['author4'];
        $designation = $_POST['designation'];
        $patent = $_POST['patent'];
        $title = $_POST['title'];
        $application_no = $_POST['application_no'];
        $status = $_POST['status'];
        $reg_amount = $_POST['reg_amount'];
        $amount_funded = $_POST['amount_funded'];
        $reg_date = $_POST['reg_date'];
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        $opt3 = $_POST['opt3'];
        
        $query3 = "INSERT INTO `patent` (`sdrn`,`faculty_name`, `author1`,`author2`,`author3`,`author4`,`designation`,`patent`,`title`, `application_no`, `status`,`reg_amount`,`amount_funded`,`reg_date`,`opt1`,`opt2`,`opt3`)
        VALUES ('$sdrn','$faculty_name','$author1','$author2','$author3','$author4',  '$designation', '$patent', '$title', '$application_no', '$status', '$reg_amount', '$amount_funded', '$reg_date', '$opt1','$opt2','$opt3')";
        if(!mysqli_query($conn,$query3)) {
            echo "not inserted";
        }
        else{
            $last_id = mysqli_insert_id($conn);
            echo '<script>alert("New record created successfully. ")</script>';
            echo "<input type=\"button\" value=\"Go Back!\" onclick=\"history.back(-1)\" /> ";
            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<a href='$url'>back</a>"; 

            echo "<br>Last inserted ID is: " . $last_id;
            echo "<br> <hr> <br>";
            $lastdata = "SELECT * FROM patent WHERE id = $last_id";
            $showLastData = mysqli_query($conn,$lastdata);
            if(mysqli_num_rows($showLastData)>0){
                while ($row = mysqli_fetch_assoc($showLastData)) {  
                    echo "SDRN : {$row['sdrn']} <br> <br>";     
                    echo "Faculty Name : {$row['faculty_name']} <br> <br>";
                    echo "Author Name : {$row['author1']} <br> <br>";
                    echo "Author Name 2: {$row['author2']} <br> <br>";
                    echo "Author Name 3: {$row['author3']} <br> <br>";
                    echo "Author Name 4: {$row['author4']} <br> <br>";
                    echo "Designation : {$row['designation']} <br> <br>";
                    echo "Patent : {$row['patent']} <br> <br>";
                    echo "Title : {$row['title']} <br> <br>";
                    echo "Application Number : {$row['application_no']} <br> <br>";
                    echo "Status : {$row['status']} <br> <br>";
                    echo "Registration Amount : {$row['reg_amount']} <br> <br>";
                    echo "Amount Funded: {$row['amount_funded']} <br> <br>";
                    echo "Registration Date : {$row['reg_date']} <br> <br>";
                    echo "Option 1 : {$row['opt1']} <br> <br>";
                    echo "Option 2 : {$row['opt2']} <br> <br>";
                    echo "Option 3 : {$row['opt3']} <br> <br> <hr>";
                } 
            }
            else{
                    echo "0 result";
            }
        }
    }

    //submit copyright data into table copyright
    //////////////////////////////////////////////////////////////

    if(isset($_POST["submit_copyright"])) {
        $sdrn = $_POST['sdrn'];
        $faculty_name = $_POST['faculty_name']; 
        $author1 = $_POST['author1'];
        $author2 = $_POST['author2'];
        $author3 = $_POST['author3'];
        $author4 = $_POST['author4'];
        $designation = $_POST['designation'];
        $copyright = $_POST['copyright'];
        $title = $_POST['title'];
        $application_no = $_POST['application_no'];
        $status = $_POST['status'];
        $reg_amount = $_POST['reg_amount'];
        $amount_funded = $_POST['amount_funded'];
        $reg_date = $_POST['reg_date'];
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        $opt3 = $_POST['opt3'];
        
        $query4 = "INSERT INTO `copyright` (`sdrn`,`faculty_name`, `author1`,`author2`,`author3`,`author4`,`designation`,`copyright`,`title`, `application_no`, `status`,`reg_amount`,`amount_funded`,`reg_date`,`opt1`,`opt2`,`opt3`)
         VALUES ('$sdrn','$faculty_name','$author1','$author2','$author3','$author4',  '$designation', '$copyright', '$title', '$application_no', '$status', '$reg_amount', '$amount_funded', '$reg_date', '$opt1','$opt2','$opt3')";
        if(!mysqli_query($conn,$query4)) {
            echo "not inserted";
        }
        else{

            $last_id = mysqli_insert_id($conn);
            echo '<script>alert("New record created successfully. ")</script>';
            echo "<input type=\"button\" value=\"Go Back!\" onclick=\"history.back(-1)\" /> ";
            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<a href='$url'>back</a>"; 

            echo "<br>Last inserted ID is: " . $last_id;
            echo "<br> <hr> <br>";
            $lastdata = "SELECT * FROM copyright WHERE id = $last_id";
            $showLastData = mysqli_query($conn,$lastdata);
            if(mysqli_num_rows($showLastData)>0){
                while ($row = mysqli_fetch_assoc($showLastData)) {
                    echo "SDRN : {$row['sdrn']} <br> <br>";       
                    echo "Faculty Name : {$row['faculty_name']} <br> <br>";
                    echo "Author Name : {$row['author1']} <br> <br>";
                    echo "Author Name 2 : {$row['author2']} <br> <br>";
                    echo "Author Name 3 : {$row['author3']} <br> <br>";
                    echo "Author Name 4 : {$row['author4']} <br> <br>";
                    echo "Designation : {$row['designation']} <br> <br>";
                    echo "Copyright : {$row['copyright']} <br> <br>";
                    echo "Title : {$row['title']} <br> <br>";
                    echo "Application Number : {$row['application_no']} <br> <br>";
                    echo "Status : {$row['status']} <br> <br>";
                    echo "Registration Amount : {$row['reg_amount']} <br> <br>";
                    echo "Amount Funded: {$row['amount_funded']} <br> <br>";
                    echo "Registration Date : {$row['reg_date']} <br> <br>";
                    echo "Option 1 : {$row['opt1']} <br> <br>";
                    echo "Option 2 : {$row['opt2']} <br> <br>";
                    echo "Option 3 : {$row['opt3']} <br> <hr>";

                } 
            }
            else{
                    echo "0 result";
            }
        }
    }

    //submit journal data into table journal
    ///////////////////////////////////////////////////////////////////////////

    if(isset($_POST["submit_journal"])) {

        $sdrn = $_POST['sdrn']; 
        $author1 = $_POST['author1'];
        $author2 = $_POST['author2'];
        $author3 = $_POST['author3'];
        $author4 = $_POST['author4'];
        $page_title = $_POST['page_title']; 
        $journal_name = $_POST['journal_name'];
        $volume_no = $_POST['volume_no'];
        $page_no = $_POST['page_no'];
        $isbn_no = $_POST['isbn_no'];
        $doi = $_POST['doi'];
        $ntnl_no = $_POST['ntnl_no'];
        $indexed_in = $_POST['indexed_in'];
        $no_of_times = $_POST['no_of_times'];
        $reg_amount = $_POST['reg_amount'];
        $amount_sanctioned = $_POST['amount_sanctioned'];
        $awards = $_POST['awards'];
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        $opt3 = $_POST['opt3'];
        
        $query = "INSERT INTO `journal`(`sdrn`, `author1`,`author2`,`author3`,`author4`,`page_title`,`journal_name`,`volume_no`, `page_no`, `isbn_no`,`doi`, `ntnl_no`,`indexed_in`, `no_of_times`,`reg_amount`,`amount_sanctioned`,`awards`, `opt1`,`opt2`,`opt3`)
         VALUES ('$sdrn','$author1','$author2','$author3','$author4', '$page_title', '$journal_name', '$volume_no', '$page_no',
         '$isbn_no','$doi', '$isbn_no', '$ntnl_no','$indexed_in','$no_of_times','$reg_amount', '$amount_sanctioned', '$awards', '$opt1', '$opt2', '$opt3')";
        if(!mysqli_query($conn,$query)) { 
            echo "not inserted";
        }
        else{
            $last_id = mysqli_insert_id($conn);
            echo '<script>alert("New record created successfully. ")</script>';
            echo "<input type=\"button\" value=\"Go Back!\" onclick=\"history.back(-1)\" /> ";
            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<a href='$url'>back</a>"; 

            echo "<br>Last inserted ID is: " . $last_id;
            echo "<br><hr><br>";
            $lastdata = "SELECT * FROM journal WHERE id = $last_id";
            $showLastData = mysqli_query($conn,$lastdata);
            if(mysqli_num_rows($showLastData)>0){
                while ($row = mysqli_fetch_assoc($showLastData)) {   
                    echo "sdrn : {$row['sdrn']} <br><br>";    
                    echo "Author Name : {$row['author1']} <br><br>";
                    echo "Author Name 2: {$row['author2']} <br><br>";
                    echo "Author Name 3: {$row['author3']} <br><br>";
                    echo "Author Name 4: {$row['author4']} <br><br>";
                    echo "Page Title : {$row['page_title']} <br><br>";
                    echo "Journal Name : {$row['journal_name']} <br><br>";
                    echo "Volume Number : {$row['volume_no']} <br><br>";
                    echo "Page Number : {$row['page_no']} <br><br>";
                    echo "ISBN Number : {$row['isbn_no']} <br><br>";
                    echo "DOI : {$row['doi']} <br><br>";
                    echo "Year of Publication : {$row['year']} <br><br>";
                    echo "NTNL No. : {$row['ntnl_no']} <br><br>";
                    echo "Indexed in : {$row['indexed_in']} <br><br>";
                    echo "Number of Times Cited  : {$row['no_of_times']} <br><br>";
                    echo "Registration Amount : {$row['reg_amount']} <br> <br>";
                    echo "Amount Sanctioned: {$row['amount_sanctioned']} <br> <br>";
                    echo "Awards : {$row['awards']} <br><br>";
                    echo "Option 1 : {$row['opt1']} <br><br>";
                    echo "Option 2 : {$row['opt2']} <br><br>";
                    echo "Option 3 : {$row['opt3']} <br><hr>";
                } 
            }
            else{
                    echo "0 result";
            }
        }
    }

    //submit conferences data into table conference
    //////////////////////////////////////////////////////////////////////////

    if(isset($_POST["submit_conference"])) {
        $sdrn = $_POST['sdrn']; 
        $author1 = $_POST['author1'];
        $author2 = $_POST['author2'];
        $author3 = $_POST['author3'];
        $author4 = $_POST['author4'];
        $paper_title = $_POST['paper_title']; 
        $con_name = $_POST['con_name'];
        $con_place = $_POST['con_place'];
        $con_date = $_POST['con_date'];
        $ntnl_no = $_POST['ntnl_no'];
        $isbn_no = $_POST['isbn_no'];
        $doi = $_POST['doi'];
        $year = $_POST['year'];
        $indexed_in = $_POST['indexed_in'];
        $no_of_times = $_POST['no_of_times'];
        $reg_amount = $_POST['reg_amount'];
        $amount_sanctioned = $_POST['amount_sanctioned'];
        $awards = $_POST['awards'];
        $presented_personally = $_POST['presented_personally'];
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        $opt3 = $_POST['opt3'];
        
        $query = "INSERT INTO `conference`(`sdrn`, `author1`,`author2`,`author3`,`author4`,`paper_title`,`con_name`,`con_place`, `con_date`,  `ntnl_no`,`isbn_no`,`doi`, `year`, `indexed_in`, `no_of_times`,`reg_amount`,`amount_sanctioned`,`presented_personally`, `awards`, `opt1`,`opt2`,`opt3`)
        VALUES ('$sdrn','$author1','$author2','$author3','$author4', '$paper_title', '$con_name', '$con_place', '$con_date', '$ntnl_no',
        '$isbn_no','$doi', '$year', '$indexed_in','$no_of_times','$reg_amount', '$amount_sanctioned', '$presented_personally', '$awards', '$opt1', '$opt2', '$opt3')";
        if(!mysqli_query($conn,$query)) { 
            echo "not inserted";
        }
        else{
            $last_id = mysqli_insert_id($conn);
            echo '<script>alert("New record created successfully. ")</script>';
            echo "<input type=\"button\" value=\"Go Back!\" onclick=\"history.back(-1)\" /> ";
            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<a href='$url'>back</a>"; 

            echo "<br>Last inserted ID is: " . $last_id;
            echo "<br><hr><br>";
            $lastdata = "SELECT * FROM conference WHERE id = $last_id";
            $showLastData = mysqli_query($conn,$lastdata);
            if(mysqli_num_rows($showLastData)>0){
                while ($row = mysqli_fetch_assoc($showLastData)) {   
                    echo "sdrn : {$row['sdrn']} <br><br>";    
                    echo "Author Name : {$row['author1']} <br> <br>";
                    echo "Author Name 2: {$row['author2']} <br> <br>";
                    echo "Author Name 3: {$row['author3']} <br> <br>";
                    echo "Author Name 4: {$row['author4']} <br><br>";
                    echo "Paper Title : {$row['paper_title']} <br><br>";
                    echo "Conference Name : {$row['con_name']} <br><br>";
                    echo "Conference Place : {$row['con_place']} <br><br>";
                    echo "Conference Date : {$row['con_date']} <br><br>";
                    echo "NTNL No. : {$row['ntnl_no']} <br><br>";
                    echo "ISBN Number : {$row['isbn_no']} <br><br>";
                    echo "DOI : {$row['doi']} <br><br>";
                    echo "Year of Publication : {$row['year']} <br><br>";
                    echo "Indexed in : {$row['indexed_in']} <br><br>";
                    echo "Number of Times Cited  : {$row['no_of_times']} <br><br>";
                    echo "Registration Amount : {$row['reg_amount']} <br> <br>";
                    echo "Amount Sanctioned: {$row['amount_sanctioned']} <br> <br>";
                    echo "Presented Personally ? : {$row['presented_personally']} <br><br>";
                    echo "Awards : {$row['awards']} <br><br>";
                    echo "Option 1 : {$row['opt1']} <br><br>";
                    echo "Option 2 : {$row['opt2']} <br><br>";
                    echo "Option 3 : {$row['opt3']} <br><hr>";
                } 
            }
            else{
                    echo "0 result";
            }
        }
    }
?>


