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
        <link rel="stylesheet" href="timeline.css">
     <script src="js\jquery-3.4.1.min.js"></script>
<script src="js\bootstrap.min.js"></script>


      <!-- Custom styles for this template -->
        <link href="css/navbar-fixed-top.css" rel="stylesheet">
        

  </head>
  
    <style>
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
  <body>
      

   <?php 
   if (isset($_POST["testing2"])){ $sql = mysqli_query($connection, "INSERT INTO `Plan` (`KodProjecta`,`OpisaniePlana`, `Data`) VALUES ('{$_POST['KodProjecta']}', '{$_POST['OpisaniePlana']}', '{$_POST['Data']}')"); 

//Если вставка прошла успешно 
      if ($sql) {
        echo '<div class ="alert alert-success" role="alert">Успешно!</div>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
      }
       
   }

    if (isset($_POST["testing"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red_id'])) { 
          
          $sql = mysqli_query($connection, "UPDATE `Plan` SET `KodProjecta`= '{$_POST['KodProjecta']}', `OpisaniePlana` = '{$_POST['OpisaniePlana']}',`Data` = '{$_POST['Data']}' WHERE `KodPlana`={$_GET['red_id']}");
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
      $sql = mysqli_query($connection, "DELETE FROM `Plan` WHERE `KodPlana` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>План на эту дату удалён удалён.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
      }
    }

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($connection, "SELECT `KodProjecta`, `OpisaniePlana`, `Data`,`KodPlana` FROM `Plan` WHERE `KodPlana`={$_GET['red_id']}");
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
 <div class="col-12">
     
    <form class="form-horizontal" method="POST">
            <fieldset>
            
            <!-- Form Name -->
            <legend>Создание плана</legend>
            
                           <!-- Select Basic -->
          <div class="form-group" style="margin-bottom: 0.5rem">   
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
            <div class="form-group">
             <button type="submit" name="trig" class="btn btn-outline-dark">Показать план</button>
            </div>
                        <!-- Textarea -->
<div class="form-group">
  <label class="control-label" for="OpisaniePlana">Описание плана</label>
  <div>                     
    <input class="form-control input-lg" id="textinput" name="OpisaniePlana" value="<?= isset($_GET['red_id']) ? $group['OpisaniePlana'] : ''; ?>"></input>
  </div>
</div>
            
            <!-- Text input-->
            <div class="form-group" style="margin-bottom: 0px;">
              <label class="control-label" for="textinput">Дата</label>  
              <div>
              <input id="textinput" name="Data" type="text" placeholder="ГГГГ-ММ-ДД" class="form-control input-md" value="<?= isset($_GET['red_id']) ? $group['Data'] : ''; ?>">
                
              </div>
            </div>
            
            <!-- Button -->
<div class="form-group block">
  <label class="control-label" for="singlebutton"></label>
  <div>
      <button type="submit" name="testing2" class="btn btn-outline-dark">Добавить</button>
    <button type="submit" name="testing" class="btn btn-outline-dark">Сохранить</button>
     
  </div>
</div>
            
            </fieldset>
            </form>
            </div>
       
       
            <?php if (isset($_POST['KodProjecta'])): ?>
    <div class="col-12">
        
        <?php 
        $sql = mysqli_query($connection, "SELECT `OpisaniePlana`, `Data`,`KodProjecta`,`KodPlana` FROM `Plan` WHERE `KodProjecta`={$_POST['KodProjecta']} ORDER BY `Data` ASC");
    while ($result = mysqli_fetch_array($sql)): ?> <?php
        if ($result['KodPlana']%2 == 0): ?>
        
    <section id="cd-timeline" class="cd-container">
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<strong>
					<?= $result['Data']; ?>
				</strong>
			</div> 

			<div class="cd-timeline-content cd-left">
				<h2>Код проекта: <?= $result['KodProjecta']; ?> </h2>
				<p><?= $result['OpisaniePlana']; ?></p> 
				<?php echo "<a class='btn btn-outline-dark btn-block' href='?red_id={$result['KodPlana']}&prj_id={$result['KodProjecta']}'>Редактировать</a>" ?>
				<?php echo "<a class='btn btn-outline-dark btn-block' href='?del_id={$result['KodPlana']}&prj_id={$result['KodProjecta']}'>Удалить</a>" ?>
			
			</div> 
		</div>
    
 <?php   
 elseif ($result['KodPlana']%2 != 0): ?>
 
 <section id="cd-timeline" class="cd-container">
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<strong>
					<?= $result['Data']; ?>
				</strong>
			</div> 

			<div class="cd-timeline-content cd-right">
				<h2>Код проекта: <?= $result['KodProjecta']; ?> </h2>
				<p><?= $result['OpisaniePlana']; ?></p>
				<?php echo "<a class='btn btn-outline-dark btn-block' href='?red_id={$result['KodPlana']}&prj_id={$result['KodProjecta']}'>Редактировать</a>" ?>
				<?php echo "<a class='btn btn-outline-dark btn-block' href='?del_id={$result['KodPlana']}&prj_id={$result['KodProjecta']}'>Удалить</a>" ?>
				
			</div> 
			
		
		</div>
 
     <?php   endif;  ?>
   
        <?php endwhile; ?>
        
  
  
            <?php Elseif (isset($_GET['prj_id'])): ?>
    <div class="col-12">
        
        <?php 
        $sql = mysqli_query($connection, "SELECT `OpisaniePlana`, `Data`,`KodProjecta`,`KodPlana` FROM `Plan` WHERE `KodProjecta`={$_GET['prj_id']} ORDER BY `Data` ASC");
    while ($result = mysqli_fetch_array($sql)): ?> <?php
        if ($result['KodPlana']%2 == 0): ?>
        
    <section id="cd-timeline" class="cd-container">
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<strong>
					<?= $result['Data']; ?>
				</strong>
			</div> 

			<div class="cd-timeline-content cd-left">
				<h2>Код проекта: <?= $result['KodProjecta']; ?> </h2>
				<p><?= $result['OpisaniePlana']; ?></p> 
				<?php echo "<a class='btn btn-outline-dark btn-block' href='?red_id={$result['KodPlana']}&prj_id={$result['KodProjecta']}'>Редактировать</a>" ?>
				<?php echo "<a class='btn btn-outline-dark btn-block' href='?del_id={$result['KodPlana']}&prj_id={$result['KodProjecta']}'>Удалить</a>" ?>
			
			</div> 
		</div>
    
 <?php   
 elseif ($result['KodPlana']%2 != 0): ?>
 
 <section id="cd-timeline" class="cd-container">
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<strong>
					<?= $result['Data']; ?>
				</strong>
			</div> 

			<div class="cd-timeline-content cd-right">
				<h2>Код проекта: <?= $result['KodProjecta']; ?> </h2>
				<p><?= $result['OpisaniePlana']; ?></p>
				<?php echo "<a class='btn btn-outline-dark btn-block' href='?red_id={$result['KodPlana']}&prj_id={$result['KodProjecta']}'>Редактировать</a>" ?>
				<?php echo "<a class='btn btn-outline-dark btn-block' href='?del_id={$result['KodPlana']}&prj_id={$result['KodProjecta']}'>Удалить</a>" ?>
				
			</div> 
			
		
		</div>
 
     <?php   endif;  ?>
   
        <?php endwhile; ?>
        
  <?php   endif;  ?>
  
		</section> <!-- cd-timeline -->
		</div>

  </body>
</html>