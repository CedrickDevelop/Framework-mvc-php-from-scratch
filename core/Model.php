<?php

  namespace App\Core;

  /**
   * load Data and verification of basics
   * abstract : not possible to creating instance of this model
   */
  abstract class Model
  {

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    /**
     * check if the property exist 
     */
    public function loadData($data)
    {
      foreach($data as $key => $value){
        if (property_exists($this, $key)){
          $this->{$key} = $value;
        }
      }
    }

    /**
     * create some rules about some possible issues
     */
    abstract public function rules(): array;

    /**
     * array for the errors
     */
    public array $errors = [];


    /**
     * 
     */
    public function validate()
    {
        foreach($this->rules() as $attribute => $rules){
          $value =  $this->{$attribute};  //la variable devient un objet
          foreach ($rules as $rule) {
            $ruleName = $rule;
            if(!is_string($ruleName)){
              $ruleName = $rule[0];  //si on est dans un tableau le premier est le nom
            }
            if($ruleName === self::RULE_REQUIRED && !$value){
              $this->addError($attribute, self::RULE_REQUIRED);
            }
            if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)){
              $this->addError($attribute, self::RULE_EMAIL);
            }
            if($ruleName === self::RULE_MIN && strlen($value) < $rule['min'] ){
              $this->addError($attribute, self::RULE_MIN, $rule);
            }
            if($ruleName === self::RULE_MAX && strlen($value) > $rule['max'] ){
              $this->addError($attribute, self::RULE_MAX, $rule);
            }
            if($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
              $this->addError($attribute, self::RULE_MATCH, $rule);
            }
          }
        }
        return empty($this->errors);
    }

    /**
     * Creating an array for the errrors
     */
    public function addError(string $attribute, string $rule, $params = [])
    {
      $message =$this->errorMessages()[$rule] ?? '';
      foreach($params as$key=> $value){
        $message = str_replace("{{$key}}", $value, $message);
      }
      $this ->errors[$attribute][] = $message ;
    }

    public function errorMessages()
    {
      return [
        self::RULE_REQUIRED => "Ce champ doit être rempli",
        self::RULE_EMAIL => "Ce champ doit être rempli",
        self::RULE_MIN => "Ce champ doit contenir au moins {min} caractères",
        self::RULE_MAX => "Ce champ ne peut contenir plus de {max} caractères",
        self::RULE_MATCH => "Ce champ doit correspondre au {match}",
      ];
    }

    public function hasError($attribute)
    {
      return $this->errors[$attribute] ?? false ;
    }

    public function getFirstError($attribute)
    {
      return $this->errors[$attribute][0] ?? false;
    }

  }




?>