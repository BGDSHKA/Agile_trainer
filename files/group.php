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
    <link href="other/bootstrap.min.css" rel="stylesheet">
    <link  rel="stylesheet" href="navbar-fixed-top.css">


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
          }
        </style>
        <!-- Custom styles for this template -->
        <link href="css/navbar-fixed-top.css" rel="stylesheet">
      </head>
      <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="index.html">PM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="group.html">Группа <span class="sr-only">(current)</a>
              </li>
          <li class="nav-item active">
            <a class="nav-link" href="Project.html">Проект <span class="sr-only">(current)</a>
          </li>
          <li class="nav-item active">
                  <a class="nav-link" href="Zadachi.html">Задачи <span class="sr-only">(current)</a>
                </li>
                <li class="nav-item active">
                      <a class="nav-link" href="Documentation.html">Документация <span class="sr-only">(current)</a>
                    </li>
                  </li>
                  <li class="nav-item active">
                        <a class="nav-link" href="Svyaz.html">Связь <span class="sr-only">(current)</a>
                      </li>
        </ul>
      </div>
    </nav>

    <form class="form-horizontal">
            <fieldset>
            
            <!-- Form Name -->
            <legend>Группа</legend>
            
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Номер группы</label>  
              <div class="col-md-4">
              <input id="textinput" name="textinput" type="text" placeholder="Номер группы" class="form-control input-md" required="">
                
              </div>
            </div>
            
            <!-- Select Multiple -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="selectmultiple">Выберите сотрудника</label>
              <div class="col-md-4">
                <select id="selectmultiple" name="selectmultiple" class="form-control" multiple="multiple">
                  <option value="1">Сотрудник 1</option>
                  <option value="2">Сотрудник 2</option>
                </select>
              </div>
            </div>
            
            <!-- Button (Double) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="button1id"></label>
              <div class="col-md-8">
                <button id="button1id" name="button1id" class="btn btn-success">Добавить сотрудника</button>
                <button id="button2id" name="button2id" class="btn btn-info">Обновить</button>
              </div>
            </div>
            
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Дата? (будет автоматически ставится в БД)</label>  
              <div class="col-md-4">
              <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
              </div>
            </div>
            
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Комментарий</label>  
              <div class="col-md-4">
              <input id="textinput" name="textinput" type="text" placeholder="Комментарий" class="form-control input-md">
                
              </div>
            </div>
            
            </fieldset>
            </form>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Сохранить</button>
  </div>
</div>

                
<table class="table float-left">
  <thead class="table-dark">
    <tr>
      <td>ID_User</td>
      <td>Код компании</td>
      <td>Почта</td>
      <td>Роль</td>
      <td>Навыки</td>
    </tr>
    <?php
      $sql = mysqli_query($connect, 'SELECT `IDUser`, `KodKompanii`, `Email`, `Rol`, `Naviki` FROM `Users`');
      while ($result = mysqli_fetch_array($sql)) {
        echo "<tr><td>{$result['IDUser']}</td><td>{$result['KodKompanii']}</td><td>{$result['Email']}</td><td>{$result['Rol']}</td><td>{$result['Naviki']}</td></tr>";
      }
    ?>
  </thead>
  </table>

    <script src="js\jquery-3.4.1.min.js"></script>

    <script src="js\bootstrap.min.js"></script>
   
  </body>
</html>