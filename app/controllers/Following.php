<?php

class Following extends controller
{

    public function index()
    {
        if (!isset($_SESSION['id'])) {
            header('Location:' . BASEURL . '/loginUser');
        }
        $data['judul'] = "Following";
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('following/index');
        $this->view('templates/footer');
    }
}
