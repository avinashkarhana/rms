<?php 
@include "logincheck.php";
//Save Details
if(@$_POST['z'])
{
	@$refname=$_POST['refname'];
	@$refmobile=$_POST['refmobile'];
	@$refmail=$_POST['refmail'];
	@$refaddress=$_POST['refaddress'];
	@$docno=$_POST['docno'];
	if($refname && isset($refmobile) && $refmail && $refaddress)
	{   include"conn.php";
		$result111= $db->query("use rms");
		if(!$result111)
			echo'Can not connect to Database.<br><br>';
		$q="insert into creferences (uidai,refname,refmobile,refmail,refaddress,docno) values('".$user."','".$refname."','".$refmobile."','".$refmail."','".$refaddress."','".$docno."')";
		$query=$db->query($q);
		$e=$db->error;
		if(!$query)
		echo $e."error";
		if($e)
		{ echo $e;	}
		else
		{
			echo"<script>alert('Saved Successfuly !');</script>";
		}
	}
	else
	echo"Some Details Left Blank.";	
}
//Show
include"conn.php";
if(!$db->query("use rms"))
	echo'Can not connect to Database.<br><br>';
echo'<h2 style="margin-bottom:0;padding-bottom=0;">References</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table border=1><tr><th>Reference Name</th><th>Reference Mobile</th><th>Reference Mail</th><th>Reference Address</th><th>Supporting Document(Size<100KB)</th><th></th></tr>';
$qe="select * from creferences where uidai='".$user."' order by refname";
$qw=$db->query($qe);
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>'.$row1['refname'].'</td><td>'.$row1['refmobile'].'</td><td>'.$row1['refmail'].'</td><td>'.$row1['refaddress'].'</td><td><form enctype="multipart/form-data" id="form2" action="upload.php"  method="POST">';
	if($row1['docno'])
		echo'Document already uploaded as<a href="img/candidate/'.$user.'/'.$row1['docno'].'.jpg" >HERE</a><br>To update upload again<br><input type="hidden" name="docno" value="'.$row1['docno'].'" />';
	echo'<input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="references" /><input type="hidden" name="refname" value="'.$row1["refname"].'" /><input type="hidden" name="refmobile" value="'.$row1["refmobile"].'" /><input type="file" style="padding:0;;width:380;" name="file" id="file" required /><input type="submit" value="Upload"></form></td><td><form action="rmdetails.php"  method="POST"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="references" /><input type="hidden" name="refname" value="'.$row1["refname"].'" /><input type="hidden" name="refmobile" value="'.$row1["refmobile"].'" /><input type="submit" name="references" value="Delete" /></form></td></tr>';
}
echo'</table>';

?><br><br><br><br>
<akarhana>
<table align="center"><form id='form1' action="" method="POST">
<tr><td><p align="right">Name:</p></td><td><input type="text" name="refname" /><br></td></tr>
<tr><td><p align="right">Institute Address</p></td><td><input type="text" name="refaddress"><br></td></tr>
<tr><td><p align="right">Mobile</p></td><td><input type="number" name="refmobile"><br></td></tr>
<tr><td><p align="right">Email</p></td><td><input type="email" name="refmail"><br></td></tr>
<tr><td><p align="right">Save your records</p></td>
<td align="center"><input type="hidden" name="references" value="references" /><input class="sbutton" type="submit" name="z" value="Save"></form><br></td></tr></table>
<script>
</akarhana>