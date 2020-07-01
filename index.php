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

    <title>Главная</title>
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
            
            .form-group {
    margin-bottom: 0px; 
}
 .container{
                  max-width: 1920px;
    padding: 0 140px;
          }
          
          @media(max-width:766px){
.container{
padding:0 5px;
}
.h1 {
                font-size: 150%;  
              }
}


          </style>
        
        </head>
        <body>
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
        
        if(isset($_FILES['files'])){
     $uploaddir = 'files/';
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
        
    //Если нажата кнопка "Сохранить"
    if (isset($_POST["trig"])) {
          //Если переменная File передана
         if ($uploadfile!="files/") {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($connection, "UPDATE `Zadachi` SET `ZatrachenoVremeni` = '{$_POST['ZatrachenoVremeni']}',`Ispolnitel` = '{$_POST['Ispolnitel']}', `ProcentGotovnosti` = '{$_POST['ProcentGotovnosti']}',`StatusZadachi` = '{$_POST['StatusZadachi']}',`OpisanieZadachi` = '{$_POST['OpisanieZadachi']}',`DataKonca` = '{$_POST['DataKonca']}', `KommentariyZadachi` = '{$_POST['KommentariyZadachi']}', `file` = '$uploadfile' WHERE `KodZadachi`={$_GET['red_id']} ");
      } }else if (isset($_GET['red_id'])) {
             {
                 if (isset($_GET['red_id'])) {
          $sql = mysqli_query($connection, "UPDATE `Zadachi` SET `ZatrachenoVremeni` = '{$_POST['ZatrachenoVremeni']}',`Ispolnitel` = '{$_POST['Ispolnitel']}',`ProcentGotovnosti` = '{$_POST['ProcentGotovnosti']}', `StatusZadachi` = '{$_POST['StatusZadachi']}',`OpisanieZadachi` = '{$_POST['OpisanieZadachi']}', `DataKonca` = '{$_POST['DataKonca']}', `KommentariyZadachi` = '{$_POST['KommentariyZadachi']}' WHERE `KodZadachi`={$_GET['red_id']} ");
      }
             } }
         

      //Если вставка прошла успешно 
      //if ($sql) {
       // echo '<div class ="alert alert-success" role="alert">Успешно!</div>';
     // } else {
      //  echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
//}
    }


    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($connection, "SELECT `Prioritet`, `ZatrachenoVremeni`,`KodProjecta` , `KodZadachi`, `Ispolnitel`, `File`,`StatusZadachi`, `StatusZadachi`, `OpisanieZadachi`, `DataKonca`, `KommentariyZadachi`, `ProcentGotovnosti` FROM `Zadachi` WHERE `KodZadachi`={$_GET['red_id']}");
      $group = mysqli_fetch_array($sql);
    }

  ?>
     
      
     <div class="container">
        <div class="jumbotron" style="padding: 2rem 1rem;">
          <h1 class="h1">
              <?php 
              if (isset($_GET['prj_id'])){
                  $tmpj=$_GET['prj_id'];
                   $sql = mysqli_query($connection, "SELECT * FROM `Project` WHERE `KodProjecta`='$tmpj'");
                    while ($result = mysqli_fetch_array($sql)){
               echo  $result['NazvanieProjecta'];}
              } Elseif (isset($_POST['trig']) OR isset($_GET['prj_id']) OR isset($_POST['trig2'])){
                  $tmpj=$_POST['KodProjecta'];
                
                   $sql = mysqli_query($connection, "SELECT * FROM `Project` WHERE `KodProjecta`='$tmpj'");
                    while ($result = mysqli_fetch_array($sql)){
               echo  $result['NazvanieProjecta'];}
              } Else {
               Echo "Здравствуйте";
              }
             
              ?>
              </h1>
          <p class="lead">
             
             <?php if (isset($_POST['trig']) OR isset($_GET['prj_id']) OR isset($_POST['trig2'])){
                   $sql = mysqli_query($connection, "SELECT * FROM `Plan` WHERE `KodProjecta`='$tmpj' AND `Data`>=CURRENT_DATE() LIMIT 1");
                    while ($result = mysqli_fetch_array($sql)){
               echo  $result['OpisaniePlana']." Дата: ".$result['Data'] ;}
              } Else {
               Echo "Это сайт для отработки этапов проектного менеджмента с применением гибкой методологии agile";
              }
             
              ?>
              
              </p>
          <a class="btn btn-outline-dark" href="project.php" role="button" >Создать проект</a>
          <a class="btn btn-outline-dark" href="zadachi.php" role="button" >Создать задачу</a>
          <a class="btn btn-outline-dark" href="project.php" role="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">Скрыть окно редактирования</a>

           <div class="collapse show" id="collapseExample">



     <form class="form-horizontal" method="POST" enctype = 'multipart/form-data'>
            <fieldset>
            <br>
            
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

 <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Затрачено времени</label>  
              <div>
              <input id="textinput" name="ZatrachenoVremeni" type="text" placeholder="Сколько понадобилось времени на решение задачи" class="form-control input-md" value="<?= isset($_GET['red_id']) ? $group['ZatrachenoVremeni'] : ''; ?>"></input>
                
              </div>
            </div>
            
                                     <!-- Select Basic -->
     <div class="form-group">
  <label class="control-label" for="textinput">Выберите исполнителя</label>
  <div>
    <select id="textinput" name="Ispolnitel" class="form-control">                 
    <option value="<?= isset($_GET['red_id']) ? $group['Ispolnitel'] : ''; ?>"><?= $group['Ispolnitel']; ?></option>
    <?php 
     $sql = mysqli_query($connection, "SELECT DISTINCT `Users`.`IDUser`, `Email` FROM `Users`  LEFT JOIN `Gruppa` ON `Gruppa`.`IDUser` = `Users`.`IDUser` LEFT JOIN `Project` ON `Project`.`KodGruppi` = `Gruppa`.`KodGruppi` WHERE `Project`.`KodProjecta`= {$_GET['prj_id']}");
    while ($result = mysqli_fetch_array($sql)): ?>
    
      <option value="<?= $result['IDUser']; ?>"><?= $result['Email']; ?></option>
    <?php endwhile; ?>
     
    </select>
  </div>
