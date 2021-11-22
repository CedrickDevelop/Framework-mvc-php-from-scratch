<?php

  namespace App\core\form;

use App\Core\Model;

class Field 
  {
    public Model $model;
    public string $attribute;
    
    
    public function __construct(Model $model, $attribute)
    {
      $this->model = $model;
      $this->attribute = $attribute;
    }

    public function __toString()
    {
      return sprintf("
        <div class='mb-3'>
          <label for='%s' class='form-label'>%s</label>
          <input type='text' name='%s' value='%s' class='form-control%s' alt='%s' required>
        </div>

        <div class='invalid-feedback'> %s </div>

      ", 
        $this->attribute, //label for
        $this->attribute, //label
        $this->attribute, //name
        $this->model->{$this->attribute},//value
        $this->model->hasError($this->attribute) ? ' is-invalid' : '', //class
        $this->attribute,//alt
        $this->model->getFirstError($this->attribute)//invalid feedback

      );
    }

  }

?>