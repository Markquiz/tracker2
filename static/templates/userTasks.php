<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/TaskModel.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Controllers/TaskController.php';

$username = $_SERVER['PHP_AUTH_USER'];

$tasks = TaskModel::getUserTasks($username);

$notify = TaskModel::userDeadTasksNotify($username);

?>

<?php if($notify): ?>

<div class="deadline">У Вас есть просроченные задачи!</div>

<?php endif; ?>


<div class="container">

<?php foreach($tasks as $key): ?>

<div style="height: 300px; " class="demo-card-wide mdl-card mdl-shadow--2dp">
<div class="wrapper" style=" height: 300px; overflow-x:hidden; overflow-y:auto;">
<div class="mdl-card__title">
  <h2 class="mdl-card__title-text"> <?= $key['title'] ?> </h2>
</div>

<?php $key['status']=="Просрочено" ? $statusColor = "red" : $statusColor = "gray"; ?>

<div class="mdl-card__supporting-text" style="display:flex; gap:5px;">
    Статус: <div style="color:<?=$statusColor?>"> <?= $key['status'] ?> </div>    
</div>
<div class="mdl-card__supporting-text" style="display:flex; gap:5px;">

    Дедлайн: <?= $key['deadline']; ?>

</div>
<div class="mdl-card__supporting-text">
    <?= $key['descr'] ?>    
</div>
</div>

<?php $color =  TaskController::complexityCheck($key['id']); ?>

<div class="line" style="background-color:<?=$color?>"></div>

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
  }

  select{
    outline: none;
    border: none;
  }

  .line{
    height: 1rem;
    width:100%;
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
  }
</style>
