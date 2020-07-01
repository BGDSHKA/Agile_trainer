<?php
  session_start();
  require('connect.php');
    $mail=$_SESSION['email'];
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
          
          }
       
        </style>
      
     <?php 
    //Если переменная Email передана
    if (isset($_POST["Email"])) {
      {
          $sql = mysqli_query($connection, "UPDATE `Users` SET `Email`= '{$_POST['Email']}', `KodKompanii`= '{$_POST['KodKompanii']}',`Rol` = '{$_POST['Rol']}', `Naviki` = '{$_POST['Naviki']}' WHERE `IDUser`={$_GET['red_id']}");
      } 

      //Если вставка прошла успешно 
      if ($sql) {
        echo '<div class ="alert alert-success" role="alert">Успешно!</div>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
      }
    }

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
      //удаляем строку из таблицы
      $sql = mysqli_query($connection, "DELETE FROM `Gruppa` WHERE `IDUser` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>Участник удалён.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
      }
    }

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($connection, "SELECT `Email`, `IDUser`, `KodKompanii`, `Rol`, `Naviki` FROM `Users` WHERE `IDUser`={$_GET['red_id']}");
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


        <div class="table-responsive">
                <table class="table">
                    <thead>
                  <tr>
                    <td>ID</td>
                    <td>Email</td>
                    <td>Желаемая роль</td>
                    <td>Навыки</td>
                    <td>Организация</td>
                    <td></td>
                  </tr> </thead>
                  <?php
         
                    $sql = mysqli_query($connection, "SELECT `Email`, `IDUser`, `NazvanieKompanii`, `Rol`, `Naviki` FROM `Users` LEFT JOIN `Kompaniya` ON `Users`.`KodKompanii` = `Kompaniya`.`KodKompanii` WHERE `Email`='$mail'");
                    while ($result = mysqli_fetch_array($sql)) {echo '<tr>' .
                          "<td>{$result['IDUser']}</td>" .
                           "<td>{$result['Email']}</td>" .
                           "<td>{$result['Rol']}</td>" .
                           "<td>{$result['Naviki']}</td>" .
                           "<td>{$result['NazvanieKompanii']}</td>" .
                           "<td><a class='btn btn-outline-dark btn-block' href='?red_id={$result['IDUser']}'>Изменить</a></td>" .
                           '</tr>';
                    }
                  ?>
                </table>
</div>
    <form class="form-horizontal" method="POST">
            <fieldset>
            
            <!-- Form Name -->
            <legend>Ваши данные</legend>
            
            <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Email</label>  
              <div>
              <input id="textinput" name="Email" type="text" placeholder="Введите Email" class="form-control input-md" value="<?= isset($_GET['red_id']) ? $group['Email'] : ''; ?>" required="">
                
              </div>
            </div>
            
                    <!-- Select Basic -->
     <div class="form-group">
  <label class="control-label" for="KodKompanii">Выберите организацию</label>
  <div>
    <select id="textinput" name="KodKompanii" class="form-control">                 
    <option value="<?= isset($_GET['red_id']) ? $group['KodKompanii'] : ''; ?>"><?= $group['KodKompanii']; ?></option>
    <?php 
     $sql = mysqli_query($connection, 'SELECT `KodKompanii`, `NazvanieKompanii` FROM `Kompaniya`');
    while ($result = mysqli_fetch_array($sql)): ?>
      <option value="<?= $result['KodKompanii']; ?>"><?= $result['NazvanieKompanii']; ?></option>
    <?php endwhile; ?>
     
    </select>
  </div>
</div>
            
            <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Желаемая роль</label>  
              <div>
              <input id="textinput" name="Rol" type="text" placeholder="Введите желаемую роль" class="form-control input-md" value="<?= isset($_GET['red_id']) ? $group['Rol'] : ''; ?>">
              </div>
            </div>
            
            <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Навыки</label>  
              <div>
              <input id="textinput" name="Naviki" type="text" placeholder="Введите ваши навыки" class="form-control input-md" value="<?= isset($_GET['red_id']) ? $group['Naviki'] : ''; ?>">
                
              </div>
            </div>
            
            <!-- Button -->
<div class="form-group block">
  <label class="control-label" for="singlebutton"></label>
  <div>
    <button type="submit" class="btn btn-outline-dark">Сохранить</button>
  </div>
</div>
            
            </fieldset>
            </form>


    </div>
      </div>
    </div>          
   
  </body>
</html>