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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" href="hodzadachi.css">
     <script src="js\jquery-3.4.1.min.js"></script>
<script src="js\bootstrap.min.js"></script>
    
     <!-- Custom styles for this template -->
          <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <title>Главная</title>
  </head>
  
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
  
  <body>

  
    
        
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
<?php if (isset($_GET['KodProjecta2'])): ?>
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Статус', 'Количество задач'],
            <?php 
     $sql = mysqli_query($connection, "SELECT `StatusZadachi`,COUNT(`KodProjecta`),`KodProjecta`  FROM `Zadachi` WHERE `KodProjecta`={$_GET['KodProjecta2']} GROUP BY `StatusZadachi`");
    while ($result = mysqli_fetch_array($sql)){
    
   echo "['".$result['StatusZadachi']."', ".$result['COUNT(`KodProjecta`)']."],"; 
   
} ?>
        ]);

        var options = {
          title: 'Количество задач по статусу',
          slices: {
           0: { color: '#ffcc00' },
            1: { color: 'Green' },
            2: { color: 'Red' },
            3: { color: 'Blue' }
          }
        };


        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        <? endif; ?>
        
<?php if (isset($_GET['KodProjecta2'])){
    echo  "chart.draw(data, options);"; 
    
}
        ?>
      }
      
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart2);

