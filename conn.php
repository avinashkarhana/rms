<?php
@ $db=new mysqli('127.0.0.1','root','');
if(mysqli_connect_errno())
{
 echo'Error: Could not connect to datatbase';
 exit;
}
?>