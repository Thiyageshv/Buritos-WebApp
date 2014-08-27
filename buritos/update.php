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
   if(!$result)
   echo mysql_error();
   $row=mysql_num_rows($result);
   
  $i=0;
 while($i<$row)
 { $found=mysql_fetch_array($result)
;
    $id="f".$found['sno'];
    $id2=$found['sno'];
    $valf=$_POST[$id];
    $valp=$_POST[$id2];
    $updatequery="UPDATE $dbname SET fooditem='$valf',price='$valp' WHERE sno=$id2";
    //$updatequery2="UPDATE menu SET price='$valp'";
    $uresult=mysql_query($updatequery);
    //$uresult2=mysql_query($updatequery2);
    if(!$uresult)
    echo mysql_error();
    $i++;
}?>
<script type="text/javascript">
alert("succesfully updated!");
</script>
<?php
header("Location:account.php");
?>
  