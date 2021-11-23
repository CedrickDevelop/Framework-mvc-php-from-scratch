<?php 

// if (isset($params) && !empty($params)){
//    echo "<pre>";
//     var_dump($params['userExist']);
//     echo "<pre>"; 
// }


?>

<h3>Login page</h3>
<form action="" method="post">         
        

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control <?php if ($params['model']->errors['email'] !== NULL ){ echo ' is-invalid'; } ?>" name="email" id="email" value="<?= $model->email  ?>">
        <div class="invalid-feedback">
            <?php if ($params['model']->errors['email'][0] !== NULL ){ echo $params['model']->errors['email'][0]; } ?>
        </div>

    </div>
    <div class="mb-3">
        <label for="password" class="form-label">password</label>
        <input type="password" class="form-control <?php if ($params['model']->errors['password'] !== NULL ){ echo ' is-invalid'; } ?>" name="password" id="password" >
        <div class="invalid-feedback">
            <?php if ($params['model']->errors['password'][0] !== NULL ){ echo $params['model']->errors['password'][0]; } ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit-login" value="submit-register">Submit</button>

    <p><?= $params['userExist'] ?></p>
</form>