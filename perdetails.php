<?php 
@include "logincheck.php";
//Save Details
if(@$_POST['z'])
{
	@$pwd=$_POST['pwd'] ;
	@$marital=$_POST['marital'] ;
	@$pass=$_POST['pass'] ;
	@$fname=$_POST['fname'] ;
	@$mname=$_POST['mname'] ;
	@$catcode=$_POST['catcode'] ;
	@$email=$_POST['email'];
	@$address=$_POST['address']  ;
	@$state=$_POST['state'] ;
	@$pin=$_POST['pin'] ;
	@$nationality=$_POST['nationality'] ;
	@$relegion=$_POST['relegion'] ;
	@$dob=$_POST['dob'] ;
	@$name=$_POST['name']  ;
	@$sex=$_POST['sex'] ;
	@$mobile=$_POST['mobile'];
	if( @$pass && @$fname && @$mname && @$catcode && @$email&& @$address  && @$state && @$pin && @$nationality && @$relegion && @$dob && @$name && @$sex && @$mobile)
	{   include"conn.php";
		$result111= $db->query("use rms");
		if(!$result111)
			echo'Can not connect to Database.<br><br>';
		$q="update candidates set sex='".$sex."', name='".$name."', mobile='".$mobile."',pass='".$pass."',email='".$email."',catcode='".$catcode."',state='".$state."',pin='".$pin."',nationality='".$nationality."',fname='".$fname."',mname='".$mname."',address='".$address."',pwd='".$pwd."',dob='".$dob."',relegion='".$relegion."',marital='".$marital."' Where uidai=".$user."";
		$e=$db->error;
		$query=$db->query($q);
		if(!$query)
		echo $e."error";
		if($e)
		{ echo $e;	}
		else
		{echo"<script>alert('Details Saved !')</script>";		}
	}
	else
	echo"Some Details Left Blank.";	
}

//Form
include "conn.php";
$db->query("use rms");
$result=$db->query("select * from candidates where uidai like'".$user."'");
@$a=mysqli_fetch_assoc($result);
if($a['status']=0 || $a['status']=1 || $a['status']=2)
	$pic_edit_visible="block";
else
	$pic_edit_visible="none";
echo'<h2 style="margin-bottom:0;padding-bottom=0;">Personal Details</h2><hr width="20%" style="margin-top:0;" color="7CC8E7" align="left"><hr size=6 solid color="black"><p align="center"><img src="img/candidate/'.$user.'/'.$user.'p.jpg" height=280 width=220 /></p><p align="center"><img src="img/candidate/'.$user.'/'.$user.'s.jpg" height=50 width=110 /></p>
<table align="center">
<tr><td>Photo</td><td><aq style="display:'.$pic_edit_visible.'">Upload photo(max. size 80kb)<br><form action="upload.php" method="POST" enctype="multipart/form-data"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="p" /><input style="padding-right:15.5px;width:65%;" type="file" id="file" name="file" /><input class="sbutton" style="padding-top:0.5px" type="submit" value="Upload" /></form></aq></td><td>Sign</td><td><aq style="display:'.$pic_edit_visible.'">Upload sign(max. size 20kb)<br><form action="upload.php" method="POST" enctype="multipart/form-data"><input type="hidden" name="user" value="'.$user.'" /><input type="hidden" name="kind" value="s" /><input style="padding-right:15.5px;width:65%;" type="file" id="file" name="file" /><input class="sbutton" style="padding-top:0.5px" type="submit" value="upload" /></form></aq></td></tr></table>

