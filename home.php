<html>
<head>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<style><!--
 ax{
      border:2px solid lime;
	  background: cyan;
	  border-radius:40px;
	  box-shadow:8px 4px 7px green;
	  padding:10px;
	  width: 300px;
      text-align:center;
	  font-size:25px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px yellow; 

avi{
	font-family:Gloucester MT;
	
	font-size:35;
   } -->
</style>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/button_style.css">
	<!--  <script src='js/jquery.min.js'></script>
      <script src="js/index.js"></script>
<script src="//use.edgefonts.net/almendra;abel;alex-brush;aguafina-script;smythe;fondamento;glass-antiqua;almendra-sc;coustard;dorsa;qwigley;antic;abel;advent-pro;arizonia;kelly-slab.js"></script>-->
<title>Recruitment management Sysytem</title>
</head>
<body style="position:relative;">
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p>
<p align="center">
<ax>Recruitment management System</ax></p> <?php

//start of login check
include "logincheck.php";
//end of login check

echo '<abc>User </abc> : <b>'.$user.'</b><table align="right"><tr><td><form action="logout.php" method="POST"><input class="sbutton" type="submit" value="Logout" /></form></td></tr></table>'; 
echo'<table align="center"><tr><td><form action="home.php" method="POST"><input class="sbutton" name="perdetails" type="submit" value="Personal Details" /></form></td><td><form action="home.php" method="POST"><input class="sbutton" name="edudetails" type="submit" value="Education Details" /></form></td><td><form action="home.php" method="POST"><input class="sbutton" name="pubdetails" type="submit" value="Book Publication Details" /></form></td><td><form action="home.php" method="POST"><input class="sbutton" name="experiencedetails" type="submit" value="Experience Details" /></form></td><td><form action="home.php" method="POST"><input class="sbutton" name="rpaperdetails" type="submit" value="Research Paper Details" /></form></td><td><form action="home.php" method="POST"><input class="sbutton" name="rprojectdetails" type="submit" value="Research Project Details" /></form></td><td><form action="home.php" method="POST"><input class="sbutton" name="rguidancedetails" type="submit" value="Research Guidance Details" /></form></td><td><form action="home.php" method="POST"><input class="sbutton" name="conferences" type="submit" value="Conference Details" /></form></td><td><form action="home.php" method="POST"><input class="sbutton" name="references" type="submit" value="References" /></form></td></tr></table><form action="home.php" method="POST"><p align="left"><input class="sbutton" name="application" type="submit" value="Post Applying Section" /></p></form>';
@$perdetails=$_POST['perdetails'];
@$pubdetails=$_POST['pubdetails'];
@$edudetails=$_POST['edudetails'];
@$rpaperdetails=$_POST['rpaperdetails'];
@$rprojectdetails=$_POST['rprojectdetails'];
@$rguidancedetails=$_POST['rguidancedetails'];
@$conferences=$_POST['conferences'];
@$references=$_POST['references'];
@$application=$_POST['application'];
@$experiencedetails=$_POST['experiencedetails'];
if($perdetails)
	include('perdetails.php');
if($edudetails)
	include('edudetails.php');
if($pubdetails)
	include('pubdetails.php');
if($rpaperdetails)
	include('rpaperdetails.php');
if($rprojectdetails)
	include('rprojectdetails.php');
if($rguidancedetails)
	include('rguidancedetails.php');
if($conferences)
	include('conferences.php');
if($references)
	include('references.php');
if($experiencedetails)
	include('experiencedetails.php');
if($application)
	include('application.php');
?>

</body>
</html>