<?php

class Beranda extends Controller
{

    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header('Location:' . BASEURL . '/loginUser');
        }
        $data['judul'] = 'Beranda';
        // $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('beranda/index');
        $this->view('templates/footer');
    }

    public function logout()
    {
        unset($_SESSION['username']);
        header('Location:' . BASEURL . '/loginUser');
    }
}
