<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>
    <div class="row justify-content-center ms-5">
        <div class="col-4 ms-5">
            <form method="post" action="<?= BASEURL; ?>/loginUser/proccessLogin">
                <div class="col-1 form-outline mb-2">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="col-1 form-outline mb-2">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="col-2 form-outline mb-4">
                    <label for="captcha"><?= $data['captchaText'] ?></label>
                    <input type="text" id="captcha" name="captcha" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-2">Submit</button>
            </form>
        </div>
    </div>
    <div class="text-center me-5 mt-2">
        didn't have an account? <a href="<?= BASEURL; ?>/register">register</a><br>
        <a href="<?= BASEURL; ?>/loginAdmin">Login as admin instead</a>
    </div>
</div>