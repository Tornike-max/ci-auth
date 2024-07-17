<?= $this->extend('layout/authLayout.php') ?>


<?= $this->section('authContent') ?>

<div class="card">
    <h4 class="text-center">Sign In</h4>
    <hr />

    <form action="<?= base_url('registerUser') ?>" class="form" method="POST">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" value="<?= set_value('name') ?>" type="text" id="name" name="name" placeholder="Enter your name" />
            <span class="text-sm text-danger">
                <?= isset($validation) ? display_form_error($validation, 'name') : '' ?>
            </span>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" value="<?= set_value('email') ?>" type="email" id="email" name="email" placeholder="Enter your email" />
            <span class="text-sm text-danger">
                <?= isset($validation) ? display_form_error($validation, 'email') : '' ?>
            </span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" />
            <span class="text-sm text-danger">
                <?= isset($validation) ? display_form_error($validation, 'password') : '' ?>
            </span>
        </div>
        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input class="form-control" type="password" id="password-confirm" name="passwordConf" placeholder="Enter your password" />
            <span class="text-sm text-danger">
                <?= isset($validation) ? display_form_error($validation, 'passwordConf') : '' ?>
            </span>
        </div>
        <div class="form-group mt-4 d-flex justify-content-center align-items-center flex-column gap-2">
            <button class="btn btn-success" type="submit">Sign up</button>
            <hr />
            <a href="login" class="text-decoration-underline" type="submit">Already have an account?</a>
        </div>
    </form>
</div>
<?= $this->endSection() ?>