<br><br><kavinash  style="position: absolute; width: 70%; border-radius: 5px;background-color: #ccc;left:10%; padding: 20px;bottom:60px; top: 900px; height:1050px;"><form action="" method="post"><table><tr><td><avi>Name</avi></td><td><select style="width: 16%;padding: 12px;display: inline;margin-right: 0;padding-right: 5px;" selected="'.$a['sex'].'" name="sex"><option value="M">Mr.</option><option value="F">Miss.</option></select><input  style="width:82%;float:right;margin-right:-8px;" type="text" name="name" value="'.$a['name'].'" /></td></tr><tr><td><avi>UIDAI (Aadhar Number)</avi></td><td><input type="number" max="999999999999" min="100000000000" name="uidai" readonly value="'.$a['uidai'].'" /></td></tr><tr><td><avi>Password</avi></td><td><input  type="password" name="pass" value="'.$a['pass'].'" /></td></tr><tr><td><avi>Mobile</avi></td><td><input  type="number" max="9999999999" min="5999999999" name="mobile" value="'.$a['mobile'].'" /></td></tr>
<tr><td><ab>Category</ab></td><td> 
<select name="catcode" required>';
$result=$db->query('select catcode from candidates where uidai="'.$user.'"');
$results=$db->query('select * from category');
$row1=mysqli_fetch_assoc($result);
while($row11=mysqli_fetch_assoc($results)){
if($row11[catcode]==$row1[catcode])
	  echo"<option value='".$row11[catcode]."' selected >".$row11[catname]."</option>";
else
	  echo"<option value='".$row11[catcode]."'>".$row11[catname]."</option>";
}
echo '</select></td></tr>
<tr><td><ab>Email</ab></td><td><input type="email" name="email" value="'.@$a[email].'" size=30 required autocomlete="on" /></td></tr>
<tr><td><ab>Father Name</ab></td><td><input type="text" name="fname" value="'.@$a[fname].'" required /></td></tr>
<tr><td><ab>Mother Name</ab></td><td><input type="text" name="mname" value="'.@$a[mname].'" required /></td></tr>
<tr><td><ab>Address</ab></td><td><input type="text" name="address"  value="'.@$a[address].'" size=52 required /></td></tr>
<tr><td><ab>State</ab></td><td><input type="text" name="state"  value="'.@$a[state].'" size=52 required /></td></tr>
<tr><td><ab>PIN</ab></td><td><input type="text" name="pin"  value="'.@$a[pin].'" size=52 required /></td></tr>
<tr><td><ab>Nationality</ab></td><td><input type="text" name="nationality"  value="'.@$a[nationality].'" size=52 required /></td></tr>
<tr><td><ab>Relegion</ab></td><td><input type="text" name="relegion"  value="'.@$a[relegion].'" size=52 required /></td></tr>
<tr><td><ab>Date of Birth</ab></td><td><input id="dob" type="text" name="dob" onfocusout="date()" onfocus="date()"  value="'.@$a[dob].'" size=52 required /><script>
function date() {
  var p = document.getElementById("dob");
  if(p.getAttribute("type")=="text") 
    p.setAttribute("type", "date");
  else
    p.setAttribute("type", "text");
}
</script></td></tr>
<tr><td><ab>Person with Disablity ?</ab></td><td><select name="pwd" required>';
$result1=$db->query('select pwd from candidates where uidai="'.$user.'"');
$row2=mysqli_fetch_assoc($result1);
if($row2[pwd]=='1')
	  echo"<option value='1' selected >YES</option>";
else
	  echo"<option value='1'>YES</option>";
if($row2[pwd]=='0')
	  echo"<option value='0' selected >NO</option>";
else
	  echo"<option value='0'>NO</option>";
echo'</select></td></tr><tr><td><ab>Marital</ab></td><td><select name="marital" required>';
$result2=$db->query('select marital from candidates where uidai="'.$user.'"');
$row3=mysqli_fetch_assoc($result2);
if($row3[marital]=='1')
	  echo"<option value='1' selected >Married</option>";
else
	  echo"<option value='1'>Married</option>";
if($row3[marital]=='0')
	  echo"<option value='0' selected >Unmarried</option>";
else
	  echo"<option value='0'>Unmarried</option>";
echo'</select></td></tr>';

echo'</table><p align="center"><input type="hidden" value=1 name="perdetails" /><input class="sbutton" type="submit" value="Save" name="z" /></p></form></kavinash>';
	
?>