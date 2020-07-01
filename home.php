<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Registration</title>



  <!-- Bootstrap core CSS -->
 
<link rel="stylesheet" href="css/bootstrap.css">



  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
    
<?php
require('connect.php');
if (isset($_POST['email']) and isset($_POST['password'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "INSERT INTO Users(Email,Password) VALUES('$email', '$password')";
$result = mysqli_query($connection, $query);

if($result){
  $smsg = "Регистрация прошла успешно";
} else {
  $fsmsg ="Ошибка";
}
}
?>

<style>
    .form-signin{
margin: 0;
}
</style>

  <form class="form-signin" method="POST">
  
   <h1 class="h3 mb-3 font-weight-normal">Зарегистрируйтесь</h1>
<?php if(isset($smsg)) { ?><div class ="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php }?>
<?php if(isset($fsmsg)) { ?><div class ="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div><?php }?>
    <input type="email" name="email" class="form-control" placeholder="Email address" required />
    
    <input type="password" name="password" class="form-control" placeholder="Password" required />
  
    <button class="btn btn-outline-dark btn-block" type="submit" >Зарегистрироваться</button>
    <a href="login.php" class="btn btn-outline-dark btn-block" >Войти в систему</a>
    <p class="mt-5 mb-3 text-muted" >&copy;2020 Атеев К.О.</p>
  </form>

</body>

</html>