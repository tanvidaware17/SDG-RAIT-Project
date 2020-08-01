<html>
 <head>
 <?php 
@session_start();
?>
<title>Faculty Publication Management </title>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/util.css">
<style>
 /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 15px;
  font-weight : bold;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border-top: none;
}
 </style>

 </head>
 <body>
   
  <div class="tab" style="margin-top:2%; layout : fixed">
  <button class="tablinks"></button>
<button class="tablinks" onclick="clickHandle(event, 'book_chapter')" id="defaultOpen">Book Chapter</button>
<button class="tablinks" onclick="clickHandle(event, 'patent')">Patent</button>
<button class="tablinks" onclick="clickHandle(event, 'copyright')">Copyright</button>
<button class="tablinks" onclick="clickHandle(event, 'book_publication')">Book Publication</button>
<button class="tablinks" onclick="clickHandle(event, 'journal')">Journal</button>
<button class="tablinks" onclick="clickHandle(event, 'conference')">Conference</button>
</div>

  
  <div id="book_chapter" class="tabcontent">
  <?php include ("show_book_chapter.php");?>
  </div>

  <div id="patent" class="tabcontent">
  <?php include ("show_patent.php");?>
  </div>

  <div id="copyright" class="tabcontent">
  <?php include ("show_copyright.php");?>
</div>

<div id="book_publication" class="tabcontent" >
<?php include ("show_book_publication.php");?>
</div>

<div id="journal" class="tabcontent">
<?php include ("show_journal.php");?>
</div>

<div id="conference" class="tabcontent">
<?php include ("show_conference.php");?>
</div>
<div>

<script>
function clickHandle(evt, animalName) {
  let i, tabcontent, tablinks;

  // This is to clear the previous clicked content.
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Set the tab to be "active".
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Display the clicked tab and set it to active.
  document.getElementById(animalName).style.display = "block";
  evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
</script>

 </body>
</html>