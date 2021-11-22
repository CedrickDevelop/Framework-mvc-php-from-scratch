<h3>Register page</h3>
<form action="" method="post">
    <div class="mb-3">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control <?= $model->hasError('firstname') ? ' is-invalid' : '';  ?>" name="pseudo" id="pseudo" alt="pseudo" value="<?= $model->firstname  ?>" required autofocus >
        <div class="invalid-feedback">
            <?= $model->getFirstError('firstname') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="email" alt="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label" >password</label>
        <input type="password" class="form-control" name="password" id="password" alt="password" required>
    </div>
    <div class="mb-3">
        <label for="passwordConfirm" class="form-label">password</label>
        <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" alt="password" required>
    </div>
    <button type="submit" class="btn btn-primary" name="submit-register" value="submit-register">Submit</button>
</form>