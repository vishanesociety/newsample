<?php
session_start();
if(!isset($_SESSION['redirect']))
{
$_SESSION['redirect']="candidate.php";
}
$con= mysql_connect('localhost:3307','root','root') or die("mysql not connected");
$db= mysql_select_db('onlinevote',$con) or die("database not connected");
$result=mysql_query("SELECT candidateid,password from candidate WHERE candidateid = '$_POST[txtuser]' AND password= '$_POST[txtpassword]' ");

//$rows=mysql_num_rows($result);
$row=mysql_fetch_array($result);
if(!empty($row['candidateid']) AND !empty($row['password']))
{
$_SESSION['candidate']= $row['candidateid'];
header ("Refresh: 2; URL=" . $_SESSION['redirect'] );
echo "You are being redirected to your original page request" ;
}
else
{
echo "Invalid User or password";
echo "<br>You are going to redirect login page....";
header("Refresh:2; url=cndlogin.php");
}

mysql_close();
?>
