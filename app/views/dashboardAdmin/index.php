<div class="container">
    <form action="<?= BASEURL; ?>/dashboardAdmin/logout" method="post">
        <button type="submit" class="btn-primary">Logout</button>
    </form>
    <br><br>
    <div class="col">
        <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
            tambah
        </button>
    </div>
    <table>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
        </tr>
        <?php foreach ($data['users'] as $user) : ?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['username']; ?></td>
                <td><?= $user['password']; ?></td>
                <td>
                    <a href="<?= BASEURL; ?>/dashboardAdmin/hapus/<?= $user['id'] ?>" class="badge bg-danger float-end ms-1" onclick="return confirm('yakin?')">
                        hapus
                    </a>
                    <a href="<?= BASEURL; ?>/dashboardAdmin/ubah/<?= $user['id'] ?>" class="badge bg-success float-end ms-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $user['id'] ?>">
                        ubah
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/beranda/posting" method="post">
                <div class="modal-body">
                    <!-- Hidden input to store user ID -->
                    <input type="hidden" id="userIdInput" name="userId">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="Username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>