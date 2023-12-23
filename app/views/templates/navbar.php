<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item me-5">
                    <?php
                    $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/sosmed/public/img/' . $_SESSION['id'] . '.jpg';
                    $src = file_exists($imagePath) ? BASEURL . '/img/' . $_SESSION['id'] . '.jpg' : BASEURL . '/img/profile.jpg';
                    ?>
                    <a class="nav-link" href="<?= BASEURL; ?>/beranda/profile/<?= $_SESSION['id']; ?>">
                        <img src="<?= $src ?>" , alt="Photo" , height="40" , class="rounded-circle shadow">
                    </a>
                </li>
                <li class="nav-item ms-5">
                    <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/beranda"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAbNJREFUSEvt1jtrFUEUAOAvBtRGIjYBCy20sBBsgoUIEWwsRCyCaSIKNkbyC2zUQvwFKoKCohaKEAgp0ggGQopgYWEjJIUWQhpRbFQQ3YFZWOY+9hnS5HZ3duZ8u2fPnJ0R2/Qb2SZXG3gG//Cyyc03hQP6PIKX8aIu3gQ+h0WMRuwvzmOpDl4XPoll7E2QX5jEWlW8Dnwke7L32D8g+PcsExPYqIJXhcfj0xwqCfoFISubZXgVeB9WcbwsWLz+Eafwc9j8Mng33uJ0RTSftoKz+DNo3TB4F+ZxoSaaT1/AxbjXe0IMgx/jWkM0X3Yfc/1iDIJv4m5LNF8eYt1LY/WDi12pI1tPd0vhtCt1Bfd0tyJ8LCuGD1la9nSlJXF+Z8V6Ap/CeBGexYMtQvOw1/EohUPTD1V8MM66isMtb+QznsYYX/EEIe1Dv8fvYuNvY4cPypk62ynM3YHzjD0rvLd8LNTDlT4p7TTVdzLgdoKE/7d24HhM6qyqtzzVr3Cpz3u7gYfJ+KCu9xrTdffxUUwlJ8pvCFX9Iwk2Fqv6QGE8nDzfYL0u3KZjla4tO3OVBmg64T81F1Af8xlKRAAAAABJRU5ErkJggg==" /></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL; ?>/following"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAcpJREFUSEvtl78rRlEYxz9vBikDBrIZDQwkFoVBDGJlovwJBoMBiwx2I1kwUiQLBgtiMAuZpPwYSXG/b/fW6bzn/ni9Rzflqbf7du7z3O+53+f7fU63QE5RyAmXJOBRoBO4DK67ZWxwGmgGDoCLuLo44PmgYMEo0v/FDOA7wUa14ShGgD1XXRzwC1BnFLwC9SnAXcC5lSOmxv4EcG5Uix31qiOg6uq3xaV+twMNCb18Bq6BLyunGugGqhy1N8CDvW6KaxzYzKDcCWDLypN1hmJqP4L8VuDWvG8CyzLqbVrIVqbVpH4xkTQT5oAl38BZmDoFen0DrwFTKTRJE5oDb1GeD6ofgca0/gBiZtsXcFuo8gy4bAQCm/QFPAOsZEEFnoCmyIqVUn0IDGYEVpq8XpznlQLPAjXAMNCTsIFl4D0A3gfObGApM1Jnn+MhJ+HaOqCfGceAqybK6Qei+uJanOntkZiUq3Epm+gaFyXnuQ9gvc1RSp/FyEDcADHXy3njLKNW/a0FPl12+imwBoMOgRbTp+HD7g09rAIaNt56bArIplyCUitKwkeP/4FNWsum2jzoowe51kwQics+Hu8cwyZRXCm2rPx2bt9O33JgaR80UHUWAAAAAElFTkSuQmCC" /></a>
                </li>
                <li class="nav-item">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAASxJREFUSEvt1tEqBkEUwPHfd03xBCIvoOSah5BrF4q8BB5CSinXvAT3ilsu8AqUXLKjb7W+vt0dO+NbytQ2NTPn/M/Zc2bOGehpDHriigFPYR0LCUY+4AyvpY428CyusJgALUVvsYyXsNAG3sVhBmipYgsnMeB97A2l2oxssu9tuHlQzEFnq8e/GryJeTwW82mN2z/i8QVWcYm1PwUeF8+YGCd7HAsOMQ1fOZYwgyfcVNZDvMuYN8Y4Flw913SFPq9OcSWzgHvzeNTLicX4H5z8csVmdZdilSWrJwLewVEXUo3MNo5Hy+K4Xx06kOth9Unl32EFzzHgcGYaG5hLIN/jvK7niikICeyvotV2pjdwrkSK6s2qh3Il0rfBuRLpo4tsG1HWtSnpst8b+B0czWkf7tIMXwAAAABJRU5ErkJggg==" />
                    </button>
                </li>
                <li class="nav-item me-5">
                    <div class="col nav-link">
                        <form action="<?= BASEURL; ?>/beranda/search" method="post" class="d-flex">
                            <input type="text" class="form-control" placeholder="Search" name="keyword" id="keyword" autocomplete="off">
                            <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                        </form>
                    </div>
                </li>
                <li class="nav-item ms-5">
                    <!-- <form action="<?= BASEURL; ?>/beranda/logout" method="post">
                        <button type="submit" class="btn-primary">Logout</button>
                    </form> -->
                    <a class="nav-link" href="<?= BASEURL; ?>/beranda/logout"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAW1JREFUSEvtlrsuRUEUhr8jHkAUElFqEbXC5QHwEhrR8BoSUVGIzoO4NCQiwTMIEQpaBPMne5Ix9hzrzOzYpziT7GbPzPrWZdbM36Gl0WmJS9+BR4AZYKgwI5/ALfAS26mLeAvYBoYLoX77uwNvAvuhvRg8Adw1BAzNfDnwGPDsf8bgeeC0mlTk14VOzAK7lY0F4CwFXgSOq8kl4KQQnLQXRzwAp1I9B0y67+iPUphTrf7VgdDQwfrVf9WcN3gAbAAfCQfMYOtZCg1eACvOgaeazWZwGHE3J8I20boHYBW4jDaZweFCa/R+3Zu7fNaiuv8LWHVeBw4Dj83g3FTrKlSdz3NTbU1vGMkVsFzVOd6fFbGlndTHqqvqWzfMYOuVqQtkClAfdxuNg3NK8uPRGTwSrQmBceDeWsAe1kn6yPZjSoHov4TZTgMK0zMk9iSj9kJHU7p6FJiGYt0teXvjwK9xdvpO0PdQvrylrUX8DZOyaB9ap/VCAAAAAElFTkSuQmCC" /></a>
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