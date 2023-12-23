<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-2 text-center">
            <a href="#" data-bs-toggle="modal" data-bs-target="#formModal">
                <img src="<?= $data['pict'] ?>" , alt="Photo" , height="200" , class="rounded-circle shadow"><br><br>
            </a>
            <?= $data['user']; ?>
        </div>
        <div class="col-1 mt-5">
            Post<br>
            <?= $data['totalPost']; ?>
        </div>
        <div class="col-1 mt-5">
            Followers<br>
            <?= $data['totalFollowers']; ?>
        </div>
        <div class="col-1 mt-5">
            Following<br>
            <?= $data['totalFollowing']; ?>
        </div>
    </div>
    <div class="container mt-5">
        <?php foreach ($data['userPost'] as $posting) : ?>
            <div class="row justify-content-center">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $posting['username']; ?></h5>
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <p class="card-text"><?= $posting['content']; ?></p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
            </div>
            <br>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Ganti</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/beranda/changePicture" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- Hidden input to store user ID -->
                    <input type="hidden" id="userIdInput" name="userId">
                    <div class="mb-3">
                        <label for="username" class="form-label">Foto profil</label>
                        <input type="file" class="form-control" id="pict" name="pict">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ganti</button>
                </div>
            </form>
        </div>
    </div>
</div>