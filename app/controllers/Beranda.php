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

    public function search()
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

    public function profile()
    {
        $data['judul'] = 'Profile';
        $data['user'] = $this->model('User_model')->getUserById($_SESSION['id'])['username'];
        $data['pict'] = $this->getImg();
        $data['totalFollowers'] = $this->model('Followers_model')->getTotalFollowers()['COUNT(*)'];
        $data['totalFollowing'] = $this->model('Followers_model')->getTotalFollowing()['COUNT(*)'];
        $data['totalPost'] = $this->model('Posting_model')->getTotalUserPost()['COUNT(*)'];
        $data['userPost'] = $this->model('Posting_model')->getUserPost();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('beranda/profile', $data);
        $this->view('templates/footer');
    }

    public function getImg()
    {
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/sosmed/public/img/' . $_SESSION['id'] . '.jpg';
        $src = file_exists($imagePath) ? BASEURL . '/img/' . $_SESSION['id'] . '.jpg' : BASEURL . '/img/profile.jpg';
        return $src;
    }

    public function changePicture()
    {
        $this->prosesChangePicture();
    }

    public function prosesChangePicture()
    {
        if (isset($_FILES["pict"]) && $_FILES["pict"]["error"] == 0) {
            $allowedTypes = [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF];
            $detectedType = exif_imagetype($_FILES["pict"]["tmp_name"]);

            if (in_array($detectedType, $allowedTypes)) {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/sosmed/public/img/';
                $uploadPath = $uploadDir . $_SESSION['id'] . '.jpg';

                if (file_exists($uploadPath)) {
                    unlink($uploadPath);
                }

                move_uploaded_file($_FILES["pict"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/sosmed/public/img/' . $_SESSION['id'] . '.jpg');
                header('Location:' . BASEURL . '/beranda/profile');
            } else {
                echo "Error: Only JPEG, PNG, and GIF images are allowed.";
                header('Location:' . BASEURL . '/beranda/profile');
            }
        } else {
            echo "Error: Please choose a valid image file.";
            header('Location:' . BASEURL . '/beranda/profile');
        }
    }
}
