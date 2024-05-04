<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/TaskModel.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Controllers/TaskController.php';

$username = $_SERVER['PHP_AUTH_USER'];

$tasks = TaskModel::getUserTasks($username);

$inprogress = TaskModel::getTasks("В процессе");

$infuture = TaskModel::getTasks("В планах");

$notify = TaskModel::deadTasksNotify();



?>

<?php if($notify): ?>

<div class="deadline">Есть просроченные задачи! (см. Архив)</div>

<?php endif; ?>

<h1 class="text">В процессе</h1>

<div class="container">

<?php foreach($inprogress as $key): ?>

<div style="height: 300px; " class="demo-card-wide mdl-card mdl-shadow--2dp">
<div class="wrapper" style=" height: 300px; overflow-x:hidden; overflow-y:auto;">
<div class="mdl-card__title">
  <h2 class="mdl-card__title-text"> <?= $key['title'] ?> </h2>
</div>
<div class="mdl-card__supporting-text">
    Статус: <?= $key['status']  ?>     
</div>
<div class="mdl-card__supporting-text" style="display:flex; gap:5px;">

    <?php $deadline = TaskController::deadlineCheck($key['id']); ?>

    Дедлайн: <?= $deadline ?>

</div>
<div class="mdl-card__supporting-text">
    Исполнитель: <?= $key['username']  ?>     
</div>
<div class="mdl-card__supporting-text">
    <?= $key['descr'] ?>    
</div>
</div>

<div class="mdl-card__actions mdl-card--border">
    <form action="../core/Controllers/changeStatus.php?id=<?=$key['id']?>" method="POST">
   <select name="status-select" id="status">
    <option value="Завершено">Завершено</option>
    <option value="В процессе">В процессе</option>
    <option value="В планах">В планах</option>
   </select>
  <button type="submit" id="demo-menu-lower-left" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
    Изменить статус
  </button>
  </form>

</div>


</div> 

<?php endforeach; ?>


</div>

<h1 class="text">В планах</h1>

<div class="container">

<?php foreach($infuture as $key): ?>

<?php $deadline = date_create($key['deadline']); ?>

<div style="height: 300px; " class="demo-card-wide mdl-card mdl-shadow--2dp">
<div class="wrapper" style=" height: 300px; overflow-x:hidden; overflow-y:auto;">
<div class="mdl-card__title">
  <h2 class="mdl-card__title-text"> <?= $key['title'] ?> </h2>
</div>
<div class="mdl-card__supporting-text">
    Статус: <?= $key['status'] ?>    
</div>
<div class="mdl-card__supporting-text" style="display:flex; gap:5px;">

    <?php $deadline = TaskController::deadlineCheck($key['id']); ?>

    Дедлайн: <?= $deadline ?>

</div>
<div class="mdl-card__supporting-text">
    Исполнитель: <?= $key['username']  ?>     
</div>
<div class="mdl-card__supporting-text">
    <?= $key['descr'] ?>    
</div>
</div>
<form action="../core/Controllers/changeStatus.php?id=<?=$key['id']?>" method="POST">
<div class="mdl-card__actions mdl-card--border">
   <select name="status-select" id="status">
    <option value="Завершено">Завершено</option>
    <option value="В процессе">В процессе</option>
    <option value="В планах">В планах</option>
   </select>
  <button type="submit" id="demo-menu-lower-left" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
    Изменить статус
  </button>
</div>
</form>


</div> 

<?php endforeach; ?>


</div>

<style>
  .container{
    margin-top: 0.5rem;
    padding: 15px 30px;
    display: flex;
    gap: 1rem;
    align-items: center;
    flex-wrap: wrap;
  }

  .text{
    padding: 10px 30px;
    font-size:30px;
  }

  select{
    outline: none;
    border: none;
  }

  .deadline{
    width:100%;
    padding: 10px 30px;
    background-color:red;
    color:white;
  }

  @media(max-width:1024px){
    .container{
        justify-content: center;
    }

    .text{
        text-align: center;
    }
  }
</style>
