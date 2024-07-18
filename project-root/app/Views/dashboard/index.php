<?= $this->extend('layout/layout.php') ?>

<?= $this->section('content') ?>

<?php

if (!empty(session()->getFlashdata('success'))) {
?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
<?php
} else if (!empty(session()->getFlashdata('error'))) {
?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
<?php
}

?>

<div class="container">

    <div class="row pt-3">
        <div class="col-md-8 offset-2">
            <h2><?= $title ?></h2>
            <hr />
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th>
                            <img src='' alt="" width="200px" height="150px" />
                            <form method="POST" action="<?= base_url('users/uploadImage') ?>" enctype="multipart/form-data">
                                <input type='file' name='avatar' class="form-controll" size='10' />
                                <hr />
                                <button type="submit">Save</button>
                            </form>
                        </th>
                        <th scope="row"><?= $userInfo['id'] ?></th>
                        <td><?= $userInfo['name'] ?></td>
                        <td><?= $userInfo['email'] ?></td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>