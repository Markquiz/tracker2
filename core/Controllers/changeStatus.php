<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/TaskModel.php';

$status = trim($_POST['status-select']);

$id = trim($_GET['id']);

$username = trim($_SERVER['PHP_AUTH_USER']);

TaskModel::setStatus($status,$id);

Header("Location: /");



