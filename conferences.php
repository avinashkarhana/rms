<?php 
@include "logincheck.php";
//Save Details
if(@$_POST['z'])
{
	@$confname=$_POST['confname'];
	@$conftype=$_POST['conftype'];
	@$confplace=$_POST['confplace'];
	@$confdate=$_POST['confdate'];
	@$docno=$_POST['docno'];
	if($confname && isset($conftype) && $confplace && $confdate)
	{   include"conn.php";
		$result111= $db->query("use rms");
		if(!$result111)
			echo'Can not connect to Database.<br><br>';
		$q="insert into conferences (uidai,confname,conftype,confplace,confdate,docno) values('".$user."','".$confname."','".$conftype."','".$confplace."','".$confdate."','".$docno."')";
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
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Conference Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table border=1><tr><th>Conference Name</th><th>Conference Type</th><th>Conference Place</th><th>Conference Date</th><th>Supporting Document(Size<100KB)</th><th></th></tr>';
$qe="select * from conferences where uidai='".$user."' order by confdate";
$qw=$db->query($qe);
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>'.$row1['confname'].'</td><td>';
	if($row1["conftype"]=='1'){echo"PhD";}
	if($row1["conftype"]=='0'){echo"PG";}
	echo'</td><td>'.$row1['confplace'].'</td><td>'.$row1['confdate'].'</td><td><form enctype="multipart/form-data" id="form2" action="upload.php"  method="POST">';
	if($row1['docno'])
		echo'Document already uploaded as<a href="img/candidate/'.$user.'/'.$row1['docno'].'.jpg" >HERE</a><br>To update upload again<br><input type="hidden" name="docno" value="'.$row1['docno'].'" />';
	echo'<input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="conferences" /><input type="hidden" name="confname" value="'.$row1["confname"].'" /><input type="hidden" name="confdate" value="'.$row1["confdate"].'" /><input type="file" style="padding:0;;width:380;" name="file" id="file" required /><input type="submit" value="Upload"></form></td><td><form action="rmdetails.php"  method="POST"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="conferences" /><input type="hidden" name="confname" value="'.$row1["confname"].'" /><input type="hidden" name="confdate" value="'.$row1["confdate"].'" /><input type="submit" name="conferences" value="Delete" /></form></td></tr>';
}
echo'</table>';

?><br><br><br><br>
<akarhana>
<table align="center"><form id='form1' action="" method="POST">
<tr><td><p align="right">Conference Type</p></td><td><select name="conftype">
<option value="0">International</option>
<option value="1">National</option>
<option value="2">Regional</option>
</select><br></td></tr>
<tr><td><p align="right">Conference Name</p></td><td>
<input type="text" name="confname" />
<br></td></tr>
<tr><td><p align="right">Conference Place</p></td><td><input type="text" name="confplace"><br></td></tr>
<tr><td><p align="right">Conference Date</p></td><td><input type="date" name="confdate"><br></td></tr>
<tr><td><p align="right">Save your records</p></td>
<td align="center"><input type="hidden" name="conferences" value="conferences" /><input class="sbutton" type="submit" name="z" value="Save"></form><br></td></tr></table>
<script>
</akarhana>