<?php if ( isset($_GET['KodProjecta2'])): ?>
      function drawChart2() {
        var data2 = google.visualization.arrayToDataTable([
          ['Код задачи, исполнитель', 'Трудоёмкость', 'Затрачено времени'],
              <?php 
     $sql = mysqli_query($connection, "SELECT `KodZadachi`,`KodProjecta`,`Trudoemkost`,`ZatrachenoVremeni`, `Ispolnitel` FROM  `Zadachi` WHERE `KodProjecta`={$_GET['KodProjecta2']}");
    while ($result = mysqli_fetch_array($sql)){
    
   echo "['".$result['KodZadachi'].", ".$result['Ispolnitel']."', ".$result['Trudoemkost'].", ".$result['ZatrachenoVremeni']."],"; 
   
} ?>
        ]);

        var options2 = {
          chart: {
            title: 'Затраченное и ожидаемое время работы исполнителя',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
         <? endif; ?>
<?php if (isset($_GET['KodProjecta2'])){
     echo  "chart.draw(data2, google.charts.Bar.convertOptions(options2));";
      } ?>
      }
   
      $(window).resize(function(){
  drawChart();
  drawChart2();

  drawChart4();
});
    </script>
        
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
      
<div class="container">
     <div class="row">

<div class="col-md-6">
    <div id="piechart"></div>
</div>

<div class="col-md-6">
     <form name="pz" class="form-horizontal" method="GET">
            <fieldset>
            
            <!-- Form Name -->
            <legend>Состояние проекта</legend>
            
                  <!-- Select Basic -->
     <div class="form-group">
  <label class="control-label" for="KodProjecta2">Выберите проект</label>
  <div>
    <select id="textinput" name="KodProjecta2" class="form-control">    
    <?php 
     $sql = mysqli_query($connection, 'SELECT `KodProjecta`, `NazvanieProjecta` FROM `Project` ORDER BY `DataSozdaniya` DESC');
    while ($result = mysqli_fetch_array($sql)): ?>
      <option value="<?= $result['KodProjecta']; ?>" <?PHP if(isset($_GET['KodProjecta2'])){if($_GET['KodProjecta2']==$result['KodProjecta']) echo ' selected="selected"';}?>><?= $result['NazvanieProjecta']; ?></option>
    <?php endwhile; ?>
     
    </select>
  </div>
</div>
 
            <!-- Button -->
<a class="form-group block">
  <label class="control-label" for="singlebutton"></label>
  <a>
    <button name="go" class="btn btn-outline-dark">Вызов диаграмм</button>
  </a>
</a>
            
            </fieldset>
            </form>
</div>

<div class="col-md-12">
    <div id="columnchart_material" style="margin-bottom: 10px"></div>
</div>

  <div class="col-md-12">
    <div id="barchart_values"></div>
</div>
  
  <?php if ( isset($_GET['KodProjecta2'])): ?>
  <script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawChart4);
    function drawChart4() {
       var data = google.visualization.arrayToDataTable([
            ['Исполнитель', 'Трудоёмкость', 'Затрачено времени'],
           <?php 
     $sql = mysqli_query($connection, "SELECT DISTINCT `KodZadachi`,`OpisanieZadachi`,`Email`,`Ispolnitel`,SUM(`Trudoemkost`) AS `Trudoemkost`,SUM(`ZatrachenoVremeni`) AS `ZatrachenoVremeni` FROM `Zadachi`,`Users` WHERE `KodProjecta`={$_GET['KodProjecta2']} AND `Zadachi`.`Ispolnitel`=`Users`.`IDUser` GROUP BY `Email`");
    while ($result = mysqli_fetch_array($sql)){
    
   
   
   echo "['".$result['Ispolnitel'].", ".$result['Email']."', ".$result['Trudoemkost'].", ".$result['ZatrachenoVremeni']."],"; 
     
   
} ?>             ]);

      var options = {
        height: data.getNumberOfRows()*55,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        };
      
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(data, options);
  }
  </script>
       <? endif; ?>


<div class="col-md-12" style="display:inline-block;width:1920px;overflow-y:auto;">
    <div id="chart_div"></div>
</div>

<?php if ( isset($_GET['KodProjecta2'])): ?>
	
 <script type="text/javascript">
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart3);

    function drawChart3() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Task ID');
      data.addColumn('string', 'Task Name');
      data.addColumn('string', 'Resource');
      data.addColumn('date', 'Start Date');
      data.addColumn('date', 'End Date');
      data.addColumn('number', 'Duration');
      data.addColumn('number', 'Percent Complete');
      data.addColumn('string', 'Dependencies');

      data.addRows([
          <?php 
     $sql = mysqli_query($connection, "SELECT `KodProjecta`,`KodZadachi`, `TipZadachi`,`OpisanieZadachi`,`ProcentGotovnosti`,CASE
    WHEN MONTH(`DataZadachi`) = 1 
        THEN DATE_FORMAT(`DataZadachi`, '%Y,00,%d')
    WHEN MONTH(`DataZadachi`) = 2 
        THEN DATE_FORMAT(`DataZadachi`, '%Y,01,%d')
    WHEN MONTH(`DataZadachi`) = 3 
        THEN DATE_FORMAT(`DataZadachi`, '%Y,02,%d')
    WHEN MONTH(`DataZadachi`) = 4 
        THEN DATE_FORMAT(`DataZadachi`, '%Y,03,%d')
    WHEN MONTH(`DataZadachi`) = 5 
        THEN DATE_FORMAT(`DataZadachi`, '%Y,04,%d')
    WHEN MONTH(`DataZadachi`) = 6 
        THEN DATE_FORMAT(`DataZadachi`, '%Y,05,%d')
    WHEN MONTH(`DataZadachi`) = 7 
        THEN DATE_FORMAT(`DataZadachi`, '%Y,06,%d')
    WHEN MONTH(`DataZadachi`) = 8 
        THEN DATE_FORMAT(`DataZadachi`, '%Y,07,%d')
    WHEN MONTH(`DataZadachi`) = 9 
        THEN DATE_FORMAT(`DataZadachi`, '%Y,08,%d')
    WHEN MONTH(`DataZadachi`) = 10 
        THEN DATE_FORMAT(`DataZadachi`, '%Y,09,%d')
    WHEN MONTH(`DataZadachi`) = 11 
        THEN DATE_FORMAT(`DataZadachi`, '%Y,10,%d')
    WHEN MONTH(`DataZadachi`) = 12 
        THEN DATE_FORMAT(`DataZadachi`, '%Y,11,%d')
END AS `DataZadachi`, CASE
    WHEN MONTH(`DataKonca`) = 1 
        THEN DATE_FORMAT(`DataKonca`, '%Y,00,%d')
    WHEN MONTH(`DataKonca`) = 2 
        THEN DATE_FORMAT(`DataKonca`, '%Y,01,%d')
    WHEN MONTH(`DataKonca`) = 3 
        THEN DATE_FORMAT(`DataKonca`, '%Y,02,%d')
    WHEN MONTH(`DataKonca`) = 4 
        THEN DATE_FORMAT(`DataKonca`, '%Y,03,%d')
    WHEN MONTH(`DataKonca`) = 5 
        THEN DATE_FORMAT(`DataKonca`, '%Y,04,%d')
    WHEN MONTH(`DataKonca`) = 6 
        THEN DATE_FORMAT(`DataKonca`, '%Y,05,%d')
    WHEN MONTH(`DataKonca`) = 7 
        THEN DATE_FORMAT(`DataKonca`, '%Y,06,%d')
    WHEN MONTH(`DataKonca`) = 8 
        THEN DATE_FORMAT(`DataKonca`, '%Y,07,%d')
    WHEN MONTH(`DataKonca`) = 9 
        THEN DATE_FORMAT(`DataKonca`, '%Y,08,%d')
    WHEN MONTH(`DataKonca`) = 10 
        THEN DATE_FORMAT(`DataKonca`, '%Y,09,%d')
    WHEN MONTH(`DataKonca`) = 11 
        THEN DATE_FORMAT(`DataKonca`, '%Y,10,%d')
    WHEN MONTH(`DataKonca`) = 12 
        THEN DATE_FORMAT(`DataKonca`, '%Y,11,%d')
END AS `DataKonca` FROM `Zadachi` WHERE `KodProjecta`={$_GET['KodProjecta2']}");
    while ($result = mysqli_fetch_array($sql)){
    
   echo "['".$result['KodZadachi']."', '".$result['OpisanieZadachi']." ".$result['KodZadachi']."', '".$result['TipZadachi']."', new Date(".$result['DataZadachi']."), new Date(".$result['DataKonca']."), null,".$result['ProcentGotovnosti'].",null],";} ?> ]);

      var options = {
       width: 1618,
        height: data.getNumberOfRows() * 30 + 40,
        gantt: {
          trackHeight: 30
        }
        
      };

      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  </script>

   <? endif; ?>
   
  <div class="col-md-12">
      
       <form name="pz" class="form-horizontal" method="POST">
            <fieldset>
            
            <!-- Form Name -->
            <legend>Ход задачи</legend>
            
     <!-- Text input-->
            <div class="form-group">
              <div>
              <input id="textinput" name="zd" type="text" placeholder="Введите код задачи" class="form-control input-md" ></input>
              </div>
            </div>

 
 
            <!-- Button -->
<a class="form-group block">
  <label class="control-label" for="singlebutton"></label>
  <a>
    <button type="submit" name="zadacha" class="btn btn-outline-dark">Поиск</button>
  </a>
</a>
            
            </fieldset>
            </form>
      
   <?php if (isset($_POST['zadacha']) && $_POST['zd']!=""): ?>

					
					<div style="display:inline-block;width:100%;overflow-y:auto;">
					<ul class="timeline timeline-horizontal">
					
						    
					 <?php 
        $sql = mysqli_query($connection, "SELECT `IDChanges`, `KodZadachi`, `ChStatusZadachi`, `ChZatrachenoVremeni`, (`Users`.`Email`) AS `ChIspolnitel`, `ChOpisanieZadachi`, `ChProcentGotovnosti`, `ChKommentariyZadachi`, `Chfile`, `DateChanges` FROM `Changes` LEFT JOIN `Users` ON `Changes`.`ChIspolnitel` = `Users`.`IDUser` WHERE `KodZadachi`={$_POST['zd']} ORDER BY `DateChanges` ASC");
    while ($result = mysqli_fetch_array($sql)): ?> 
        
					    	<li class="timeline-item">
					    	    <?php switch ($result['ChStatusZadachi']) {
    case "Бэклог":
        echo "<div class='timeline-badge backlog'><i class='fa fa-sign-in' style='margin-top: 13;'></i></div>";
        break;
    case "Разработка":
        echo "<div class='timeline-badge dev'><i class='fa fa-cog' style='margin-top: 13;'></i></div>";
        break;
    case "Тестирование":
        echo "<div class='timeline-badge testing'><i class='fa fa-list' style='margin-top: 13;'></i></div>";
        break;
    case "Готово":
        echo "<div class='timeline-badge done'><i class='fa fa-check' style='margin-top: 13;'></i></div>";
        break;
} ?>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<div><?= "<b>".$result['KodZadachi']."</b>".", ".$result['ChOpisanieZadachi']; ?></div>
									<div><small class="text-muted"><i class="fa fa-clock-o"></i><?= " ".$result['DateChanges']; ?></small></div>
								</div>
								<div class="timeline-body">
								    <div><b>Статус:</b> <?= $result['ChStatusZadachi']; ?></div>
								    <div><b>Затрачено времени:</b> <?= $result['ChZatrachenoVremeni']; ?></div>
								    <div><b>Исполнитель:</b> <?= $result['ChIspolnitel']; ?></div>
								    <div><b>Готовность:</b> <?= $result['ChProcentGotovnosti']."%"; ?></div>
								    <div><b>Комментарии:</b> <?= $result['ChKommentariyZadachi']; ?></div>
								     <?php if ($result['Chfile']!="files/" && $result['Chfile']!="") {
                        echo  "<a href='{$result['Chfile']}' download>{$result['Chfile']}</a>"; } ?>
								</div>
							</div>
						</li>
					
					<?php endwhile; ?>
					</ul>
					   <?php   endif;  ?>
			
		</div>
				
 
<div class="col-md-12">
      
       <form name="pz" class="form-horizontal" method="POST">
            <fieldset>
            
            <!-- Form Name -->
            <legend>Поиск задач по типу</legend>
            
                  <!-- Select Basic -->
     <div class="form-group">
  <label class="control-label" for="KodProjecta">Выберите проект</label>
  <div>
    <select id="textinput" name="KodProjecta" class="form-control">    
  <option value="9999999999999"></option>
    <?php 
     $sql = mysqli_query($connection, 'SELECT `KodProjecta`, `NazvanieProjecta` FROM `Project` ORDER BY `DataSozdaniya` DESC');
    while ($result = mysqli_fetch_array($sql)): ?>
      <option value="<?= $result['KodProjecta']; ?>" <?PHP if(isset($_POST['KodProjecta'])){if($_POST['KodProjecta']==$result['KodProjecta']) echo ' selected="selected"';}?>><?= $result['NazvanieProjecta']; ?></option>
    <?php endwhile; ?>
     
    </select>
  </div>
</div>

 

                                  <!-- Select Basic -->
     <div class="form-group">
  <label class="control-label" for="TipZadachi">Выберите тип задачи</label>
  <div> 
    <select id="textinput" name="TipZadachi" class="form-control">      
     <option value="pppp"></option>
  <option value="Требования" >Требования</option>
    <option value="Проектирование" >Проектирование</option>
      <option value="Разработка" >Разработка</option>
      <option value="Тестирование" >Тестирование</option>
       <option value="Документация" >Документация</option>
    </select>
  </div>
</div>

 
            <!-- Button -->
<a class="form-group block">
  <label class="control-label" for="singlebutton"></label>
  <a>
    <button type="submit" name="testin" class="btn btn-outline-dark">Поиск</button>
  </a>
</a>
            
            </fieldset>
            </form>
      </div>
     </div>
     </div>
     
<! -- 9999999 это для того чтобы не отправлялся char результат, почему-то ПОСТ плохо реагирует на иф -->
      <?php if ( isset($_POST['testin'])): ?>
      <?php if ($_POST['KodZadachi']!="9999999999999"): ?> 
  <?php if ($_POST['TipZadachi']!="pppp"): ?>

       <div class="container" id="forrefresh">
    <div class="row">
        <div class="col-sm-4 col-md-3">
            <div class="card">
                <div class="card-block">
                    
                  
                    <h4 class="card-title text-truncate py-2 text-center"style="color: #ffcc00;">Бэклог</h4>
             <?php 
                  $tmp1="Бэклог"; 
                  $tmp11=$_POST['TipZadachi'];
        $sql = mysqli_query($connection, "SELECT `KodZadachi`, `OpisanieZadachi`, `TipZadachi`, `Trudoemkost`, `ZatrachenoVremeni`, (`Users`.`Email`) AS `Ispolnitel`, `DataZadachi`, `KommentariyZadachi`, `DataKonca`, `file` FROM `Zadachi` LEFT JOIN `Users` ON `Zadachi`.`Ispolnitel` = `Users`.`IDUser` WHERE `StatusZadachi`='$tmp1' AND `KodProjecta`={$_POST['KodProjecta']} AND `TipZadachi` LIKE '$tmp11' ORDER BY `Prioritet` ASC");
    while ($result = mysqli_fetch_array($sql)): ?> 
                  
                   
                    <div class="card p-2 bg-faded">
                        <h5 class="card-title">Задача номер: <?= $result['KodZadachi']; ?></h5>
                          <div><b>Описание:</b> <?= $result['OpisanieZadachi']; ?></div>
                         <div><b>Тип:</b> <?= $result['TipZadachi']; ?></div>
                          <div><b>Трудоёмкость:</b> <?= $result['Trudoemkost']; ?></div>
                          <div><b>Затрачено времени:</b> <?= $result['ZatrachenoVremeni']; ?></div>
                          <div><b>Исполнитель:</b> <?= $result['Ispolnitel']; ?></div>
                          <div><b>Дата:</b> <?= $result['DataZadachi']; ?></div>
                        <div><b>Комментарии:</b> <?= $result['KommentariyZadachi']; ?></div>
                        <div><b>Дедлайн:</b> <?= $result['DataKonca']; ?></div>
                        <?php if ($result['file']!="files/") {
                        echo  "<a href='{$result['file']}' download>{$result['file']}</a>"; } ?>
                 
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
                   $tmp22=$_POST['TipZadachi'];
        $sql = mysqli_query($connection, "SELECT `KodZadachi`, `OpisanieZadachi`, `TipZadachi`, `Trudoemkost`, `ZatrachenoVremeni`, (`Users`.`Email`) AS `Ispolnitel`, `DataZadachi`, `KommentariyZadachi`, `DataKonca`, `file` FROM `Zadachi` LEFT JOIN `Users` ON `Zadachi`.`Ispolnitel` = `Users`.`IDUser` WHERE `StatusZadachi`='$tmp2' AND `KodProjecta`={$_POST['KodProjecta']} AND `TipZadachi` LIKE '$tmp22' ORDER BY `Prioritet` ASC ");
    while ($result = mysqli_fetch_array($sql)): ?> 
                  
                   
                            <div class="card p-2 bg-faded">
                        <h5 class="card-title">Задача номер: <?= $result['KodZadachi']; ?></h5>
                        <div><b>Описание:</b> <?= $result['OpisanieZadachi']; ?></div>
                         <div><b>Тип:</b> <?= $result['TipZadachi']; ?></div>
                          <div><b>Трудоёмкость:</b> <?= $result['Trudoemkost']; ?></div>
                          <div><b>Затрачено времени:</b> <?= $result['ZatrachenoVremeni']; ?></div>
                          <div><b>Исполнитель:</b> <?= $result['Ispolnitel']; ?></div>
                          <div><b>Дата:</b> <?= $result['DataZadachi']; ?></div>
                        <div><b>Комментарии:</b> <?= $result['KommentariyZadachi']; ?></div>
                        <div><b>Дедлайн:</b> <?= $result['DataKonca']; ?></div>
                        <?php if ($result['file']!="files/") {
                        echo  "<a href='{$result['file']}' download>{$result['file']}</a>"; } ?>
                 
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
                   $tmp33=$_POST['TipZadachi'];
        $sql = mysqli_query($connection, "SELECT `KodZadachi`, `OpisanieZadachi`, `TipZadachi`, `Trudoemkost`, `ZatrachenoVremeni`, (`Users`.`Email`) AS `Ispolnitel`, `DataZadachi`, `KommentariyZadachi`, `DataKonca`, `file` FROM `Zadachi` LEFT JOIN `Users` ON `Zadachi`.`Ispolnitel` = `Users`.`IDUser` WHERE `StatusZadachi`='$tmp3' AND `KodProjecta`={$_POST['KodProjecta']} AND `TipZadachi` LIKE '$tmp33' ORDER BY `Prioritet` ASC ");
    while ($result = mysqli_fetch_array($sql)): ?> 
                  
                   
                          <div class="card p-2 bg-faded">
                        <h5 class="card-title">Задача номер: <?= $result['KodZadachi']; ?></h5>
                          <div><b>Описание:</b> <?= $result['OpisanieZadachi']; ?></div>
                         <div><b>Тип:</b> <?= $result['TipZadachi']; ?></div>
                          <div><b>Трудоёмкость:</b> <?= $result['Trudoemkost']; ?></div>
                          <div><b>Затрачено времени:</b> <?= $result['ZatrachenoVremeni']; ?></div>
                          <div><b>Исполнитель:</b> <?= $result['Ispolnitel']; ?></div>
                          <div><b>Дата:</b> <?= $result['DataZadachi']; ?></div>
                        <div><b>Комментарии:</b> <?= $result['KommentariyZadachi']; ?></div>
                        <div><b>Дедлайн:</b> <?= $result['DataKonca']; ?></div>
                        <?php if ($result['file']!="files/") {
                        echo  "<a href='{$result['file']}' download>{$result['file']}</a>"; } ?>
                 
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
                   $tmp44=$_POST['TipZadachi'];
        $sql = mysqli_query($connection, "SELECT `KodZadachi`, `OpisanieZadachi`, `TipZadachi`, `Trudoemkost`, `ZatrachenoVremeni`, (`Users`.`Email`) AS `Ispolnitel`, `DataZadachi`, `KommentariyZadachi`, `DataKonca`, `file` FROM `Zadachi` LEFT JOIN `Users` ON `Zadachi`.`Ispolnitel` = `Users`.`IDUser` WHERE `StatusZadachi`='$tmp4' AND `KodProjecta`={$_POST['KodProjecta']} AND `TipZadachi` LIKE '$tmp44' ORDER BY `Prioritet` ASC ");
    while ($result = mysqli_fetch_array($sql)): ?> 
                  
                   
                               <div class="card p-2 bg-faded">
                        <h5 class="card-title">Задача номер: <?= $result['KodZadachi']; ?></h5>
                          <div><b>Описание:</b> <?= $result['OpisanieZadachi']; ?></div>
                         <div><b>Тип:</b> <?= $result['TipZadachi']; ?></div>
                          <div><b>Трудоёмкость:</b> <?= $result['Trudoemkost']; ?></div>
                          <div><b>Затрачено времени:</b> <?= $result['ZatrachenoVremeni']; ?></div>
                          <div><b>Исполнитель:</b> <?= $result['Ispolnitel']; ?></div>
                          <div><b>Дата:</b> <?= $result['DataZadachi']; ?></div>
                        <div><b>Комментарии:</b> <?= $result['KommentariyZadachi']; ?></div>
                        <div><b>Дедлайн:</b> <?= $result['DataKonca']; ?></div>
                        <?php if ($result['file']!="files/") {
                        echo  "<a href='{$result['file']}' download>{$result['file']}</a>"; } ?>
                 
                    </div>
                    
                     <?php endwhile; ?>
                    
                </div>
            </div>
        </div>
        
        
    </div>
</div>

  <?php endif; ?>
      <?php endif; ?>
      <?php endif; ?>
     
  </body>
</html>