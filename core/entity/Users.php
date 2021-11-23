<?php


  namespace App\core\entity;

  class Users 
  {
    private static $table = 'users';
    private static $tableRow = ['username', 'email', 'password' ];
    
    

    public static function getTable(){
      return  self::$table;
    }

    public static function getTableRow(){
      return  self::$tableRow;
    }

  }

?>