</div>
            
              <!-- Select Basic -->
                     <div class="form-group">
  <label class="control-label" for="textinput">Статус задачи</label>
  <div>
    <select id="textinput" name="StatusZadachi" class="form-control">      
     <option value="<?= isset($_GET['red_id']) ? $group['StatusZadachi'] : ''; ?>"><?= $group['StatusZadachi']; ?></option>
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
              <input id="textinput" name="OpisanieZadachi" type="text" placeholder="Опишите задачу" class="form-control input-md" value="<?= isset($_GET['red_id']) ? $group['OpisanieZadachi'] : ''; ?>"></input>
              </div>
            </div>
            
              <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Дата окончания задачи</label>  
              <div>
              <input id="textinput" name="DataKonca" type="text" placeholder="ГГГГ-ММ-ДД" class="form-control input-md" value="<?= isset($_GET['red_id']) ? $group['DataKonca'] : ''; ?>"></input>
              </div>
            </div>
            
             <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Комментарии</label>  
              <div>
              <textarea id="textinput" name="KommentariyZadachi" type="text" class="form-control input-md form-control-sm" ><?= isset($_GET['red_id']) ? $group['KommentariyZadachi'] : ''; ?></textarea>
              </div>
            </div>
              
              <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="textinput">Процент готовности</label>  
              <div>
              <input id="textinput" name="ProcentGotovnosti" type="text" placeholder="%" class="form-control input-md" value="<?= isset($_GET['red_id']) ? $group['ProcentGotovnosti'] : ''; ?>"></input>
              </div>
            </div>
            
                         <!-- file input-->
            <label class="control-label" for="textinput">Прикрепите файл</label>  
<div class="custom-file">
    <input type="file" name="files" class="custom-file-input" id="CustomFile">
  <label class="custom-file-label" for="customFile"><?= isset($_GET['red_id']) ? $group['File'] : 'Латиница'; ?></label>
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
    <button  name="trig" class="btn btn-outline-dark align-left">Сохранить</button>
     <button name="trig2" class="btn btn-outline-dark align-right">Показать задачи</button>
  </div>
</div>

