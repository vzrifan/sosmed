<div class="container mt-5">
    <?php foreach ($data['users'] as $user) : ?>
        <div class="row justify-content-center mb-2">
            <div class="col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="<?= BASEURL; ?>/beranda/otherProfile/<?= $user['id']; ?>" class="card-text text-reset text-decoration-none"><?= $user['username']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>