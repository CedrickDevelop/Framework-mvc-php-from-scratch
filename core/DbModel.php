<?php

  namespace App\Core;

  /**
   * To map to the database
   */
  class DbModel extends Model
  {


    public function __construct()
    {
 
    }

    /**
     * Prepare the datas to insert into the database
     */
    public static function prepare($sql)
    {
      return Application::$app->database->pdo->prepare($sql);
    }
    
    /**
     * Insert the datas into the database 
     */
    public static function save($table, $tableRow, $values)
    {
      return 'INSERT INTO '.$table.' ('.implode(", ", $tableRow).') VALUES('.implode(", ", $values).')';
    }
    
    /**
     * Select the datas from the database
     */
    public static function select($table, $tableRow)
    {
      return 'SELECT '.implode(', ', $tableRow).' FROM '.$table ;
    }

    public static function UserExists($table, $where, $search)
    {
      return 'SELECT * FROM '.$table.' WHERE '.$where.' = '.$search;
    }
    

    /**
     * @return array
     */
    public function rules(): array
    {
      return [
        // 'firstname' => [self::RULE_REQUIRED],
        'pseudo' => [self::RULE_REQUIRED],
        'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
        'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' =>8], [self::RULE_MAX, 'max' => 24]],
        'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password' ]],
      ];
    }
    

    

  }



?>