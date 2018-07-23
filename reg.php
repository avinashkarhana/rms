<html>
<head>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<title>New Registeration</title>
<body><?php
$sex=$_POST['sex'];
$Name=$_POST['Name'];
$Phone=$_POST['Phone'];
$Email=$_POST['Email'];
$pass=$_POST['pass'];
$uidai=$_POST['uidai'];
$Category=$_POST['Category'];
if(!$sex || !$Name || !$Phone || !$Email || !$uidai || !$Category || !$pass)
{
 echo 'Some Details left Blank.<br>Please go <a href="register.php">back</a> And try again';
 exit;
}
include "conn.php";
$result1= $db->query("use rms");
if(!$result1)
	echo'Can not connect to Database.<br><br>';
$a=$db->query("select * from candidates where uidai like'".$uidai."'");
$b=mysqli_fetch_assoc($a);
if($a && $uidai==$b["uidai"])
  {
	 echo "Sorry can't register again.<br>Already Registered<br><br> UIDAI : ".$uidai."<br>Name : ".$b["Name"]."";
     if($Phone==$b["Mobile"] or $Email==$b["email"])
        echo"<br>Password:".@$b[pass]."";
  }
else
  {
		$query= $db->query("insert into candidates (sex,name,mobile,uidai,pass,catcode,email)
				values('".$sex."', '".$Name."', '".$Phone."','".$uidai."','".$pass."','".$Category."','".$Email."')");
		$qerror=$db->error;	 
		if($query)
		 echo '* User Registered <br><br>Please <a href="index.php">Get Back to RMS</a> and login with your credentials for futher detailed information filling.';
		else
		 echo $qerror."<br>Something went wrong.Sorry system error can't Register Right Now.";
  }
$db->close();
echo '<br><br><br><br><a href="register.php">New Registeration.</a>';
?>
</body>
</head></html>