<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../public/img/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: pink;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
        }

        .external-icon {
            text-align: center;
            margin-bottom: 1rem;
        }

        .external-icon img {
            width: 250px;
            height: auto;
        }

        .login-box {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 1rem;
        }

        .form-outline {
            margin-bottom: 1rem;
        }

        .form-outline label {
            font-size: 14px;
            margin-bottom: 0.2rem;
        }

        .form-outline input {
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 20px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-outline input:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            width: 100%;
            border-radius: 20px;
            padding: 10px;
            background-color: black;
            color: white;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-primary:hover {
            background-color: white;
            color: black;
        }

        .login-link {
            text-align: center;
            margin-top: 1rem;
        }

        .login-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 1rem;
            text-align: center;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="external-icon">
            <img src="../public/img/iconing.png" alt="Iconing">
        </div>
        <div class="login-box">
            <div class="col-lg-6">
                <?php Flasher::flash(); ?>
            </div>
            <form method="post" action="<?= BASEURL; ?>/loginUser/proccessLogin">
                <div class="login-title">Login to your account</div>
                <div class="form-outline mb-2 position-relative">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                    <i class='bx bxs-user position-absolute top-50 translate-middle-y' style='right: 10px;'></i>
                </div>
                <div class="form-outline mb-2 position-relative">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <i class='bx bxs-lock-alt position-absolute top-50 translate-middle-y' style='right: 10px;'></i>
                </div>
                <div class="form-outline mb-4 position-relative">
                    <label for="captcha"><?= $data['captchaText']; ?></label>
                    <input type="text" id="captcha" name="captcha" class="form-control" placeholder="Your answer" required>
                    <i class='bx bxs-pencil position-absolute top-50 start-0translate-middle-y mt-2' style='right: 10px;'></i>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div class="login-link">
                didn't have an account? <a href="<?= BASEURL; ?>/register">register</a><br>
                <a href="<?= BASEURL; ?>/loginAdmin">Login as admin instead</a>
            </div>
        </div>
    </div>
</body>

</html>