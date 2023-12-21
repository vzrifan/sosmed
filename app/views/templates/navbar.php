<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- <a class="navbar-brand" href="<?= BASEURL; ?>/beranda">Sosmed</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <div class="container">
                    <form action="<?= BASEURL; ?>/beranda/logout" method="post">
                        <button type="submit" class="btn-primary">Logout</button>
                    </form>
                </div>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/beranda">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL; ?>/following">Follow</a>
                </li>
                <li class="nav-item">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Posting
                    </button>
                </li>
                <div class="col-lg-6">
                    <form action="<?= BASEURL; ?>/beranda/cari" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="keyword" id="keyword" autocomplete="off">
                            <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                        </div>
                    </form>
                </div>
                <li>
                    <img src="<?= BASEURL; ?>/img/profile.jpg" , alt="Photo" , height="40" , class="rounded-circle shadow">
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kirim postingan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/beranda/posting" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>