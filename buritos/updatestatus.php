<?php session_start();
if($_SESSION['loggedin']!=true)
  header("Location:home.php");  
 $user="root";
   $passwd="";
   $connect=mysql_connect('localhost',$user,$passwd) or die("connection error");
   $query2=mysql_select_db("franchisedetails",$connect);
   if(!$query2)
   echo mysql_error();
   $dbname=$_SESSION['shop'].$_SESSION['branch'];
   $tname=$_SESSION['shop']."order";

    $query="SELECT * FROM $tname";
    $result=mysql_query($query);
	if(!$result)
	echo mysql_error();
    $row=mysql_num_rows($result);
   
  $i=0;
  
   while($i<$row)
 { $found=mysql_fetch_array($result);
   $id=$found['orderid'];
   $oid="f".$id;
   if($_POST["$id"]=="on")
  {
   $updatequery="UPDATE $tname SET status= 'Delivered' where orderid=$id";
  $result2=mysql_query($updatequery);
   if(!$result2)
   echo mysql_error();
   $updateuser="UPDATE $oid SET status= 'Delivered' where shopname='$tname'";
   $result3=mysql_query($updateuser);
   if(!$result3)
   echo mysql_error();
  }
    $i++;
}
 header("Location:account.php"); 
 ?>

   