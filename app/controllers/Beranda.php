<?php

class Beranda extends Controller
{

    public function index()
    {
        if (!isset($_SESSION['id'])) {
            header('Location:' . BASEURL . '/loginUser');
        }
        $data['judul'] = 'Beranda';
        $data['posting'] = $this->model('Posting_model')->getAllPosting();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('beranda/index', $data);
        $this->view('templates/footer');
    }

    public function logout()
    {
        unset($_SESSION['id']);
        header('Location:' . BASEURL . '/loginUser');
    }

    public function cari()
    {
        $data['judul'] = 'Daftar User';
        $data['users'] = $this->model('User_model')->cariDataUser();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('beranda/search', $data);
        $this->view('templates/footer');
    }

    public function posting()
    {
        if ($this->model('Posting_model')->tambahDataposting($_POST) > 0) {
            header('Location: ' . BASEURL . '/beranda');
            exit;
        } else {
            header('Location: ' . BASEURL . '/beranda');
            exit;
        }
    }
}
