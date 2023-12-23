<div class="container mt-5">
    <?php foreach ($data['posting'] as $posting) : ?>
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