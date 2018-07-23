<html>
<head>
<link href="/rms/favicon.png" rel="icon" type="image/png" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Recruitment management Sysytem</title>
<script src="//use.edgefonts.net/almendra;abel;alex-brush;aguafina-script;smythe;fondamento;glass-antiqua;almendra-sc;coustard;dorsa;qwigley;antic;abel;advent-pro;arizonia;kelly-slab.js"></script>
<link rel="stylesheet" href="css/button_style.css">
<link rel="stylesheet" href="css/button_style.css">
	  <script src='js/jquery.min.js'></script>
      <script src="js/index.js"></script>
<style>
 #avinashk{
	 position:relative;
	  float:right;
      border:2px solid blue;
	  background: cyan;
	  border-radius:40px;
	  box-shadow:8px 4px 7px green;
	  padding:10px;
	  width:70px;
	  font-size:20px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px yellow; 
	  transition: width 1.5s;
}
#avinashk:hover{
	width:85px;
}
</style>
</head>
<body>
<?php
session_start();
@$user=$_SESSION['user'];
if(!$user)
echo "";
else
{
	include"conn.php";
	$db->query("use hms");
	$a=$db->query("select uidai from students");
	$b=$db->query("select user from users");
	while($row=mysqli_fetch_assoc($a))
	{
		if($user==$row['uidai'])
			header("Location: /rms/home.php");
		else
			echo "";
	}
	while($row1=mysqli_fetch_assoc($b))
	{
	if($user==$row1['user'])
		    header("Location: /rms/adlogin.php");
	else
			echo "";	
	}
}
?>
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p><br>
<p align="center"><ax>Recruitment management System</ax></p><br>
<div style="position: relative;display: block; padding: 40px;">
	<karhana><a href="register.php">New Application</a></karhana><div id='avinashk'><a href='index.php'><font face='Harrington' >Home</font></a></div><br><br><br><br><br><br><br>
<kavinash style="display:block;width:100%;">
<b><u><h2>Adverts still open</h2></u></b><hr width="30%" align="left" >
<?php
	include"conn.php";
	$db->query("use rms");
	$today=date("Y-m-d");
	$i=1; 
	$a=$db->query("select * from advert where adcdate>'".$today."'");
	while($row=mysqli_fetch_assoc($a))
	{
			echo $i.". Advert publish Date:".$row['advertdate']." Advert No : <a href='advert/".$row['advertno'].".jpg' target='left'>".$row['advertno']."</a> (Last Date of application: ".$row['adcdate'].")<br>";
			$i++;
	}
	echo'<br><br><br><b><u><h2>Closed Adverts</h2></u></b><hr width="30%" align="left" >';
	$i1=1;
	$a1=$db->query("select * from advert where adcdate<'".$today."'");
	while($row1=mysqli_fetch_assoc($a1))
	{
			echo $i1.". Advert publish Date:".$row1['advertdate']." Advert No : <a href='advert/".$row1['advertno'].".jpg' target='left'>".$row1['advertno']."</a> (Last Date of application: ".$row1['adcdate'].")<br>";
			$i1++;
	}
?>
</kavinash>
</body>
</html>