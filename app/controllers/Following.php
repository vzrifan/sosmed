<?php

class Following extends controller
{

    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header('Location:' . BASEURL . '/loginUser');
        }
        $data['judul'] = "Following";
        $this->view('templates/header', $data);
        $this->view('following/index');
        $this->view('templates/footer');
    }
}