</fieldset>

        
      </div>
           </div>
      
        
 <?php if (isset($_POST['KodProjecta'])): ?>

       <div class="container" style="padding: 0;">
    <div class="row">
        <div class="col-sm-4 col-md-3">
            <div class="card">
                <div class="card-block">
                    
                  
                    <h4 class="card-title text-truncate py-2 text-center"style="color: #ffcc00;">Бэклог</h4>
             <?php 
                  $tmp1="Бэклог"; 
    $sql = mysqli_query($connection, "SELECT `KodProjecta`,`KodZadachi`, `TipZadachi`,`Prioritet`,`Trudoemkost`,`ZatrachenoVremeni`,`file`,`StatusZadachi`,(`Users`.`Email`) AS `Ispolnitel`,`OpisanieZadachi`,`DataKonca` FROM `Zadachi` LEFT JOIN `Users` ON `Zadachi`.`Ispolnitel` = `Users`.`IDUser` WHERE `StatusZadachi`='$tmp1' AND `KodProjecta`={$_POST['KodProjecta']} ORDER BY `Prioritet` ASC ");
    while ($result = mysqli_fetch_array($sql)): ?> 
                  
                   
                    <div class="card p-2 bg-faded">
                        <h5 class="card-title">Задача номер: <?= $result['KodZadachi']; ?></h5>
                         <div><b>Тип:</b> <?= $result['TipZadachi']; ?></div>
                          <div><b>Приоритет:</b> <?= $result['Prioritet']; ?></div>
                          <div><b>Трудоёмкость:</b> <?= $result['Trudoemkost']; ?></div>
                          <div><b>Исполнитель:</b> <?= $result['Ispolnitel']; ?></div>
                        <div><b>Описание:</b> <?= $result['OpisanieZadachi']; ?></div>
                        <div><b>Дедлайн:</b> <?= $result['DataKonca']; ?></div>
                        <?php if ($result['file']!="files/" && $result['file']!="") {
                        echo  "<a href='{$result['file']}' download>Скачать решение</a>"; } ?>
                        <?php echo "<a class='btn btn-outline-dark btn-block' href='?red_id={$result['KodZadachi']}&prj_id={$result['KodProjecta']}'>Редактировать</a>" ?>
                    </div>
                    
                     <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-3">
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title text-truncate py-2 text-center" style="color: Red;"</h4>Разработка</h4>
                 
                  <?php 
                  $tmp2="Разработка";
        $sql = mysqli_query($connection, "SELECT `KodProjecta`,`KodZadachi`, `TipZadachi`,`Prioritet`,`Trudoemkost`,`ZatrachenoVremeni`,`file`,`StatusZadachi`,(`Users`.`Email`) AS `Ispolnitel`,`OpisanieZadachi`,`DataKonca` FROM `Zadachi` LEFT JOIN `Users` ON `Zadachi`.`Ispolnitel` = `Users`.`IDUser` WHERE `StatusZadachi`='$tmp2' AND `KodProjecta`={$_POST['KodProjecta']} ORDER BY `Prioritet` ASC ");
    while ($result = mysqli_fetch_array($sql)): ?> 
                  
                   
                    <div class="card p-2 bg-faded">
                        <h5 class="card-title">Задача номер: <?= $result['KodZadachi']; ?></h5>
                         <div><b>Тип:</b> <?= $result['TipZadachi']; ?></div>
                          <div><b>Приоритет:</b> <?= $result['Prioritet']; ?></div>
                          <div><b>Трудоёмкость:</b> <?= $result['Trudoemkost']; ?></div>
                          <div><b>Исполнитель:</b> <?= $result['Ispolnitel']; ?></div>
                        <div><b>Описание:</b> <?= $result['OpisanieZadachi']; ?></div>
                         <div><b>Дедлайн:</b> <?= $result['DataKonca']; ?></div>
                        <?php if ($result['file']!="files/" && $result['file']!="") {
                        echo  "<a href='{$result['file']}' download>Скачать решение</a>"; } ?>
                        <?php echo "<a class='btn btn-outline-dark btn-block' href='?red_id={$result['KodZadachi']}&prj_id={$result['KodProjecta']}'>Редактировать</a>" ?>
                    </div>
                    
                     <?php endwhile; ?>
                    
                    
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-3">
            <div class="card">
                <div class="card-block">
                
                
                    <h4 class="card-title text-truncate py-2 text-center" style="color: Blue;">Тестирование</h4>
                           <?php $ttt="1";
                  $tmp3="Тестирование";
        $sql = mysqli_query($connection, "SELECT `KodProjecta`,`KodZadachi`, `TipZadachi`,`Prioritet`,`Trudoemkost`,`ZatrachenoVremeni`,`file`,`StatusZadachi`,(`Users`.`Email`) AS `Ispolnitel`,`OpisanieZadachi`,`DataKonca` FROM `Zadachi` LEFT JOIN `Users` ON `Zadachi`.`Ispolnitel` = `Users`.`IDUser` WHERE `StatusZadachi`='$tmp3' AND `KodProjecta`={$_POST['KodProjecta']} ORDER BY `Prioritet` ASC ");
    while ($result = mysqli_fetch_array($sql)): ?> 
                  
                   
                  <div class="card p-2 bg-faded">
                        <h5 class="card-title">Задача номер: <?= $result['KodZadachi']; ?></h5>
                         <div><b>Тип:</b> <?= $result['TipZadachi']; ?></div>
                          <div><b>Приоритет:</b> <?= $result['Prioritet']; ?></div>
                          <div><b>Трудоёмкость:</b> <?= $result['Trudoemkost']; ?></div>
                          <div><b>Исполнитель:</b> <?= $result['Ispolnitel']; ?></div>
                        <div><b>Описание:</b> <?= $result['OpisanieZadachi']; ?></div>
                        <div><b>Дедлайн:</b> <?= $result['DataKonca']; ?></div>
                        <?php if ($result['file']!="files/" && $result['file']!="") {
                        echo  "<a href='{$result['file']}' download>Скачать решение</a>"; } ?>
                        <?php echo "<a class='btn btn-outline-dark btn-block' href='?red_id={$result['KodZadachi']}&prj_id={$result['KodProjecta']}'>Редактировать</a>" ?>
                    </div>
                    
                     <?php endwhile; ?>
                    
                    
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-3">
            <div class="card">
                <div class="card-block">
                  
                  
                    <h4 class="card-title text-truncate py-2 text-center" style="color: Green;">Готово</h4>
                    
                           <?php 
                  $tmp4="Готово";
        $sql = mysqli_query($connection, "SELECT `KodProjecta`,`KodZadachi`, `TipZadachi`,`Prioritet`,`Trudoemkost`,`ZatrachenoVremeni`,`file`,`StatusZadachi`,(`Users`.`Email`) AS `Ispolnitel` ,`OpisanieZadachi`,`DataKonca` FROM `Zadachi` LEFT JOIN `Users` ON `Zadachi`.`Ispolnitel` = `Users`.`IDUser` WHERE `StatusZadachi`='$tmp4' AND `KodProjecta`={$_POST['KodProjecta']} ORDER BY `Prioritet` ASC ");
    while ($result = mysqli_fetch_array($sql)): ?> 
                  
                   
                      <div class="card p-2 bg-faded">
                        <h5 class="card-title">Задача номер: <?= $result['KodZadachi']; ?></h5>
                         <div><b>Тип:</b> <?= $result['TipZadachi']; ?></div>
                          <div><b>Приоритет:</b> <?= $result['Prioritet']; ?></div>
                          <div><b>Трудоёмкость:</b> <?= $result['Trudoemkost']; ?></div>
                          <div><b>Исполнитель:</b> <?= $result['Ispolnitel']; ?></div>
                        <div><b>Описание:</b> <?= $result['OpisanieZadachi']; ?></div>
                        <div><b>Дедлайн:</b> <?= $result['DataKonca']; ?></div>
                        <?php if ($result['file']!="files/" && $result['file']!="") {
                        echo  "<a href='{$result['file']}' download>Скачать решение</a>"; } ?>
                        <?php echo "<a class='btn btn-outline-dark btn-block' href='?red_id={$result['KodZadachi']}&prj_id={$result['KodProjecta']}'>Редактировать</a>" ?>
                    </div>
                    
                     <?php endwhile; ?>
                    
                </div>
            </div>
        </div>
        
        
    </div>
