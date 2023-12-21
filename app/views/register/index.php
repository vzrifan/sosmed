<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>
    <div class="col">
        <form method="post" action="<?= BASEURL; ?>/register/tambah">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <label for="captcha"><?= $data['captchaText'] ?></label>
            <input type="text" id="captcha" name="captcha" required>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col">
        already have an account? <a href="<?= BASEURL; ?>/loginUser">login</a>
    </div>
</div>