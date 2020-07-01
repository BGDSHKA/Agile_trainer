<?php
  session_start();
  require('connect.php');
   if(!$_SESSION['email'])
    {
    header('location:/home.php'); //переадресация на страницу входа
    exit();
    }
?>
<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Отработка этапов проектного менеджмента</title>

   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
     <script src="js\jquery-3.4.1.min.js"></script>
<script src="js\bootstrap.min.js"></script>
    
<!-- Custom styles for this template -->
        <link href="css/navbar-fixed-top.css" rel="stylesheet">

  </head>
  <body>

     
      <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
          }
    
          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          
                 .container {
                  max-width: 1920px;
    padding: 0 140px;
          }
          
          @media(max-width:766px){
.container {
padding:0 5px;
}
          
        </style>
      
  
                   <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">PM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="group.php">Группа <span class="sr-only">(current)</a>
                </li>
            <li class="nav-item active">
              <a class="nav-link" href="project.php">Проект <span class="sr-only">(current)</a>
            </li>
            <li class="nav-item active">
                    <a class="nav-link" href="zadachi.php">Задачи <span class="sr-only">(current)</a>
                  </li>
                  <li class="nav-item active">
                        <a class="nav-link" href="poisk.php">Поиск <span class="sr-only">(current)</a>
                      </li>
                    </li>
                    <li class="nav-item active">
                          <a class="nav-link" href="chat.php">Чат <span class="sr-only">(current)</a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="timeline.php">План <span class="sr-only">(current)</a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="nsi.php">НСИ <span class="sr-only">(current)</a>
                        </li>
                        
                        <li class="nav-item active">
                          <a class="nav-link" href="organisation.php">Организация <span class="sr-only">(current)</a>
                        </li>
                        
                        <li class="nav-item active">
                          <a class="nav-link" href="cabinet.php">Личный кабинет <span class="sr-only">(current)</a>
                        </li> 

<li class="nav-item active">
<div class="dropdown">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Cкачать НСИ
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php  $sql = mysqli_query($connection, "SELECT `IDNsi`, `NazvanieNsi`, `Uchastnik`, `KommentariyNsi`, `FileNsi` FROM `Nsi`");
                      while ($result = mysqli_fetch_array($sql)): ?> 
   <?php echo "<a class='dropdown-item' href='{$result['FileNsi']}'>{$result['NazvanieNsi']}</a>"; ?>
    <?php endwhile; ?>
  </div>
</div>
</li> 
                        <li><?php 
  $email = $_SESSION['email'];
  echo "<a href='logout.php' class='btn btn-light float-right' style='margin-left: 5px;'> Выйти </a>";
?></li>
          </ul>
        </div>
      </nav>


     <?php 
        
    //Если adding нажата
     if (isset($_POST["adding"])){ $sql = mysqli_query($connection, "INSERT INTO `Project` (`NazvanieProjecta`,`KodGruppi`, `DataSozdaniya`) VALUES ('{$_POST['NazvanieProjecta']}', '{$_POST['KodGruppi']}', '{$_POST['DataSozdaniya']}')"); 
    
      //Если вставка прошла успешно 
      if ($sql) {
       echo '<div class ="alert alert-success" role="alert">Успешно!</div>';
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
}
     }
     
    if (isset($_POST["saving"])) {
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($connection, "UPDATE `Project` SET `NazvanieProjecta`= '{$_POST['NazvanieProjecta']}', `KodGruppi` = '{$_POST['KodGruppi']}',`DataSozdaniya` = '{$_POST['DataSozdaniya']}' WHERE `KodProjecta`={$_GET['red_id']} ");
      } 
         
      //Если вставка прошла успешно 
      if ($sql) {
       echo '<div class ="alert alert-success" role="alert">Успешно!</div>';
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
}
    }


    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($connection, "SELECT * FROM `Project` WHERE `KodProjecta`={$_GET['red_id']}");
      $group = mysqli_fetch_array($sql);
    }

  ?>

 <div class="container">
     <div class="row">
 <div class="col-md-12">
        <form class="form-horizontal" method="POST"> 
                <fieldset>
                
                <!-- Form Name -->
                <legend>Проекты</legend>
                
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="control-label" for="textinput">Название проекта</label>  
                  <div>
                  <input id="textinput" name="NazvanieProjecta" type="text" placeholder="Название" class="form-control input-md" required="" value="<?= isset($_GET['red_id']) ? $group['NazvanieProjecta'] : ''; ?>">
                    
                  </div>
                </div>
                
               <!-- Select Basic -->
<div class="form-group">
  <label class="control-label" for="selectbasic">Выберите группу</label>
  <div>
    <select id="selectbasic" name="KodGruppi" class="form-control">
        <option value="<?= isset($_GET['red_id']) ? $group['KodGruppi'] : ''; ?>"><?= $group['KodGruppi']; ?></option>
        <?php 
     $sql = mysqli_query($connection, "SELECT DISTINCT `KodGruppi` FROM `Gruppa`");
    while ($result = mysqli_fetch_array($sql)): ?>
      <option value="<?= $result['KodGruppi']; ?>"><?= $result['KodGruppi']; ?></option>
    <?php endwhile; ?>
    </select>
  </div>
</div>
          
            
     <!-- Text input-->
            <div class="form-group" style="margin-bottom: 0px;">
              <label class="control-label" for="textinput">Дата</label>  
              <div>
              <input id="textinput" name="DataSozdaniya" type="text" placeholder="ГГГГ-ММ-ДД" class="form-control input-md" value="<?= isset($_GET['red_id']) ? $group['DataSozdaniya'] : ''; ?>">
                
              </div>
            </div>

<!-- Button -->
<div class="form-group">
  <label class="control-label" for="singlebutton"></label>
  <div>
    <button id="singlebutton" class="btn btn-outline-dark" name="adding">Добавить</button>
      <button id="singlebutton" class="btn btn-outline-dark" name="saving">Сохранить</button>
  </div>
</div>
</fieldset>
 </form>

  <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                  <tr>
                    <td>Код проекта</td>
                    <td>Название проекта</td>
                    <td>Группа</td>
                    <td>Дата создания</td>
                    <td></td>
                  </tr> </thead>
                  <?php
         
                    $sql = mysqli_query($connection, "SELECT `KodProjecta`, `NazvanieProjecta`, `KodGruppi`, `DataSozdaniya` FROM `Project` ");
                    while ($result = mysqli_fetch_array($sql)) {echo '<tr>' .
                          "<td>{$result['KodProjecta']}</td>" .
                           "<td>{$result['NazvanieProjecta']}</td>" .
                           "<td>{$result['KodGruppi']}</td>" .
                           "<td>{$result['DataSozdaniya']}</td>" .
                           "<td><a class='btn btn-outline-dark btn-block' href='?red_id={$result['KodProjecta']}'>Редактировать</a></td>" .
                           '</tr>';
                    }
                  ?>
                </table>
</div>

</div>
</div>
</div>

  </body>
</html>