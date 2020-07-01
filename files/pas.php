
<?php

     
 include '../connect.php';
?>


<?php   

      
 
  $sql="SELECT * FROM Users";
 
   $result=mysqli_query($connection,$sql);
   

  while($row=mysqli_fetch_assoc($result)){
    
          print_r($row);
   
 }
   
  
 
  
?>
