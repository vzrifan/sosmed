<div class="container mt-2">
    <?php foreach ($data['users'] as $user) : ?>
        <div class="row justify-content-center">
            <div class="col-2">
                <div class="card text-start bg-light">
                    <div class="card-body">
                        <div class="col">
                            <?php
                            $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/sosmed/public/img/' . $user['id'] . '.jpg';
                            $src = file_exists($imagePath) ? BASEURL . '/img/' . $user['id'] . '.jpg' : BASEURL . '/img/profile.jpg';
                            ?>
                            <div class="row-1 text-align-start">
                                <a href="<?= BASEURL; ?>/beranda/otherProfile/<?= $user['id']; ?>" class="card-text text-reset text-decoration-none">
                                    <img src="<?= $src ?>" , alt="Photo" , height="40" , width="30" , class="rounded-circle">
                                </a>
                            </div>
                            <div class="row">
                                <a href="<?= BASEURL; ?>/beranda/otherProfile/<?= $user['id']; ?>" class="card-text text-reset text-decoration-none"><?= $user['username']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>