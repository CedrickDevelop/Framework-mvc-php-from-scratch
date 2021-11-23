<?php

  namespace App\core;


  /**
   * Connect to database
   */
  class Database 
  {

    const DSN = 'mysql:host=localhost;dbname=blog_3wa';
    const USER = 'root';
    const PASS = '';
    public \PDO $pdo;


    /**
     * creating the connexion with some error we catch
     */
    public function __construct()
    {
      // $this->pdo = new \PDO($this->dsn, $this->user, $this->password);
      $this->pdo = new \PDO(self::DSN, self::USER, self::PASS);
      $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

 
  }


?>