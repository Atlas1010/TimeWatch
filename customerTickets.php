<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <title>Document</title>
</head>
<body>
<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once('api.php');
$userName = $_GET['UserName'];
?>
</br>
<?php



  $selby="SELECT  TicketId ,UserName,TicketDate,Subject,Details FROM Tickets where UserName = '".$userName."'";

$seljoin="SELECT C.CustomerId ,C.FirstName,C.LastName,C.UserName,C.Phone FROM Customers  C inner join
 ($selby) S
 on C.UserName=S.UserName ";

$resultby = $conn -> query($seljoin);

if (mysqli_num_rows($resultby) > 0) {

  $row = mysqli_fetch_assoc($resultby);?>
<div class="title">
  <h2> Welcome <?php echo $row["FirstName"] ;?>   <?php echo $row["LastName"] ; ?>! </h2></div>
<div class="detais">
  <h3> User name: <?php echo $row["UserName"] ;?>  </h3>
  <h3>  Phone: <?php echo $row["Phone"] ; ?> </h3>
</div>
  <?php 
  }
  
  else 
  {
    echo "0 results";
  }
?>
</br>
<?php
//Tickets
//$selby="SELECT TicketId ,UserName,TicketDate,Subject,Details FROM Tickets where UserName = '".$userName."'";
$resultby = $conn -> query($selby);

if (mysqli_num_rows($resultby) > 0) {?>
<table>
<?php 
?>   <tr>
      <th scope="col">TicketId</th>
      <th scope="col">UserName</th>
      <th scope="col">TicketDate</th>
      <th scope="col">Subject</th>
	  <th scope="col">Details</th>
    </tr>
</br><?php
    while($row = mysqli_fetch_assoc($resultby)) { ?>

	 <tr >
	 <td ><?php echo $row["TicketId"] ?></td>
	 <td >	<?php echo $row["UserName"] ?></td >
	 <td ><?php echo $row["TicketDate"] ?></td>
	 <td ><?php echo $row["Subject"] ?></td>
	 <td ><?php echo $row["Details"] ?></td>
	</tr>
	 <?php } ?>
  </table>
  <?php
  } 
 
  else 
  {
    echo "0 results";
  }

?>
<br><br>
<br>

<a href="index.php" class="Search">Back to tickets</a>
 
</body>
</html>
