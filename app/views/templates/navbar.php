<nav class="navbar navbar-expand-lg navbar-light customNavbar">
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
                    <button type="button" class="btn nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAiNJREFUSEvF1kvoTVEUx/HPHxmQRyihPAoRAxNhRJkyMKKUjCQDKSkyk1dIZGQkpUjJADMDSpFHmSF55ZnHgDJRHnfVOf+O0zl3n3v+/9t/j+7trLW/e61+e6/fgBFaAyPE1St4NFZiLmZkh/6AV7iP300LaQpegH3YgMk1m3/DVRzBy9QBUuBxOIodiGqbrF84jgOI35WrG3gObmBJE1pFzAOs6xz6c1V+HXgx7mBKS2ie9h6r8La8TxV4Oh5h1hChefqTTueW42dxvyrwJWxMQL/jcRazDJMS8aexqxt4UQcaJ0yt21iTBd3C6kRCiCyu4Mc8rlzx+c5V2JKioldwbHkY+6vAY/EVE/oEfo15VeC1uNkAGiFtKo68hXgeP4qt3opzFeCikPLPIaxcLKcQAiuuOsGtx/UyeA+OVYCL1TVsiDrBxWFD4f9VvBsn+gwOxskyeBMu9rnV8T5cLoNj3N1t2Mu24ooX7GEZHEL7gqkN4G3AnzATf8vg+H8W2/oEPoOddS/XfDzrzNJRCXivFYczicdjcEpVDYkLnUu+OQHudUhEJ7cX96wCT0MM8XjUh2M9xQr8SIHje3ise8NgBMIIBvRduYJu1icqvoalLcsOMxFP5OAobFJxHjMeBzM1pgSX58TsDYN4qK3ZKx4wDMLezN5OrOlA2Nsr2dx9k+pSyt6W88dk5m12ydC/yAT5JwWsu8dN84Yc12vFQwbmG/wDmONpH9S+OtIAAAAASUVORK5CYII=" />
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
                    <a class="nav-link" href="<?= BASEURL; ?>/beranda/settings"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAA0JJREFUSEvFllnITlEUhp8/Y0SmTCFXEjfGosiU4UIuZM7wI+JG5iEuuJA5uVAoU8ksUTJPSZmluJELkVlmMoX9am3t//znfOecr/Stm+87e1jv3ut919qrjBJZWYlwKQa4BTAUaGCHfgMcAp7kuURe4O7AOaBmBOQT0Au4lRU8L/B+YHiC813AuP8BXA24AnQCLgK9DeRCcFtF5HsW8KQbi8cJwG9gO9AF2AY0MqcKdz/7fxboa/9fAROB20C5je0AnkYPEwfcBLgD6Ff2FqgH/4T4DJgF7LP5McBaoJl967DvgPr2/QjoDLwOweOAk3j8AMy3m/+I3EA0TAVWAbVjQq1DjioEPAA4aQu0WIJZAbywED5O4a81sNUoWQyMBUbanoHAKb8/emNx18eF8j3QFngeAzTMHWR6wKs43ggcjlnbFLgP1AHOAP2TgO8B7QCFciGw3gTm168B5ibceqnTwbJgTpeSFhT+qqabDknA4mF3ICQBiVfZiEBQX90BpQU/7guKqDpt4+uA2fb/l4X8YBKwxrsBCl8t49gXBVWljkaD0uuBORElN2299DHIxveYoD4bLdfSVK15nVChWg4ssQ3fgOrAJuM49KMcV/6qbje0CYVY0foSp/SkAqJQ1nA1eSWwyBypHitVNjvRTYvwvMU9ElOAj0Bdm1sNzHOa0D6Jq4LFAYeh3guMth2XnDJ7WHFQyB/aeBvgugGGFe0AoAzIFGrlnLjxBwrFNcRxfCS4vRxXMdF5cYlfXwdUzebYelUzPS56Pv9a9MZ3gfaWTuJnQySdfPiikdP3AicwzYe+Z9qY0kn1Ww9MLLAv+GkFZIZTfk/zcdQEdzzmNGEBCRVf6cYqayfMgS+ZKn3iSapNK5kt7TWTCJURYckMczy29Sn2kZhkYfWqDgOQ+khocWPjo7ntVG7KmXiSqbeSCC/bt0Iu9fv1Py2twmexK/AyPEmhRmC8CWunNXYqEnIgOwYMtv/i1lerq46OyZZyaiRkaiT0hlewPD2X1t4o0PqobOpgSp1UywMsZwqpf1+jzpX/6kYyWV5gVbXzCe2t3nFFJJPlBZbTVtbQqw+TSXx67io1dIVOUAxwphulLSoZ8B+vSbAfRGyF2gAAAABJRU5ErkJggg==" /></a>
                </li>
                <li class="nav-item">
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
            <form action="<?= BASEURL; ?>/beranda/posting" method="post" enctype="multipart/form-data">
                <div class=" modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                    </div>
                </div>
                <div class="mb-3 p-3">
                    <label for="pict" class="form-label">Image</label>
                    <input type="file" class="form-control" id="pict" name="pict">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>