<?php
  session_start();
require('connect.php');
if (isset($_POST['email']) and isset($_POST['password'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
$query = "SELECT * FROM Users WHERE Email='$email' and Password='$password'";
$result = mysqli_query($connection, $query)  or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count == 1){
      $_SESSION['email'] = $email;
  header("Location: http://www.project-managment.site/index.php");
} else {
  $fsmsg = "Ошибка";
}
}

if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  echo "Hello".$email."";
  echo "Вы вошли";
  echo "<a href='logout.php' class='btn btn-outline-dark'> Logout </a>";
}
 ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Login</title>



  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">



  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

<style>
    .form-signin{
margin: 0;
}
</style>

  <form class="form-signin" method="POST">
  
    <h1 class="h3 mb-3 font-weight-normal">Войдите</h1>
<?php if(isset($fsmsg)) { ?><div class ="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div><?php }?>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required />  
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required/>
  
    <button class="btn btn-outline-dark btn-block" type="submit" >Войти в систему</button>
    <a href="home.php" class="btn btn-outline-dark btn-block">Зарегистрироваться</a>
    <p class="mt-5 mb-3 text-muted" >&copy;2020 Атеев К.О.</p>
  </form>

  
 
</body>

</html>