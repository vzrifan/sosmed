<div class="container">
    <div class="row align-items-start">
        <div class="col">
            <form action="<?= BASEURL; ?>/beranda/ubah" method="post" class="mx-5">
                <div class="modal-body">
                    <!-- Hidden input to store user ID -->
                    <input type="hidden" id="userIdInput" name="userId">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $data["user"]['username']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?= $data["user"]['password']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-center align-items-center text-align-center">
        <div class="col-lg-2">
            <a class="btn btn-danger" href="<?= BASEURL; ?>/beranda/hapus" onclick="return confirm('yakin?')">Delete account</a>
        </div>
    </div>
</div>