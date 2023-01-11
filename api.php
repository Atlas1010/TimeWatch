<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ticket Manager";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Customers (FirstName, LastName, UserName,Phone)
VALUES ('Sara','Atlas', 'sm053', '12345')";

//All tickets
$sel="SELECT TicketId ,UserName,TicketDate,Subject,Details FROM Tickets";
if ($conn->query($sel) === TRUE) {
 // echo $sel;
}
 else {
 // echo "Error: " . $sel . "<br>" . $conn->error;
 }
$result = mysqli_query($conn, $sel);

//ID
$ticketId="SELECT DISTINCT TicketId  FROM Tickets";
if ($conn->query($ticketId) === TRUE) {
  // echo $sel;
 }
  else {
  // echo "Error: " . $sel . "<br>" . $conn->error;
  }
  $id=Array();
 $resultid = mysqli_query($conn, $ticketId);
 if (mysqli_num_rows($resultid) > 0) {
 while($rowid = mysqli_fetch_assoc($resultid)) { 
$id[]=$rowid["TicketId"];

 }
}
//userName
$user="SELECT DISTINCT UserName FROM Tickets";
if ($conn->query($user) === TRUE) {
  // echo $sel;
 }
  else {
  // echo "Error: " . $sel . "<br>" . $conn->error;
  }
  $userArray=Array();
 $resultuser = mysqli_query($conn, $user);
 if (mysqli_num_rows($resultuser) > 0) {
 while($rowuser = mysqli_fetch_assoc($resultuser)) { 
$userArray[]=$rowuser["UserName"];

 }
}
//date
$date="SELECT DISTINCT TicketDate FROM Tickets";
if ($conn->query($date) === TRUE) {
  // echo $sel;
 }
  else {
  // echo "Error: " . $sel . "<br>" . $conn->error;
  }
  $dateArray=Array();
 $resultdate = mysqli_query($conn, $date);
 if (mysqli_num_rows($resultdate) > 0) {
 while($rowdate = mysqli_fetch_assoc($resultdate)) { 
$dateArray[]=$rowdate["TicketDate"];

 }
}
//subject
$sub="SELECT DISTINCT Subject FROM Tickets";
if ($conn->query($sub) === TRUE) {
  // echo $sel;
 }
  else {
  // echo "Error: " . $sel . "<br>" . $conn->error;
  }
  $subArray=Array();
 $resultsub = mysqli_query($conn, $sub);
 if (mysqli_num_rows($resultsub) > 0) {
 while($rowsub = mysqli_fetch_assoc($resultsub)) { 
$subArray[]=$rowsub["Subject"];

 }
}

if(!empty($_POST['input']) || isset($_POST['input'])){

  $type = htmlentities(strtolower($_POST['input']));

  if($_POST['input']==''){
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) { 
      echo $row["TicketId"];
      echo ";";
     echo  $row["UserName"];
      echo ";";
      echo  $row["TicketDate"]; 
      echo ";";
      echo  $row["Subject"]; 
      echo ";";
      echo  $row["Details"];
      echo ";";
}
	 
  } 
  else 
  {
    echo "0 results";
  }  }
  else{
//  echo $_POST['input']; 
$ex=explode(',',$_POST['input']);
$e=0;
$a='';$b='';$c='';$d='';
while($e<sizeof($ex)){

  if($ex[$e]=='UserName')
  $a=$ex[$e+1];
  if($ex[$e]=='TicketId')
  $b=$ex[$e+1];
  if($ex[$e]=='TicketDate')
  $c=$ex[$e+1];
  if($ex[$e]=='Subject')
  $d=$ex[$e+1];
   $e+=2;
}
//echo $a;echo $b;echo $c;echo $d;
if($a!=''){
  $re="select * from Tickets where UserName= '".$a."'"; 
}
else{
  if($b!=''){
    $re="select * from Tickets where TicketId= '".$b."'"; 
  }
  else{
    if($c!='' && $d!=''){
      $re="select * from Tickets where Subject= '".$d."' and TicketDate= '".$c."' ";  
    }
    else{
      if($c!=''){
        $re="select * from Tickets where  TicketDate= '".$c."' ";  
      }
      else{
        $re="select * from Tickets where Subject= '".$d."'  ";  
      }
    }
  }
}





    $res = mysqli_query($conn, $re);
    
    if (mysqli_num_rows($res) > 0) {
      while($row = mysqli_fetch_assoc($res)) { 
        echo $row["TicketId"];
        echo ";";
       echo  $row["UserName"];
        echo ";";
        echo  $row["TicketDate"]; 
        echo ";";
        echo  $row["Subject"]; 
        echo ";";
        echo  $row["Details"];
        echo ";";
  }
     
    } 
    else 
    {
      echo "0 results";
    } 
   
  }
 echo $_POST['input']; 
  } else {

  }


  ?>