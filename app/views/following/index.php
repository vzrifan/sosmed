<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-3">
            <table class="table table-light table-striped">
                <tr>
                    <th style="text-align: center;">Followers</th>
                </tr>
                <?php foreach ($data['follower'] as $follower) : ?>
                    <?php
                    $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/sosmed/public/img/' . $follower['follower_id'] . '.jpg';
                    $src = file_exists($imagePath) ? BASEURL . '/img/' . $follower['follower_id'] . '.jpg' : BASEURL . '/img/profile.jpg';
                    ?>
                    <tr>
                        <td>
                            <a href="<?= BASEURL; ?>/beranda/otherProfile/<?= $follower['follower_id']; ?>" class="card-text text-reset text-decoration-none">
                                <img src="<?= $src ?>" , alt="Photo" , height="40" , width="40" , class="rounded-circle">
                            </a>
                            <a href="<?= BASEURL; ?>/beranda/otherProfile/<?= $follower['follower_id']; ?>" class="text-reset text-decoration-none">
                                <?= $follower['follower']; ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-3">
            <table class="table table-light table-striped">
                <tr>
                    <th style="text-align: center;">Following</th>
                </tr>
                <?php foreach ($data['following'] as $following) : ?>
                    <?php
                    $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/sosmed/public/img/' . $following['following_id'] . '.jpg';
                    $src = file_exists($imagePath) ? BASEURL . '/img/' . $following['following_id'] . '.jpg' : BASEURL . '/img/profile.jpg';
                    ?>
                    <tr>
                        <td>
                            <a href="<?= BASEURL; ?>/beranda/otherProfile/<?= $following['following_id']; ?>" class="card-text text-reset text-decoration-none">
                                <img src="<?= $src ?>" , alt="Photo" , height="40" , width="40" , class="rounded-circle">
                            </a>
                            <a href="<?= BASEURL; ?>/beranda/otherProfile/<?= $following['following_id']; ?>" class="text-reset text-decoration-none">
                                <?= $following['following']; ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>