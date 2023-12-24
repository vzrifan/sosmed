<?php

class DashboardAdmin extends Controller
{
    public function index()
    {
        $data['judul'] = 'Dashboard Admin';
        $data['users'] = $this->model('User_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('dashboardAdmin/index', $data);
        $this->view('templates/footer');
    }

    public function logout()
    {
        unset($_SESSION['id']);
        header('Location:' . BASEURL . '/loginAdmin');
    }

    public function tambah()
    {
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        if ($this->model('User_model')->tambahDataUser($data) > 0) {
            header('Location: ' . BASEURL . '/dashboardAdmin');
            exit;
        } else {
            header('Location: ' . BASEURL . '/dashboardAdmin');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('User_model')->hapusDataUser($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/dashboardAdmin');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/dashboardAdmin');
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('User_model')->getUserById($_POST['id']));
    }
}
