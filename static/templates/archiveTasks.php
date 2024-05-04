<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/TaskModel.php';

$username = $_SERVER['PHP_AUTH_USER'];

$tasks = TaskModel::getTasks("Завершено");
$deadTasks = TaskModel::getTasks("Просрочено");


?>


<h1 class="text">Завершено</h1>

<div class="container">

<?php foreach($tasks as $key): ?>

<div style="height: 300px; " class="demo-card-wide mdl-card mdl-shadow--2dp">
<div class="wrapper" style=" height: 300px; overflow-x:hidden; overflow-y:auto;">
<div class="mdl-card__title">
  <h2 class="mdl-card__title-text"> <?= $key['title'] ?> </h2>
</div>
<div class="mdl-card__supporting-text" style="display:flex; gap:5px;">
    Статус: <div style="color:green"> <?= $key['status'] ?> </div>   
</div>
<div class="mdl-card__supporting-text">
    Дедлайн: <?= $key['deadline'] ?>    
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
    <select style="visibility:hidden;" name="status-select" id="status">
    <option value="В процессе"></option>
   </select>
  <button style=" margin-top:-20px; display: flex; justify-content:center; !important" type="submit" id="demo-menu-lower-left" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
    Вытащить из архива
  </button>
</div>
</form>


</div> 

<?php endforeach; ?>


</div>

<h1 class="text">Просрочено</h1>

<div class="container">

<?php foreach($deadTasks as $key): ?>

<div style="height: 300px; " class="demo-card-wide mdl-card mdl-shadow--2dp">
<div class="wrapper" style=" height: 300px; overflow-x:hidden; overflow-y:auto;">
<div class="mdl-card__title">
  <h2 class="mdl-card__title-text"> <?= $key['title'] ?> </h2>
</div>
<div class="mdl-card__supporting-text" style="display:flex; gap:5px;">
    Статус: <div style="color:red"> <?= $key['status'] ?> </div>   
</div>
<div class="mdl-card__supporting-text">
    Дедлайн: <?= $key['deadline'] ?>    
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
    <select style="visibility:hidden;" name="status-select" id="status">
    <option value="В процессе"></option>
   </select>
    <a href="../core/Controllers/unsetTask.php?id=<?=$key['id']?>" style=" margin-top:-20px; display: flex; justify-content:center; !important" type="submit" id="demo-menu-lower-left" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
    Закрыть задачу
    </a>
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
    font-size: 30px; !important;
  }

  select{
    outline: none;
    border: none;
  }

  @media(max-width:1024px){
    .container{
        justify-content: center;
    }
  }
</style>
