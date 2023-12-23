<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-2 text-center">
            <img src="<?= $data['pict'] ?>" , alt="Photo" , height="200" , class="rounded-circle shadow"><br><br>
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
</div>