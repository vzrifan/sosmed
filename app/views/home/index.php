<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sosmed</title>
    <style>
        body {
            background-color: pink;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-box {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-box input {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <div class="text-center mb-4">
                <img class="mb-4" src="../public/img/iconing.png" alt="" width="250" height="100">
                <h1 class="h3 mb-3 font-weight-normal">Welcome to Zaply</h1>
            </div>
            <div class="text-center">
                <a href="<?= BASEURL; ?>/loginUser">
                    <button type="button" class="btn btn-primary">Login user</button>
                </a>
            </div>
            <div class="text-center mt-3">
                <a href="<?= BASEURL; ?>/loginAdmin">
                    <button type="button" class="btn btn-primary">Login admin</button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>