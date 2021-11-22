<?php

  namespace App\model;

  use App\Core\Model;

  /**
   * class to register information to database
   */
  class RegisterModel extends Model
  {

    public string $firstname = '';
    public string $lastname = '';
    public string $pseudo = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';

    /**
     * 
     */
    public function register()
    {
      echo "creating a new user";
    }

    /**
     * @return array
     */
    public function rules(): array
    {
      return [
        'firstname' => [self::RULE_REQUIRED],
        'lastname' => [self::RULE_REQUIRED],
        'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
        'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' =>8], [self::RULE_MAX, 'max' => 24]],
        'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password' ]],
      ];
    }
  }


?>