<?php 

// if (isset($params) && !empty($params)){
//    echo "<pre>";
//     var_dump($params['model']->errors['password']);
//     echo "<pre>"; 
// }


?>

<h3>Register page</h3>

 
<form action="" method="post">
    <div class="mb-3">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control <?php if ($params['model']->errors['pseudo'] !== NULL ){ echo ' is-invalid'; } ?>" name="pseudo" id="pseudo" alt="pseudo" value="<?= $params['model']->pseudo  ?>" required autofocus >
        <div class="invalid-feedback">
            <?php if ($params['model']->errors['pseudo'][0] !== NULL ){ echo $params['model']->errors['pseudo'][0]; } ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control <?php if ($params['model']->errors['email'] !== NULL ){ echo ' is-invalid'; } ?>" name="email" id="email" alt="email" value="<?= $params['model']->email  ?>" required>
        <div class="invalid-feedback">
            <?php if ($params['model']->errors['email'][0] !== NULL ){ echo $params['model']->errors['email'][0]; } ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label" >password</label>
        <input type="password" class="form-control <?php if ($params['model']->errors['password'] !== NULL ){ echo ' is-invalid'; } ?>" name="password" id="password" alt="password" required>
        <div class="invalid-feedback">
            <?php if ($params['model']->errors['password'][0] !== NULL ){ echo $params['model']->errors['password'][0]; } ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="passwordConfirm" class="form-label">password</label>
        <input type="password" class="form-control <?php if ($params['model']->errors['password'] !== NULL ){ echo ' is-invalid'; } ?> " name="passwordConfirm" id="passwordConfirm" alt="password" required>
        <div class="invalid-feedback">
        <?php if ($params['model']->errors['password'][0] !== NULL ){ echo $params['model']->errors['password'][0]; } ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit-register" value="submit-register">Submit</button>
</form>