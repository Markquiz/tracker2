<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/core/Models/TaskModel.php';

class TaskController{

    static function deadlineCheck($id){

        $task = TaskModel::getTask($id);

        $date = date_create($task['deadline']);
            
        $deadline = $date->format("d.m.Y") ;

        $currentDate = date("d.m.Y");

        if($deadline==$currentDate){
    
            $status = "<div style='color:orange;'>Последний день</div>";
        }
        elseif($currentDate != $deadline && $deadline < $currentDate){
    
            TaskModel::setStatus("Просрочено",$id);
            echo "<script>window.location.reload()</script>";
        }
        else{

            $status = $deadline;

        }

        return $status;


    }

    static function complexityCheck($id){
        
        $task = TaskModel::getTask($id);

        if($task['complexity']=="Сложное"){

            $color = "red";
        }
        elseif($task['complexity']=="Среднее"){

            $color = "orange";

        }
        elseif($task['complexity']=="Легкое"){

            $color = "lightgreen";
        }
        else{
            
            $color = "gray";
        }

        return $color;

    }

}