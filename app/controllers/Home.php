<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home';
        // $data['nama'] = $this->model('User_model')->getUser();
        // $this->view('templates/header', $data);
        $this->view('home/index', $data);
        // $this->view('templates/footer');

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
            $_SESSION['id'] = $this->model('User_model')->getUserIdByUsername($_SESSION['google_data']['given_name']);
            header('Location: ' . BASEURL . '/beranda');
            $_SESSION['token'] = $gClient->getAccessToken();
        } else {
            $authUrl = $gClient->createAuthUrl();
        }
    }
}
