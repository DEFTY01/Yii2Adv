<?php

namespace common\models;

Class ValueHelpers {
    
    
    /** return the value of a role name handed in a string 
     * exmp.: 'admin'
     */
    public static function getRoleValue($role_name){
        $connection = \Yii::$app->db;
        $sql = "SELECT role_value FROM role WHERE role_name=role_name";
        $command = $connection->createCommand($sql);
        $command->bindValue(":role_name",$role_name);
        $result = $command->queryOne();
        
        return $result['role_value'];
    }
    
    /*return the value of a status name handed in string
     * example: 'Active'
     */

    public static function getStatusValue($status_name)
    {
        $connection = \Yii::$app->db;
        $sql = "SELECT status_value FROM status WHERE status_name=:status_name";
        $command = $connection->createCommand($sql);
        $command->bindValue(":status_name", $status_name);
        $result = $command->queryOne();
        return $result['status_value'];
    }
    
    
    /**
     * returns a value of user_type_name so that you
     * can used inj PermissionHelpers methods handed in string
     * example: 'Paid'
     */
    
    
    public static function getUserTypeValue($user_type_name){
        $connection = \Yii::$app->db;
        $sql = "SELECT user_type_value FROM user_type WHERE user_type_name=:user_type_name";
        $command = $connection->createCommand($sql);
        $command->bindValue(":user_type_name",$user_type_name);
        $result = $command->queryOne();
        
        return $result['user_type_value'];
    }
    
    
    }


