<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard Admin</title>
    <style>
        body {
            background-color: #F6A5E3;
        }

        .container {
            margin-top: 50px;
        }

        table {
            width: 100%;
            margin: auto;
        }

        .modal-content {
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="<?= BASEURL; ?>/dashboardAdmin/logout" method="post">
            <button type="submit" class="btn-primary">Logout</button>
        </form>
        <br><br>
        <div class="col">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                TAMBAH
            </button>
        </div>
        <table class="table table-primary table-striped">
            <tr>
                <th>ID</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th></th>
            </tr>
            <?php foreach ($data['users'] as $user) : ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['password']; ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/dashboardAdmin/hapus/<?= $user['id'] ?>" class="badge bg-danger float-end ms-1" onclick="return confirm('yakin?')">
                            HAPUS
                        </a>
                        <a href="<?= BASEURL; ?>/dashboardAdmin/ubah/<?= $user['id'] ?>" class="badge bg-success float-end ms-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $user['id'] ?>">
                            EDIT
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rbs5gX8S+a1GMpCv6PxBy62sUEK5tGTf7geUJCCz6oBE8eH0N3QbGopzgW8kgz6W" crossorigin="anonymous"></script>
</body>

</html>