</div>

  
  
   <?php Elseif (isset($_GET['prj_id'])): ?>

       <div class="container" style="padding: 0;">
    <div class="row">
        <div class="col-sm-4 col-md-3">
            <div class="card">
                <div class="card-block">
                    
                  
                    <h4 class="card-title text-truncate py-2 text-center"style="color: #ffcc00;">Бэклог</h4>
             <?php 
                  $tmp1="Бэклог"; 
    $sql = mysqli_query($connection, "SELECT `KodProjecta`,`KodZadachi`, `TipZadachi`,`Prioritet`,`Trudoemkost`,`ZatrachenoVremeni`,`file`,`StatusZadachi`,(`Users`.`Email`) AS `Ispolnitel`,`OpisanieZadachi`,`DataKonca` FROM `Zadachi` LEFT JOIN `Users` ON `Zadachi`.`Ispolnitel` = `Users`.`IDUser` WHERE `StatusZadachi`='$tmp1' AND `KodProjecta`={$_GET['prj_id']} ORDER BY `Prioritet` ASC ");
    while ($result = mysqli_fetch_array($sql)): ?> 
                  
                   
                    <div class="card p-2 bg-faded">
                        <h5 class="card-title">Задача номер: <?= $result['KodZadachi']; ?></h5>
                         <div><b>Тип:</b> <?= $result['TipZadachi']; ?></div>
                          <div><b>Приоритет:</b> <?= $result['Prioritet']; ?></div>
                          <div><b>Трудоёмкость:</b> <?= $result['Trudoemkost']; ?></div>
                          <div><b>Исполнитель:</b> <?= $result['Ispolnitel']; ?></div>
                        <div><b>Описание:</b> <?= $result['OpisanieZadachi']; ?></div>
                        <div><b>Дедлайн:</b> <?= $result['DataKonca']; ?></div>
                        <?php if ($result['file']!="files/" && $result['file']!="") {
                        echo  "<a href='{$result['file']}' download>Скачать решение</a>"; } ?>
                        <?php echo "<a class='btn btn-outline-dark btn-block' href='?red_id={$result['KodZadachi']}&prj_id={$result['KodProjecta']}'>Редактировать</a>" ?>
                    </div>
                    
                     <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-3">
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title text-truncate py-2 text-center" style="color: Red;"</h4>Разработка</h4>
                 
                  <?php 
                  $tmp2="Разработка";
        $sql = mysqli_query($connection, "SELECT `KodProjecta`,`KodZadachi`, `TipZadachi`,`Prioritet`,`Trudoemkost`,`ZatrachenoVremeni`,`file`,`StatusZadachi`,(`Users`.`Email`) AS `Ispolnitel`,`OpisanieZadachi`,`DataKonca` FROM `Zadachi` LEFT JOIN `Users` ON `Zadachi`.`Ispolnitel` = `Users`.`IDUser` WHERE `StatusZadachi`='$tmp2' AND `KodProjecta`={$_GET['prj_id']} ORDER BY `Prioritet` ASC ");
    while ($result = mysqli_fetch_array($sql)): ?> 
                  
                   
                    <div class="card p-2 bg-faded">
                        <h5 class="card-title">Задача номер: <?= $result['KodZadachi']; ?></h5>
                         <div><b>Тип:</b> <?= $result['TipZadachi']; ?></div>
                          <div><b>Приоритет:</b> <?= $result['Prioritet']; ?></div>
                          <div><b>Трудоёмкость:</b> <?= $result['Trudoemkost']; ?></div>
                          <div><b>Исполнитель:</b> <?= $result['Ispolnitel']; ?></div>
                        <div><b>Описание:</b> <?= $result['OpisanieZadachi']; ?></div>
                         <div><b>Дедлайн:</b> <?= $result['DataKonca']; ?></div>
                        <?php if ($result['file']!="files/" && $result['file']!="") {
                        echo  "<a href='{$result['file']}' download>Скачать решение</a>"; } ?>
                        <?php echo "<a class='btn btn-outline-dark btn-block' href='?red_id={$result['KodZadachi']}&prj_id={$result['KodProjecta']}'>Редактировать</a>" ?>
                    </div>
                    
                     <?php endwhile; ?>
                    
                    
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-3">
            <div class="card">
                <div class="card-block">
                
                
                    <h4 class="card-title text-truncate py-2 text-center" style="color: Blue;">Тестирование</h4>
                           <?php $ttt="1";
                  $tmp3="Тестирование";
        $sql = mysqli_query($connection, "SELECT `KodProjecta`,`KodZadachi`, `TipZadachi`,`Prioritet`,`Trudoemkost`,`ZatrachenoVremeni`,`file`,`StatusZadachi`,(`Users`.`Email`) AS `Ispolnitel`,`OpisanieZadachi`,`DataKonca` FROM `Zadachi` LEFT JOIN `Users` ON `Zadachi`.`Ispolnitel` = `Users`.`IDUser` WHERE `StatusZadachi`='$tmp3' AND `KodProjecta`={$_GET['prj_id']} ORDER BY `Prioritet` ASC ");
    while ($result = mysqli_fetch_array($sql)): ?> 
                  
                   
                  <div class="card p-2 bg-faded">
                        <h5 class="card-title">Задача номер: <?= $result['KodZadachi']; ?></h5>
                         <div><b>Тип:</b> <?= $result['TipZadachi']; ?></div>
                          <div><b>Приоритет:</b> <?= $result['Prioritet']; ?></div>
                          <div><b>Трудоёмкость:</b> <?= $result['Trudoemkost']; ?></div>
                          <div><b>Исполнитель:</b> <?= $result['Ispolnitel']; ?></div>
                        <div><b>Описание:</b> <?= $result['OpisanieZadachi']; ?></div>
                        <div><b>Дедлайн:</b> <?= $result['DataKonca']; ?></div>
                        <?php if ($result['file']!="files/" && $result['file']!="") {
                        echo  "<a href='{$result['file']}' download>Скачать решение</a>"; } ?>
                        <?php echo "<a class='btn btn-outline-dark btn-block' href='?red_id={$result['KodZadachi']}&prj_id={$result['KodProjecta']}'>Редактировать</a>" ?>
                    </div>
                    
                     <?php endwhile; ?>
                    
                    
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-3">
            <div class="card">
                <div class="card-block">
                  
                  
                    <h4 class="card-title text-truncate py-2 text-center" style="color: Green;">Готово</h4>
                    
                           <?php 
                  $tmp4="Готово";
        $sql = mysqli_query($connection, "SELECT `KodProjecta`,`KodZadachi`, `TipZadachi`,`Prioritet`,`Trudoemkost`,`ZatrachenoVremeni`,`file`,`StatusZadachi`,(`Users`.`Email`) AS `Ispolnitel` ,`OpisanieZadachi`,`DataKonca` FROM `Zadachi` LEFT JOIN `Users` ON `Zadachi`.`Ispolnitel` = `Users`.`IDUser` WHERE `StatusZadachi`='$tmp4' AND `KodProjecta`={$_GET['prj_id']} ORDER BY `Prioritet` ASC ");
    while ($result = mysqli_fetch_array($sql)): ?> 
                  
                   
                      <div class="card p-2 bg-faded">
                        <h5 class="card-title">Задача номер: <?= $result['KodZadachi']; ?></h5>
                         <div><b>Тип:</b> <?= $result['TipZadachi']; ?></div>
                          <div><b>Приоритет:</b> <?= $result['Prioritet']; ?></div>
                          <div><b>Трудоёмкость:</b> <?= $result['Trudoemkost']; ?></div>
                          <div><b>Исполнитель:</b> <?= $result['Ispolnitel']; ?></div>
                        <div><b>Описание:</b> <?= $result['OpisanieZadachi']; ?></div>
                        <div><b>Дедлайн:</b> <?= $result['DataKonca']; ?></div>
                        <?php if ($result['file']!="files/" && $result['file']!="") {
                        echo  "<a href='{$result['file']}' download>Скачать решение</a>"; } ?>
                        <?php echo "<a class='btn btn-outline-dark btn-block' href='?red_id={$result['KodZadachi']}&prj_id={$result['KodProjecta']}'>Редактировать</a>" ?>
                    </div>
                    
                     <?php endwhile; ?>
                    
                </div>
            </div>
        </div>
        
        
    </div>
</div>

  <?php endif; ?>
  
  </body>
</html>