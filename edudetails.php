<?php 
@include "logincheck.php";
//Save Details
if(@$_POST['z'])
{
	@$class=$_POST['class'];
	@$subjects=$_POST['subjects'];
	@$institute=$_POST['institute'];
	@$pyear=$_POST['pyear'];
	@$omarks=$_POST['omarks'];
	@$tmarks=$_POST['tmarks'];
	@$percent=($omarks/$tmarks)*100;
	@$docno=$_POST['docno'];
	@$roll_no=$_POST['roll_no'];
	if($class && $roll_no && $subjects && $institute && $pyear && $omarks && $tmarks && $percent)
	{   include"conn.php";
		$result111= $db->query("use rms");
		if(!$result111)
			echo'Can not connect to Database.<br><br>';
		$q="insert into edudetails (class,roll_no,subjects,institute,pyear,omarks,tmarks,percent,docno,uidai) values('".$class."','".$roll_no."','".$subjects."','".$institute."' ,'".$pyear."','".$omarks."','".$tmarks."','".$percent."','".$docno."',".$user.")";
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
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Educational Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><br><table border=1><tr><th>Examination</th><th>Roll No</th><th>Marks Obtained</th><th>Total Marks</th><th>Percent</th><th>Year of Passing</th><th>Supporting Document(Size<100KB)</th><th></th></tr>';
$qw=$db->query("select * from edudetails where uidai='".$user."' order by pyear");
while($row1=mysqli_fetch_assoc($qw)){
	echo'<tr><td>'.$row1["class"].'</td><td>'.$row1["roll_no"].'</td><td>'.$row1["omarks"].'</td><td>'.$row1["tmarks"].'</td><td>'.$row1["percent"].'%</td><td>'.$row1["pyear"].'</td><td><form enctype="multipart/form-data" id="form2" action="upload.php"  method="POST">';
	if($row1['docno'])
		echo'Document already uploaded as<a href="img/candidate/'.$user.'/'.$row1['docno'].'.jpg" >HERE</a><br>To update upload again<br><input type="hidden" name="docno" value="'.$row1['docno'].'" />';
	echo'<input type="hidden" name="kind" value="doc" /><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="edudetails" /><input type="hidden" name="class" value="'.$row1["class"].'" /><input type="hidden" name="roll_no" value="'.$row1["roll_no"].'" /><input type="file" style="padding:0;;width:380;" name="file" id="file" required /><input type="submit" value="Upload"></form></td><td><form action="rmdetails.php"  method="POST"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="edudetails" /><input type="hidden" name="class" value="'.$row1["class"].'" /><input type="hidden" name="roll_no" value="'.$row1["roll_no"].'" /><input type="submit" name="edudetails" value="Delete" /></form></td></tr>';
}
echo'</table>';

?><br><br><br><br>
<akarhana>
<table align="center"><form id='form1' action="" method="POST">
<tr><td><p align="right">Examination passed:</p></td><td>
<select name="class">
<option value="10">High School</option>
<option value="12">Secondry Education</option>
<option value="UG">UG</option>
<option value="PG">PG</option>
<option value="PhD">PhD</option>
</select><br></td></tr>
<tr><td><p align="right">Institute/Board/University</p></td><td><input type="text" name="institute"><br></td></tr>
<tr><td><p align="right">Roll no</p></td><td><input type="text" name="roll_no"><br></td></tr>
<tr><td><p align="right">Year of Passing</p></td><td><select name="pyear">
<?php
$today=date("Y");
for($i=1988;$i<=$today;$i++){
echo'<option value="'.$i.'">'.$i.'</option>';
}
?>
</select><br></td></tr>
<tr><td><p align="right">Subjects</p></td><td><input type="text" name="subjects"><br></td></tr>
<tr><td><p align="right">Marks Obtained</p></td><td><input type="text" name="omarks"><br></td></tr>
<tr><td><p align="right">Total marks</p></td><td><input type="text" name="tmarks"><br></td></tr>
<tr><td><p align="right">Save your records</p></td>
<td align="center"><input type="hidden" name="edudetails" value="edudetails" /><input class="sbutton" type="submit" name="z" value="Save"></form><br></td></tr></table>
<script>
</akarhana>