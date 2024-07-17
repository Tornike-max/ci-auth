<?= $this->extend('layout/authLayout.php') ?>


<?= $this->section('authContent') ?>

<div class="card">
  <h4 class="text-center">Sign In</h4>
  <hr />

  <form action="#" class="form" method="POST">
    <?= csrf_field() ?>
    <?php if (isset($validation)) : ?>
      <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <div class="form-group">
      <label for="email">E-mail</label>
      <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email" />
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" />
    </div>
    <div class="form-group mt-4 d-flex justify-content-center align-items-center flex-column gap-2">
      <button class="btn btn-success" type="submit">Sign in</button>
      <hr />
      <a href="register" class="text-decoration-underline" type="submit">You dont have an account?</a>
    </div>
  </form>
</div>

<?= $this->endSection() ?>