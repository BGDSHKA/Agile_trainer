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
          }
          
       
        </style>
        
         <?php 
    //Если переменная OpisaniePlana передана
    if (isset($_POST["OpisanieZadachi"])) {{
      
          //Иначе вставляем данные, подставляя их в запрос
          $sql = mysqli_query($connection, "INSERT INTO `Zadachi` (`KodProjecta`,`TipZadachi`, `Prioritet`, `Trudoemkost`, `StatusZadachi`, `OpisanieZadachi`,`DataZadachi`, `DataKonca`) VALUES ('{$_POST['KodProjecta']}', '{$_POST['TipZadachi']}', '{$_POST['Prioritet']}', '{$_POST['Trudoemkost']}', '{$_POST['StatusZadachi']}', '{$_POST['OpisanieZadachi']}','{$_POST['DataZadachi']}', '{$_POST['DataKonca']}')");
      }

      //Если вставка прошла успешно 
      if ($sql) {
        echo '<div class ="alert alert-success" role="alert">Успешно!</div>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
      }
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

     <form class="form-horizontal" method="POST">
            <fieldset>
            
            <!-- Form Name -->
            <legend>Добавить задачу</legend>
            
<!-- Select Basic -->
          <div class="form-group">     
<label class="control-label" for="textinput">Выберите проект</label>
    <select id="textinput" name="KodProjecta" class="form-control mr-sm-2">     
   <?php $prj1=$_POST[KodProjecta];
   $prj2=$group[KodProjecta];
   
   if (isset($_GET['red_id'])) { echo "<option value='$prj2'>$prj2</option>";
    $sql = mysqli_query($connection, 'SELECT `KodProjecta`, `NazvanieProjecta`, `DataSozdaniya` FROM `Project` ORDER BY `DataSozdaniya` DESC');
    while ($result = mysqli_fetch_array($sql)): ?>
      <option value="<?= $result['KodProjecta']; ?>" <?PHP if(isset($_POST['KodProjecta'])){if($_POST['KodProjecta']==$result['KodProjecta']) echo ' selected="selected"';}?>><?= $result['NazvanieProjecta']; ?></option>
    <?php endwhile; } 
    else
       { 
     $sql = mysqli_query($connection, 'SELECT `KodProjecta`, `NazvanieProjecta`, `DataSozdaniya` FROM `Project` ORDER BY `DataSozdaniya` DESC');
    while ($result = mysqli_fetch_array($sql)): ?>
      <option value="<?= $result['KodProjecta']; ?>" <?PHP if(isset($_POST['KodProjecta'])){if($_POST['KodProjecta']==$result['KodProjecta']) echo ' selected="selected"';}?>><?= $result['NazvanieProjecta']; ?></option>
    <?php endwhile; } ?>
    </select>
</div>
                                  <!-- Select Basic -->
     <div class="form-group">
  <label class="control-label" for="textinput">Выберите тип задачи</label>
  <div> 
    <select id="textinput" name="TipZadachi" class="form-control">                 
  <option>Требования</option>
    <option>Проектирование</option>
      <option>Разработка</option>
      <option>Тестирование</option>
       <option>Документация</option>
    </select>
  </div>
</div>
              <!-- Select Basic -->
             <div class="form-group">
  <label class="control-label" for="textinput">Выберите приоритет задачи</label>
  <div>
    <select id="textinput" name="Prioritet" class="form-control">                 
    <option>Средний</option>
      <option>Высокий</option>
    </select>
  </div>
</div>

<!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Трудоемкость</label>  
              <div>
              <input id="textinput" name="Trudoemkost" type="text" placeholder="Напишите трудоемкость задачи в часах" class="form-control input-md">
                
              </div>
            </div>
            
              <!-- Select Basic -->
                     <div class="form-group">
  <label class="control-label" for="textinput">Статус задачи</label>
  <div>
    <select id="textinput" name="StatusZadachi" class="form-control">                 
  <option>Бэклог</option>
    <option>Разработка</option>
      <option>Тестирование</option>
      <option>Готово</option>
    </select>
  </div>
</div>
            
        <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Описание задачи</label>  
              <div>
              <textarea  id="textinput" name="OpisanieZadachi" type="text" placeholder="Опишите задачу" class="form-control input-md"></textarea>
                
              </div>
            </div>
            
                   <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Дата начала задачи</label>  
              <div>
              <input id="textinput" name="DataZadachi" type="text" placeholder="ГГГГ-ММ-ДД" class="form-control input-md">
                
              </div>
            </div>
            
            <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Дата окончания задачи</label>  
              <div>
              <input id="textinput" name="DataKonca" type="text" placeholder="ГГГГ-ММ-ДД" class="form-control input-md">
                
              </div>
            </div>
            
            <!-- Button -->
<a class="form-group block">
  <label class="control-label" for="singlebutton"></label>
  <a>
    <button type="submit" class="btn btn-outline-dark">Создать</button>
  </a>
</a>
            
            </fieldset>
            </form>

              </div>
              </div>
              </div>
              
   
  </body>
</html>