<?php
  session_start();
  require('connect.php');
   $email = $_SESSION['email'];
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
 
    <!-- Fixed navbar -->
    
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
            }
            
           
 .container{
                  max-width: 1920px;
    padding: 0 140px;
          }
          
          @media(max-width:766px){
.container{
padding:0 5px;
}
}


          </style>
        
      <?php 
        
        if(isset($_FILES['files'])){
     $uploaddir = 'docs/';
$uploadfile = $uploaddir . basename($_FILES['files']['name']);

//echo '<pre>';
if (move_uploaded_file($_FILES['files']['tmp_name'], $uploadfile)) {
// echo "Файл корректен и был успешно загружен.\n";
} else {
// echo "Ошибка загрузки файла!\n";
}

//echo 'Некоторая отладочная информация:';
//print_r($_FILES['files']['error']);

//print "</pre>";
}
  //Если нажата кнопка добавить
         if (isset($_POST["add"])) {
    //Если переменная Ispolnitel передана
    if (isset($_POST["NazvanieNsi"])) {
 if ($uploadfile!="docs/") {
          $sql = mysqli_query($connection, "INSERT INTO `Nsi` (`NazvanieNsi`,`Uchastnik`,`KommentariyNsi`, `FileNsi`) VALUES ('{$_POST['NazvanieNsi']}', '$email', '{$_POST['KommentariyNsi']}','$uploadfile')");
 }
      
         

     // Если вставка прошла успешно 
      if ($sql) {
       echo '<div class ="alert alert-success" role="alert">Успешно!</div>';
     } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
}
    }}


  ?>
     
     
            
                 <?php 
                 
  //Если нажата кнопка сохранить
   if (isset($_POST['save'])) {
          //Если переменная File передана
         if ($uploadfile!="docs/") {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($connection, "UPDATE `Nsi` SET `NazvanieNsi` = '{$_POST['NazvanieNsi']}',`Uchastnik` = '$email', `KommentariyNsi` = '{$_POST['KommentariyNsi']}', `FileNsi` = '$uploadfile' WHERE `IDNsi`={$_GET['red_id']} ");
      } }else if (isset($_GET['red_id'])) {
             {
                 if (isset($_GET['red_id'])) {
          $sql = mysqli_query($connection, "UPDATE `Nsi` SET `NazvanieNsi` = '{$_POST['NazvanieNsi']}',`KommentariyNsi` = '{$_POST['KommentariyNsi']}' WHERE `IDNsi`={$_GET['red_id']} ");
      }
             } }

      //Если вставка прошла успешно 
      if ($sql) {
        echo '<div class ="alert alert-success" role="alert">Успешно!</div>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
      }
   }

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
      //удаляем строку из таблицы
      $sql = mysqli_query($connection, "DELETE FROM `Nsi` WHERE `IDNsi` = {$_GET['del_id']}");
      if ($sql) {
//  echo "<p>НСИ удалена.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
      }
    }

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($connection, "SELECT * FROM `Nsi` WHERE `IDNsi`={$_GET['red_id']}");
      $group = mysqli_fetch_array($sql);
    }
  ?>
            
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
      

      
      
<div class="container">
     <div class="row">
 <div class="col-md-12">

   
    <form class="form-horizontal" method="POST" enctype = 'multipart/form-data'>
            <fieldset>
            
            <!-- Form Name -->
            <legend>Нормативно-справочная информация</legend>
            
            <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Название</label>  
              <div>
              <input id="textinput" name="NazvanieNsi" type="text" placeholder="Введите название НСИ" class="form-control input-md" value="<?= isset($_GET['red_id']) ? $group['NazvanieNsi'] : ''; ?>" required="">
                
              </div>
            </div>
            
  
             <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Комментарий</label>  
              <div>
              <textarea id="textinput" name="KommentariyNsi" type="text" class="form-control input-md form-control-sm" ><?= isset($_GET['red_id']) ? $group['KommentariyNsi'] : ''; ?></textarea>
              </div>
            </div>
            
                                 <!-- file input-->
                                 <div class="form-group" style="margin-bottom: 0px;">
            <label class="control-label" for="textinput">Прикрепите файл</label>  
<div class="custom-file">
    <input type="file" name="files" class="custom-file-input" id="CustomFile">
  <label class="custom-file-label" for="customFile"><?= isset($_GET['red_id']) ? $group['FileNsi'] : 'Латиница'; ?></label>
</div>
</div>

<script type="text/javascript">
 $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
        </script>
            
            <!-- Button -->
<div class="form-group block">
  <label class="control-label" for="singlebutton"></label>
  <div>
      <button type="submit" name="add" class="btn btn-outline-dark">Добавить</button>
    <button type="submit" name="save" class="btn btn-outline-dark">Сохранить</button>
  </div>
</div>
            
            </fieldset>
            </form>

  <div class="table-responsive">
                <table class="table">
                    <thead>
                  <tr>
                    <td>ID</td>
                    <td>Название</td>
                    <td>Участник</td>
                    <td>Файл</td>
                    <td>Комментарий</td>
                    <td></td>
                    <td></td>
                  </tr> </thead>
                 
         
                  <?php   $sql = mysqli_query($connection, "SELECT `IDNsi`, `NazvanieNsi`, `Uchastnik`, `KommentariyNsi`, `FileNsi` FROM `Nsi`");
                      while ($result = mysqli_fetch_array($sql)): ?> 
                  
                         <tr>
                         <td><?= $result['IDNsi']; ?></td>
                           <td><?= $result['NazvanieNsi']; ?></td>
                          <td><?= $result['Uchastnik']; ?></td>
                        <?php if ($result['FileNsi']!="docs/") {
                        echo  "<td><a href='{$result['FileNsi']}' download>Скачать</a></td>"; } ?>
                        <td><?= $result['KommentariyNsi']; ?></td>
                        <?php echo "<td><a class='btn btn-outline-dark btn-block' href='?del_id={$result['IDNsi']}'>Удалить</a></td>" ?>
                     <?php echo "<td><a class='btn btn-outline-dark btn-block' href='?red_id={$result['IDNsi']}'>Изменить</a></td>" ?>
                    </tr>
                     <?php endwhile; ?>
                  
               
                </table>
  </div>


              </div>
              </div>
              </div>
       
  
  
  </body>
</html>