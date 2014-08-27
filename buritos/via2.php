<?php session_start();
if($_SESSION['loggedin']!=true)
  header("Location:home.php");  
 $user="root";
   $passwd="";
   $connect=mysql_connect('localhost',$user,$passwd) or die("connection error");
   $dbname=$_SESSION['shop'].$_SESSION['branch'];
   $query2=mysql_select_db("franchisedetails",$connect);
   if(!$query2)
   echo mysql_error();
   $query="SELECT * FROM $dbname";
   $result=mysql_query($query);
   $row=mysql_num_rows($result);
   
  $i=0;
 while($i<$row)
 { $found=mysql_fetch_array($result);
  $id=$found['fooditem'];
  
  //echo $id;
  //echo $_POST["$id"];
  //echo $check;
  if($_POST["$id"]=="on")
  {
  $delquery="DELETE FROM $dbname WHERE fooditem='$id'";
  $result2=mysql_query($delquery);
   if(!$result2)
   echo mysql_error();
   
  }
  $i++;
  }
header("Location:account.php");
?>