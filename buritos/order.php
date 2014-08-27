 <?php session_start();
  if($_SESSION['loggedin']!=true)
  header("Location:homeuser.php");?>

<html>
<title><?php echo $_SESSION['username'];?></title>
<body>
<?php
    
 
   $uname=$_SESSION['username'];
   //$uname=mysql_real_escape_string($uname);
   $user="root";
   $passwd="";
   $connect=mysql_connect('localhost',$user,$passwd) or die("connection error");
   $query2=mysql_select_db("franchisedetails",$connect);
   $query="SELECT * FROM keepers";
   $result=mysql_query($query);
   $row=mysql_num_rows($result);
   //echo $_POST["pizza veg"];
   
  // echo $_GET["veg"];?>     
<div id="addmenu" style="position:absolute;left:550;top:200;width:400;height:800;">
 <?php
    
    $orderid=date('s').date('m');
	$date=date("Y-m-d");
	$i=0;$total=0;
	$orderid2="f".$orderid;
	
	$create="CREATE TABLE $orderid2(fooditem varchar(50),shopname varchar(20),status varchar(20) default 'notready')";
	$cresult=mysql_query($create);
	if(!$cresult)
	echo mysql_error();
	
	
	
	
 while($i<$row)
 { $found=mysql_fetch_array($result);
   $franch=$found['shopname']."-".$found['branch'];
   
   $id2=$found['shopname'].$found['branch'];
   $index=$found['shopname']."order";   
   $query2="SELECT * FROM $id2";
   $result2=mysql_query($query2);
   $row2=mysql_num_rows($result2);
   $j=0;
   ?>
   
   
   <table>
  
   <?php while($j<$row2)
      {
        $found2=mysql_fetch_array($result2);
        $name=$found2['sno'].$id2;
	
		$tname=$found['shopname']."order";
        @$var=$_GET[$name];
        echo "<tr>";
        if(@$var=="on")
        {
          echo "<td>".$found2['fooditem'];
          echo "<td>";echo "<td>";echo "<td>";echo "<td>";
          echo "<td>".$found2['price'];
          $total=$total+$found2['price'];
		  //$orderid=intval($found2['sno'].$total);
		  $foodprice=intval($found2['price']);
		  
		  $fooditem=$found2['fooditem']; //=mysql_real_escape_string($found2['fooditem']);
		  
		  $ins="INSERT INTO $tname(username,orderid,fooditem,price)VALUES('$uname',$orderid,'$fooditem',$foodprice)";
		  $resultins=mysql_query($ins);
          if(!$resultins)
		  echo mysql_error();
		  $oins="INSERT INTO $orderid2 VALUES('$fooditem','$index','notready')";
		  $orderresult=mysql_query($oins);
		  if(!$orderresult)
		  mysql_error();
	       	   
		  
        }
          echo "</tr>";
          $j++;
       }
      ?>

   <?php  $i++;
         }
		 
	$ins2="INSERT INTO franchisedetails.order VALUES('$uname',$orderid,$total,'$date')";
	 $resultins2=mysql_query($ins2);
     if(!$resultins2)
	 echo mysql_error();
   
    if(@$_POST["submit"])
   {
	 
	 $_SESSION['msg']="Thankyou for choosing us!We would deliver the food as soon as possible";
     header("Location:useraccount.php"); 
    }
	 
	 ?>
<tr>
<td><font color="red">TOTAL AMOUNT:</font></td>
<td><td><td><td>
<td><?php echo $total;?> </td>
</tr>
 </table>
<br />
<form action="useraccount.php" method="POST">
<input type="submit" name="submit" value="confirm order!" />
</form>

</div>
<a href="useraccount.php">click here to go back</a>
</body>
</html>