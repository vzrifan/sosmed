<?php

class LoginUser extends Controller
{
    public function index()
    {
        $data['judul'] = "Login";
        $data['captchaText'] = $this->generateCaptcha();
        $this->view('templates/header', $data);
        $this->view('loginUser/index', $data);
        $this->view('templates/footer');
        $this->googleLogin();
    }

    public function googleLogin()
    {
        include_once("/xampp/htdocs/sosmed/app/config/configGoogle.php");
        include_once("/xampp/htdocs/sosmed/app/includes/functions.php");

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $_SESSION['token'] = $gClient->getAccessToken();
            header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['token'])) {
            $gClient->setAccessToken($_SESSION['token']);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            //DB Insert
            $gUser = new Users();
            $gUser->checkUser('google', $userProfile['id'], $userProfile['given_name'], $userProfile['family_name'], $userProfile['email'], $userProfile['gender'], $userProfile['locale'], $userProfile['link'], $userProfile['picture']);
            $_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
            header("location: home.php");
            $_SESSION['token'] = $gClient->getAccessToken();
        } else {
            $authUrl = $gClient->createAuthUrl();
        }

        if (isset($authUrl)) {
            echo '<a href="' . $authUrl . '"><div class="g-img"><img src="../public/img/glogin.png" width="200" height="40" alt=""/></div></a>';
        } else {
            echo '<a href="logout.php?logout">Logout</a>';
        }
    }

    public static function generateCaptcha()
    {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $_SESSION['captcha_result'] = $num1 + $num2;
        return "$num1 + $num2 = ";
    }

    function validateCaptcha($input)
    {
        return isset($_SESSION['captcha_result']) && $input == $_SESSION['captcha_result'];
    }

    public function proccessLogin()
    {
        $inputCaptcha = isset($_POST['captcha']) ? $_POST['captcha'] : '';

        if ($this->validateCaptcha($inputCaptcha)) {
            // Form submission successful
            unset($_SESSION['captcha_result']);
            if ($this->model('User_model')->loginUser($_POST)) {
                $username = $_POST['username'];
                $userId = $this->model('User_model')->getUserIdByUsername($username);
                $_SESSION["id"] = $userId;
                header('Location: ' . BASEURL . '/beranda');
                exit;
            } else {
                Flasher::setFlash('gagal', 'login', 'danger');
                header('Location: ' . BASEURL . '/loginUser');
                exit;
            }
        } else {
            Flasher::setFlash('gagal', 'login', 'danger');
            header('Location:' . BASEURL . '/loginUser');
            exit;
        }
    }
}
