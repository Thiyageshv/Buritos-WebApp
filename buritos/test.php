<?php session_start();
if($_SESSION['loggedin']!=true)
  header("Location:homeuser.php");?>
<html>
<title><?php echo $_SESSION['username'];?></title>

<?php
   
   $user="root";
   $passwd="";
   $connect=mysql_connect('localhost',$user,$passwd) or die("connection error");
   $query2=mysql_select_db("franchisedetails",$connect);
   $query="SELECT * FROM keepers";
   $result=mysql_query($query);
   $row=mysql_num_rows($result);
   //echo $_POST["pizza veg"];
   
  // echo $_GET["veg"];?>     

 <?php $i=0;$total=0;
 while($i<$row)
 { $found=mysql_fetch_array($result)
;
   $franch=$found['shopname']."-".$found['branch'];
   
   $id2=$found['shopname'].$found['branch'];
   $query2="SELECT * FROM $id2";
   $result2=mysql_query($query2);
   $row2=mysql_num_rows($result2);
   $j=0;?>
   
   
   
  
   <?php while($j<$row2)
      {
        $found2=mysql_fetch_array($result2)
;
        $name=$found2['sno'].$id2;
        @$var=$_GET[$name];
        echo $name;
        }
}?>