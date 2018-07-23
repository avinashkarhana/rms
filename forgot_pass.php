<html>
<head>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<style>
input[type=text], select , input[type=password] , input[type=number] , input[type=email]{
    padding: 4px 8px;
    margin: 4px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit]:hover {
    background-color: #551A8B;
	box-shadow: 2px 3px 8px blue;
}
.button:after {
    content: "";
    background: #f1f1f1;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px !important;
    margin-top: -120%;
    opacity: 0;
    transition: all 0.8s
}

.button:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}
 abc{
      font-family:Agency FB;
	  font-size:25px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px grey; 
   } 
    bb{
      font-family:Agency FB;
	  font-size:18px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px grey; 
   } 
    ab{
      font-family:Harrington;
	  font-size:30px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px blue; 
   } 
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
}
avi{
	font-family:Gloucester MT;
	text-shadow:2px 4px 3px green;
	font-size:35;
   }
avik{
	font-family: Century Schoolbook;
	text-shadow:2px 4px 3px grey;
	font-size:20px;
   }
.button{
background-color: #6534AC;
    border: none;
    color: white;
    padding: 7px 8px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/button_style.css">
	  <script src='js/jquery.min.js'></script>
      <script src="js/index.js"></script>

<script src="//use.edgefonts.net/almendra;abel;alex-brush;aguafina-script;smythe;fondamento;glass-antiqua;almendra-sc;coustard;dorsa;qwigley;antic;abel;advent-pro;arizonia;kelly-slab.js"></script>
<title>Forget Password</title>
</head>
<body>
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemwati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p>
<p align="center">
<ax>Recruitment management System</ax></p>
<br><br><br><br><abc>Recover your forgotten password:</abc><p align="right"><avi>(Only for Candidates)</avi></p><p align="right"><a href='/rms/'>HOME</a></p>
<?php
include'logincheck.php';
@$uidai=$_POST['uidai'];
@$mobile=$_POST['mobile'];
include"conn.php";
$db->query("use rms");
$b=$db->query("select uidai from candidates");
if(!$uidai)
{
echo '<form action="" method="POST">
<table align="center"><tr><td>Enter your registered UIDAI</td><td><input type="text" name="uidai" value="'.$uidai.'" /></td></tr></table>
<p align="center"><input type="submit" class="button" value="Forgot Password" /></p></form>';
}
else{
	echo"";
$row1=mysqli_fetch_assoc($db->query("select mobile,pass from candidates where uidai='".$uidai."'"));
$c=$db->query("select uidai from candidates");
$x=9;
while($row=mysqli_fetch_assoc($c))
{
if($uidai==$row['uidai'])
{   $x=1;
	echo "<avik>Uidai : ".$uidai."<br><br>Please enter your registered mobile number : </avik><br><br><form action='' method='POST'><input type='text' name='mobile' value='".$mobile."' /><input type='hidden' name='uidai' value='".$uidai."' /><input type='submit' class='button' value='Get Password' /></form>";
	if($mobile)
	{	
	if($mobile==$row1['mobile'])
	{
		echo "Your Password is : ".$row1['pass']."<br><br><a href='/rms/'><ax>LogIn</ax></a>";
	}
	else
	{
		echo "Your mobile number was wrong.<br><a href=''>Try Again</a>";
		
	}
	}
	else
		echo"";
	break;
}
else
 $x=0;
}
if($x==0)
      {
	      if($uidai)
	          echo "No such user as ".$uidai." <a href=''>Try Again</a>";
      }
}
?>
</body>
</html>