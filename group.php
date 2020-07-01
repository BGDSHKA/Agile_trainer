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
        
    <!-- Sort table -->
  <script src='Sort/dist/tablesort.min.js'></script>
  
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
.container{
padding:0 5px;
}
          }
          
      
        </style>
      
     <?php 
     
      //Если нажата кнопка Сохранить
         if (isset($_POST["save"])) {
    //Если переменная IDUser передана
    if (isset($_POST["IDUser"]) && isset($_POST['KodGruppi'])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($connection, "UPDATE `Gruppa` SET `KodGruppi`= '{$_POST['KodGruppi']}', `IDUser` = '{$_POST['IDUser']}',`Kommentariy` = '{$_POST['Kommentariy']}' WHERE `IDUser`={$_GET['red_id']}");
      } }
             //Если вставка прошла успешно 
      if ($sql) {
        echo '<div class ="alert alert-success" role="alert">Успешно!</div>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
      }
         }
      
       //Если нажата кнопка Добавить
         if (isset($_POST["add"])) {
    //Если переменная IDUser передана
    if (isset($_POST["IDUser"]) && isset($_POST['KodGruppi'])) { {
          //Иначе вставляем данные, подставляя их в запрос
          $sql = mysqli_query($connection, "INSERT INTO `Gruppa` (`KodGruppi`,`IDUser`, `Kommentariy`) VALUES ('{$_POST['KodGruppi']}', '{$_POST['IDUser']}', '{$_POST['Kommentariy']}')");
      }}

      //Если вставка прошла успешно 
      if ($sql) {
        echo '<div class ="alert alert-success" role="alert">Успешно!</div>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
      }
    }
if (!isset($_POST['add'])) {
    if (!isset($_POST['save'])) {
    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
      //удаляем строку из таблицы
      $sql = mysqli_query($connection, "DELETE FROM `Gruppa` WHERE `IDUser` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>Участник группы удалён.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
      }
    }
}
}

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($connection, "SELECT `KodGruppi`, `IDUser`, `Kommentariy` FROM `Gruppa` WHERE `IDUser`={$_GET['red_id']}");
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
 <div class="col-md-6">
    <form class="form-horizontal" method="POST">
            <fieldset>
            
            <!-- Form Name -->
            <legend>Группа</legend>
            
            <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Номер группы</label>  
              <div>
              <input id="textinput" name="KodGruppi" type="text" placeholder="Введите номер группы" class="form-control input-md" value="<?= isset($_GET['red_id']) ? $group['KodGruppi'] : ''; ?>" required="">
                
              </div>
            </div>
            
                         <!-- Select Basic -->
     <div class="form-group">
  <label class="control-label" for="textinput">Выберите участника</label>
  <div>
    <select id="textinput" name="IDUser" class="form-control">                 
   <option value="<?= isset($_GET['red_id']) ? $group['IDUser'] : ''; ?>"><?= $group['IDUser']; ?></option>
    <?php 
     $sql = mysqli_query($connection, 'SELECT `IDUser`, `Email` FROM `Users`');
    while ($result = mysqli_fetch_array($sql)): ?>
    
      <option value="<?= $result['IDUser']; ?>"><?= $result['Email']; ?></option>
    <?php endwhile; ?>
     
    </select>
  </div>
</div>
            
            <!-- Text input-->
            <div class="form-group" style="margin-bottom: 0px;">
              <label class="control-label" for="textinput">Комментарий</label>  
              <div>
              <input id="textinput" name="Kommentariy" type="text" placeholder="Комментарий" class="form-control input-md" value="<?= isset($_GET['red_id']) ? $group['Kommentariy'] : ''; ?>">
                
              </div>
            </div>
            
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
<table class="table" id="sort2">
  <thead class="table-dark">
    <tr>
      <td>Код группы</td>
      <td>Пользователь</td>
      <td>Комментарий</td>
      <td></td>
      <td></td>
    </tr> </thead>
    <?php
      $sql = mysqli_query($connection, 'SELECT `KodGruppi`,`Gruppa`.`IDUser`, (`Users`.`Email`) AS `Email`, `Kommentariy` FROM `Gruppa` LEFT JOIN `Users` ON `Gruppa`.`IDUser` = `Users`.`IDUser`');
      while ($result = mysqli_fetch_array($sql)) {echo '<tr>' .
             "<td>{$result['KodGruppi']}</td>" .
             "<td>{$result['Email']}</td>" .
             "<td>{$result['Kommentariy']}</td>" .
             "<td><a class='btn btn-outline-dark btn-block' href='?del_id={$result['IDUser']}'>Удалить</a></td>" .
             "<td><a class='btn btn-outline-dark btn-block' href='?red_id={$result['IDUser']}'>Изменить</a></td>" .
             '</tr>';
      }
    ?>
  </table>
</div>
    </div>
              
      <div class="col-md-6">
             <div class="table-responsive">
<table class="table" id="sort">
  <thead>
    <tr>
        <td>ID</td>
      <td>Пользователь</td>
      <td>Желаемая роль</td>
      <td>Навыки</td>
      <td>Организация</td>
    </tr> </thead>
    <?php
      $sql = mysqli_query($connection, 'SELECT `IDUser`, `Email`, `Rol`, `Naviki`, `NazvanieKompanii` FROM `Users` LEFT JOIN `Kompaniya` ON `Users`.`KodKompanii` = `Kompaniya`.`KodKompanii`');
      while ($result = mysqli_fetch_array($sql)) {
        echo "<tr><td>{$result['IDUser']}</td><td>{$result['Email']}</td><td>{$result['Rol']}</td><td>{$result['Naviki']}</td><td>{$result['NazvanieKompanii']}</td></tr>";
      }
    ?>
  </table>
  </div>
</div>
</div>
</div>

<script>
  new Tablesort(document.getElementById('sort'));
</script>
   
   
  </body>
</html>