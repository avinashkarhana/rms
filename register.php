<?php
include"logincheck.php";
?>
<html>
<head>
<link href="/rms/favicon.png" rel="icon" type="image/png" /><title>Register</title>
<!--<style>

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

 ab{
      font-family:Agency FB;
	  font-size:25px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px grey; 
   } 
 ac{
      font-family:Comic Sans;
	  font-size:40px;
	  font-weight:"bold";
	  text-shadow:2px 5px 8px gold; 
   }  
   avi{
	font-family:Gloucester MT;
	text-shadow:2px 4px 3px green;
	font-size:35;
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
</style>-->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/button_style.css">
	  <script src='js/jquery.min.js'></script>
      <script src="js/index.js"></script>

<script src="//use.edgefonts.net/almendra;abel;alex-brush;aguafina-script;smythe;fondamento;glass-antiqua;almendra-sc;coustard;dorsa;qwigley;antic;abel;advent-pro;arizonia;kelly-slab.js"></script>
</head>
<body style="position:relative;">
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p><br><br><br><br>
<p align="center"><ac>Recruitment System</ac></p><hr solid><br><b>New application</b><div id='avinashk'><a href='index.php'><font face='Harrington' >Home</font></a></div><br><br><br><br>
<form action="reg.php" method="POST"><div style="position :relative;">
<kavinash style="margin-bottom:50px;">Application procedure is as follow:<br><br>1.Register with relevent details.<br>2.Fill further rquirements and upload required Documents<br>3.Go to Apply section and apply for diiferent adverts available as per choice.</kavinash>
<div style="position: absolute; width: 70%; border-radius: 5px;background-color: #ccc;left:10%; padding: 20px;bottom:60px; top: 160px; height:550px;">
</select></p><br><br><table align="center">
<tr><td><ab>Candidate Name</ab></td><td><select style="width: 30%;padding: 12px;display: inline;margin-right: 0;" name="sex" id="sex" required><option value="M">Mr.</option><option value="F">Ms.</option></select><input type="text" style="width:62%;float:right;" name="Name" autocomplete="on" autofocus required/></td></tr>
<tr><td><ab>Aadhar Number(Username)</ab></td><td><input type="number" max="999999999999" min="100000000000" name="uidai" placeholder="12 digit UIDAI" required autocomlete="on" /></td></tr>
<tr><td><ab>Password</ab></td><td><input type="password" name="pass" autocomplete="no" placeholder="********" required /></td></tr>
<tr><td><ab>Mobile</ab></td><td><input type="number" max="9999999999" min="5000000000" name="Phone" required autocomlete="on" /></td></tr>
<tr><td><ab>Category</ab></td><td> 
<select name='Category' id='Category' required>
<?php
include"conn.php";
$db->query("use rms");
$a="select * from category";
$A=$db->query($a);
while($row=mysqli_fetch_assoc($A)){
echo'<option value="'.$row['catcode'].'">'.$row['catname'].'</option>';	
}
echo'</select></td></tr>
<tr><td><ab>Email</ab></td><td><input type="email" name="Email" required autocomlete="on" /></td></tr>
</table><br><p align="center"><input class="button" type="submit" Value="Register" /></p></div></div>
</form>
</body>
</html>';
?>