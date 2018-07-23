<?php 
@include "logincheck.php";
//Save Details
if(@$_POST['z'])
{
	@$ptitle=$_POST['ptitle'];
	@$pjournel=$_POST['pjournel'];
	@$issn=$_POST['issn'];
	@$journeltype=$_POST['journeltype'];
	@$authortype=$_POST['authortype'];
	@$pyear=$_POST['pyear'];
	@$docno=$_POST['docno'];
	if($ptitle && isset($pjournel) && $issn && $journeltype && isset($authortype) && $pyear)
	{   include"conn.php";
		$result111= $db->query("use rms");
		if(!$result111)
			echo'Can not connect to Database.<br><br>';
		$q="insert into rpapers (ptitle,pjournel,issn,journeltype,authortype,pyear,uidai,docno) values('".$ptitle."','".$pjournel."','".$issn."','".$journeltype."','".$authortype."' ,'".$pyear."','".$user."','".$docno."')";
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
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Research Paper Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table border=1><tr><th>Paper Title</th><th>Paper Journel</th><th>Journel ISSN</th><th>Journel Type</th><th>Author Type</th><th>Publishing Year</th><th>Supporting Document(Size<100KB)</th><th></th></tr>';
$qe="select * from rpapers where uidai='".$user."' order by pyear";
$qw=$db->query($qe);
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>'.$row1['ptitle'].'</td><td>'.$row1['pjournel'].'</td><td>'.$row1['issn'].'</td><td>';
	if($row1["journeltype"]=='11'){echo"International refered";}
	if($row1["journeltype"]=='12'){echo"International Non-refered";}
	if($row1["journeltype"]=='21'){echo"National refered";}
	if($row1["journeltype"]=='22'){echo"National Non-refered";}
	echo'</td><td>';
	if($row1["authortype"]=='1'){echo"Author";}
	if($row1["authortype"]=='0'){echo"Co-Author";}
	echo'</td><td>'.$row1['pyear'].'</td><td><form enctype="multipart/form-data" id="form2" action="upload.php"  method="POST">';
	if($row1['docno'])
		echo'Document already uploaded as<a href="img/candidate/'.$user.'/'.$row1['docno'].'.jpg" >HERE</a><br>To update upload again<br><input type="hidden" name="docno" value="'.$row1['docno'].'" />';
	echo'<input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="rpaperdetails" /><input type="hidden" name="ptitle" value="'.$row1["ptitle"].'" /><input type="hidden" name="issn" value="'.$row1["issn"].'" /><input type="file" style="padding:0;;width:380;" name="file" id="file" required /><input type="submit" value="Upload"></form></td><td><form action="rmdetails.php"  method="POST"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="rpaperdetails" /><input type="hidden" name="ptitle" value="'.$row1["ptitle"].'" /><input type="hidden" name="issn" value="'.$row1["issn"].'" /><input type="submit" name="rpaperdetails" value="Delete" /></form></td></tr>';
}
echo'</table>';

?><br><br><br><br>
<akarhana>
<table align="center"><form id='form1' action="" method="POST">
<tr><td><p align="right">Paper Title:</p></td><td>
<input type="text" name="ptitle" />
<br></td></tr>
<tr><td><p align="right">Journel Name</p></td><td><input type="text" name="pjournel"><br></td></tr>
<tr><td><p align="right">Journel ISSN</p></td><td><input type="number" name="issn"><br></td></tr>
<tr><td><p align="right">Journel Type</p></td><td><select name="journeltype">
<option value="11">International refered</option>
<option value="12">International Non-refered</option>
<option value="21">National refered</option>
<option value="22">National Non-refered</option>
</select><br></td></tr>
<tr><td><p align="right">Author Type</p></td><td><select name="authortype">
<option value="1">Author</option>
<option value="0">Co-Author</option>
</select><br></td></tr>
<tr><td><p align="right">Publishing Year</p></td><td><input type="number" name="pyear">
<br></td></tr>
<tr><td><p align="right">Save your records</p></td>
<td align="center"><input type="hidden" name="rpaperdetails" value="rpaperdetails" /><input class="sbutton" type="submit" name="z" value="Save"></form><br></td></tr></table>
<script>
</akarhana>