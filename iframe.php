<?php
 session_start();
  require('connect.php');
  $email = $_SESSION['email'];
if(isset($_POST['message']) AND $_POST['message']!=""){
 $sql = mysqli_query($connection, "INSERT INTO `Messages` (`Email`,`Message`) VALUES ('$email','".$_POST['message']."')");
  
}

$sql = mysqli_query($connection, "SELECT `Message`, `Email`, `Date` FROM `Messages` ORDER BY `id` DESC");
while($row = mysqli_fetch_object($sql)){
 echo "<div style='color:#0047b3; font-weight: bold;'>",$row->Email,"&nbsp;&nbsp; ", $row->Date,"</div>";
 echo $row->Message;
 echo "<br/>";
 echo "<br/>";
}

?>
