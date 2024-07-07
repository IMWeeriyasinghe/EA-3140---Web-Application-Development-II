<?= $this->extend('layouts/starter') ?>

<?= $this->section('title') ?>
User Registration
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (isset($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
<?php endif; ?>

<!-- Registration Form -->
<form method="post" action="<?= base_url('add_user') ?>">

    <div class="card-body">
        <!-- First Name -->
        <div class="form-group">
            <label for="exampleInputFirstName">First Name</label>
            <input type="text" name="first_name" class="form-control" id="exampleInputFirstName" placeholder="Enter your First Name">
            <?php if (isset($validation['first_name'])): ?>
                <div class="text-danger"><?= $validation['first_name'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Last Name -->
        <div class="form-group">
            <label for="exampleInputLastName">Last Name</label>
            <input type="text" name="last_name" class="form-control" id="exampleInputLastName" placeholder="Enter your Last Name">
            <?php if (isset($validation['last_name'])): ?>
                <div class="text-danger"><?= $validation['last_name'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            <?php if (isset($validation['email'])): ?>
                <div class="text-danger"><?= $validation['email'] ?></div>
            <?php endif; ?>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            <?php if (isset($validation['password'])): ?>
                <div class="text-danger"><?= $validation['password'] ?></div>
            <?php endif; ?>
        </div>

    </div>
    <!-- Submit Button -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<?= $this->endSection() ?>
