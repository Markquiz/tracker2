<?php

require_once $_SERVER[ 'DOCUMENT_ROOT' ].'/DB/DB.php';

class TaskModel {

    static function getTasks( $status ) {

        $conn = DB::getConnection();

        $query = $conn->prepare( 'SELECT * FROM `tasks` WHERE `status` = ? ORDER BY deadline' );

        $query->execute( [ $status ] );

        $tasks = $query->fetchAll();

        return $tasks;
    }

    static function getUserTasks( $username ) {

        $conn = DB::getConnection();

        $query = $conn->prepare( 'SELECT * FROM `tasks` WHERE `username` = ? ORDER BY deadline' );

        $query->execute( [ $username ] );

        $tasks = $query->fetchAll();

        return $tasks;
    }

    static function getTask( $id ) {

        $conn = DB::getConnection();

        $query = $conn->prepare( 'SELECT * FROM `tasks` WHERE id = ?' );

        $query->execute( [ $id ] );

        $task = $query->fetch();

        return $task;

    }

    static function addTask( $username, $descr, $status, $complexity, $title, $deadline ) {

        $conn = DB::getConnection();

        $query = $conn->prepare( 'INSERT INTO `tasks` (username, descr, status, complexity, deadline) VALUES (?,?,?,?,?)' );

        $query->execute( [ $userId, $descr, $status, $complexity, $deadline ] );

    }

    static function setStatus( $status, $taskId ) {

        $conn = DB::getConnection();

        $query = $conn->prepare( 'UPDATE `tasks` SET `status` = ? WHERE id = ?' );

        $query->execute( [ $status, $taskId ] );

    }

    static function unsetTask( $id ) {

        $conn = DB::getConnection();

        $query = $conn->prepare( 'DELETE FROM tasks where id = ?' );

        $query->execute( [ $id ] );

    }

    static function deadTasksNotify() {

        $status = 'Просрочено';

        $conn = DB::getConnection();

        $query = $conn->prepare( 'SELECT * FROM tasks WHERE status = ?' );

        $query->execute( [ $status ] );

        if ( $query->rowCount()>0 ) {

            $notify = true;

        } else {

            $notify = false;
        }

        return $notify;

    }

    static function userDeadTasksNotify($username) {

        $status = 'Просрочено';

        $conn = DB::getConnection();

        $query = $conn->prepare( 'SELECT * FROM tasks WHERE status = ? AND username = ?' );

        $query->execute( [ $status,$username ] );

        if ( $query->rowCount()>0 ) {

            $notify = true;

        } else {

            $notify = false;
        }

        return $notify;

    }

}