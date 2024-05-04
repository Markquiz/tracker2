<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/TaskModel.php';

$id = trim($_GET['id']);

TaskModel::unsetTask($id);

Header("Location: /archive");



