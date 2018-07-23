<?php
$user=$_POST['user'];
$kind=$_POST['kind'];
$kind1=$kind;
include"conn.php";
$db->query("use rms");
if($kind=='edudetails'){
	$unq1='class';$unqd1=$_POST['class'];$unq2='roll_no';$unqd2=$_POST['roll_no'];}
if($kind=='pubdetails'){$kind="bookpub";
	  $unq1='isbn';$unqd1=$_POST['isbn'];$unq2='bookname';$unqd2=$_POST['bookname'];}
if($kind=='experiencedetails'){$kind="experience";
	  $unq1='expname';$unqd1=$_POST['expname'];$unq2='expfrom';$unqd2=$_POST['expfrom'];}
if($kind=='rpaperdetails'){$kind="rpapers";
	  $unq1='ptitle';$unqd1=$_POST['ptitle'];$unq2='issn';$unqd2=$_POST['issn'];}
if($kind=='rprojectdetails'){$kind="rprojects";
	  $unq1='projectname';$unqd1=$_POST['projectname'];$unq2='projamount';$unqd2=$_POST['projamount'];}
if($kind=='rguidancedetails'){$kind="rguidance";
	  $unq1='scholarname';$unqd1=$_POST['scholarname'];$unq2='rgthesisname';$unqd2=$_POST['rgthesisname'];}
if($kind=='conferences'){$kind="conferences";
	  $unq1='confname';$unqd1=$_POST['confname'];$unq2='confdate';$unqd2=$_POST['confdate'];}
if($kind=='references'){$kind="creferences";
	  $unq1='refname';$unqd1=$_POST['refname'];$unq2='refmobile';$unqd2=$_POST['refmobile'];}
if($kind=='application'){$kind="applications";
	  $unq1='appno';$unqd1=$_POST['appno'];$unq2='advertno';$unqd2=$_POST['advertno'];}
echo'<form name="formr" action="home.php" method="POST"><input type="hidden" name="'.$kind1.'" value="'.$kind1.'" /></form>';
	if($kind!=='applications'){$a=mysqli_fetch_assoc($db->query("select docno from ".$kind." where uidai='".$user."' AND ".$unq1."='".$unqd1."' AND ".$unq2."='".$unqd2."'"));
	if($a['docno']){unlink("img/candidate/".$user."/".$a['docno'].".jpg");}}
	$qa="delete from ".$kind." where uidai='".$user."' AND ".$unq1."='".$unqd1."' AND ".$unq2."='".$unqd2."'";
if($db->query($qa))
	echo"Deleted.  Refresh on next page by clicking respective button.<a style='color:blue;cursor:pointer;' onClick='formr.submit()'>Back to Home</a>";
echo $db->error;
?>