<html>
<head>
<link href="/rms/favicon.png" rel="icon" type="image/png" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/button_style.css">
	 <!-- <script src='js/jquery.min.js'></script>
      <script src="js/index.js"></script>

<script src="//use.edgefonts.net/almendra;abel;alex-brush;aguafina-script;smythe;fondamento;glass-antiqua;almendra-sc;coustard;dorsa;qwigley;antic;abel;advent-pro;arizonia;kelly-slab.js"></script>-->
<title>Recruitment management Sysytem</title>
<script>
function showpass() {
    var p = document.getElementById('pass');
  if(p.getAttribute('type')=='password') 
  p.setAttribute('type', 'text');
  else
    p.setAttribute('type', 'password');
}
</script>
</head>
<body>
<?php
include"logincheck.php";
?>
<img width="41" height="38" src="img/univ.jpg" align="left"><p align="center"><avi>Hemvati Nandan Bahuguna Garhwal University, Srinagar (Garhwal),Uttarakhand-246174</avi></p>
<p align='center'><b>(A Central University)</b></p><br>
<p align="center"><ax>Recruitment management System</ax></p><br>
	<p align="center"><ab>Login</ab></p>
	<div style="position :relative;
    width: 100%;height:340px;">
	<div style="position: absolute; width: 25%; border-radius: 5px; left: 36%; background-color: #f2f2f2; padding: 20px; top: 60px; height: 211px;">
	<form action="login.php" method="POST">
<table align="center">
<tr><td><img src="img/user.png" height=37 width=37 alt="Username" /></td><td><input type="text" name="uidai" placeholder="Username..." autocomplete="on" autofocus required/></td></tr>
	<tr><td><img src="img/pass.png" alt="Password" height=37 width=37 /></td><td><input type="password" id="pass" name="pass" placeholder="Password..." style="position: " required /></td></tr></table><img src="img/eye.png" style="display: block; float: right; width: 29px; cursor: pointer; height: 26px;" onClick="showpass()" /><c style="margin-top:4px;float:right;font-size:15;color:#1F91FF;cursor:pointer;" onClick="showpass()">Show Password  </c>
	
<p align="center"><br><br><ab><input type="submit"  class="button" Value="Login" /></ab></p>
</form></div></div><div style="position: absolute;display: block
; padding: 40px;">
	<karhana><a href="register.php">New Application</a></karhana><avinash><a href="forgot_pass.php">Forgot Password</a></avinash><avinash><a href="adverts.php">Advertisement Section</a></avinash></div>
</body>
</html>