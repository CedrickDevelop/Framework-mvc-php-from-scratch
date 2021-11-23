<?php

  namespace App\model;

use App\core\Database;
use App\Core\DbModel;
use App\Core\Model;
use App\core\entity\Users;

  /**
   * class to register information to database
   */
  class LoginModel extends Model
  {
    public string $email = '';
    public string $password = '';

    private DbModel $dbmodel;

    public function __construct()
    {
      $this->dbmodel = new DbModel();
    }

    /**
     * 
     */
    public function register()
    {
      $values = ["'username'", "'email'", "'password'"];
            
      $requete = $this->dbmodel->save(Users::getTable(), Users::getTableRow(), $values);
      $envoi = $this->dbmodel->prepare($requete);
      $test = $envoi->execute();   

      // var_dump(DbModel::select($tableRow, $table));
      // var_dump($requete);
      var_dump($test);
    }

    public function verifyUserMail($email)
    {

      $sql = $this->dbmodel::UserExists(Users::getTable(), 'email', ':email');
      $stmp = $this->dbmodel->prepare($sql);
      $stmp->execute(['email' => $email]);
      $user = $stmp->fetch();
      
      if (!empty($user)){
        return true;
      }
      return false;
    }
    
    public function verifyUserPassword($password)
    {

      $sql = $this->dbmodel::UserExists(Users::getTable(), 'password', ':pass');
      $stmp = $this->dbmodel->prepare($sql);
      $stmp->execute(['pass' => $password]);
      $user = $stmp->fetch();
      
      if (!empty($user)){
        return true;
      }
      return false;
    }
    
    public function verifyUser($email)
    {
      //if true email exist
      // if($this->verifyUserMail($email)){
      //   $this->verifyUserPassword();
      // } else {
      //   return false;
      // }

    }

    public function getUser($email)
    {
      $sql = $this->dbmodel::UserExists(Users::getTable(), 'email', ':email');
      $stmp = $this->dbmodel->prepare($sql);
      $stmp->execute(['email' => $email]);
      $user = $stmp->fetch();
      
      return $user;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
      return [
        'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
        'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' =>8], [self::RULE_MAX, 'max' => 24]]
      ];
    }
  }


?>