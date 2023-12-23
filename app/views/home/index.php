<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sosmed</title>
    <style>
        body {
            background-color: #f0f0f0f0;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col">
                <a href="<?= BASEURL; ?>/loginUser">
                    <button type="button" class="btn btn-primary">Login user</button>
                </a>
            </div>
            <div class="col">
                <a href="<?= BASEURL; ?>/loginAdmin">
                    <button type="button" class="btn btn-primary">Login admin</button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>