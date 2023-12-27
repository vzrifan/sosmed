<?php

class Beranda extends Controller
{

    public function __construct()
    {
        if (!isset($_SESSION['id'])) {
            header('Location:' . BASEURL . '/loginUser');
        }
    }

    public function index()
    {
        $data['judul'] = 'Beranda';
        $data['userPost'] = $this->model('Posting_model')->getAllPosting();
        $data['isFollowed'] = $this->model('Followers_model')->isFollowed();
        $data['listFollower'] = $this->parseIsFollowed($data);
        $this->getComment($data, $_SESSION['id']);
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('beranda/index', $data);
        $this->view('templates/footer');
    }

    public function logout()
    {
        include_once("/xampp/htdocs/sosmed/app/config/configGoogle.php");
        unset($_SESSION['id']);
        unset($_SESSION['token']);
        unset($_SESSION['google_data']);
        $gClient->revokeToken();
        session_destroy();
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
        $postData = $_POST;

        $date = new DateTime();
        $dateFormat = 'Y-m-d H:i:s';
        $currentDate = $date->format($dateFormat);

        if (isset($_FILES["pict"]) && $_FILES["pict"]["error"] == 0) {
            $allowedTypes = [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF];
            $detectedType = exif_imagetype($_FILES["pict"]["tmp_name"]);

            if (in_array($detectedType, $allowedTypes)) {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/sosmed/public/img/';
                $uploadPath = $uploadDir . $currentDate . '.jpg';

                if (file_exists($uploadPath)) {
                    unlink($uploadPath);
                }

                $fileName = str_replace(array("-", ":", " "), "", $currentDate);
                move_uploaded_file($_FILES["pict"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/sosmed/public/img/' . $fileName . '.jpg');
            } else {
                echo "Error: Only JPEG, PNG, and GIF images are allowed.";
            }
        } else {
            echo "Error: Please choose a valid image file.";
        }

        if ($this->model('Posting_model')->tambahDataposting($postData, $currentDate) > 0) {
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
        $data['pict'] = $this->getImg($_SESSION['id']);
        $data['totalFollowers'] = $this->model('Followers_model')->getTotalFollowers($_SESSION['id'])['COUNT(*)'];
        $data['totalFollowing'] = $this->model('Followers_model')->getTotalFollowing($_SESSION['id'])['COUNT(*)'];
        $data['totalPost'] = $this->model('Posting_model')->getTotalUserPost($_SESSION['id'])['COUNT(*)'];
        $data['userPost'] = $this->model('Posting_model')->getUserPost($_SESSION['id']);
        $data['isFollowed'] = $this->model('Followers_model')->isFollowed();
        $data['listFollower'] = $this->parseIsFollowed($data);
        $this->getComment($data, $_SESSION['id']);
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('beranda/profile', $data);
        $this->view('templates/footer');
    }

    public function otherProfile($id)
    {
        if ($id == $_SESSION['id']) {
            $this->profile();
            exit;
        };
        $data['judul'] = 'Profile';
        $data['user'] = $this->model('User_model')->getUserById($id)['username'];
        $data['pict'] = $this->getImg($id);
        $data['totalFollowers'] = $this->model('Followers_model')->getTotalFollowers($id)['COUNT(*)'];
        $data['totalFollowing'] = $this->model('Followers_model')->getTotalFollowing($id)['COUNT(*)'];
        $data['totalPost'] = $this->model('Posting_model')->getTotalUserPost($id)['COUNT(*)'];
        $data['userPost'] = $this->model('Posting_model')->getUserPost($id);
        $data['isFollowed'] = $this->model('Followers_model')->isFollowed();
        $data['listFollower'] = $this->parseIsFollowed($data);
        $data['followBtn'] = in_array($id, $data['listFollower']) ? $this->createFollowBtn("Followed", $id) : $this->createFollowBtn("Follow", $id);
        $this->getComment($data, $id);
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('beranda/otherProfile', $data);
        $this->view('templates/footer');
    }

    public function settings()
    {
        $data['judul'] = "Settings";
        $data['user'] = $this->model('User_model')->getUserById($_SESSION['id']);
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('beranda/settings', $data);
        $this->view('templates/footer');
    }

    public function ubah()
    {
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $data['id'] = $_SESSION['id'];
        if ($this->model('User_model')->ubahDataUser($data) > 0) {
            header('Location: ' . BASEURL . '/beranda/settings');
            exit;
        } else {
            header('Location: ' . BASEURL . '/beranda/settings');
            exit;
        }
    }

    public function hapus()
    {
        if(isset($_SESSION['token'])){
            $this->model('User_model')->hapusUserGoogle();
        }

        if ($this->model('User_model')->hapusDataUser($_SESSION['id']) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            unset($_SESSION['id']);
            header('Location: ' . BASEURL . '/loginUser');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/beranda/settings');
            exit;
        }
    }

    public function comment($id)
    {
        $this->model('Comments_model')->insertComment($id, $_SESSION['id'], $_POST["comment"]);
        header("Location:" . BASEURL . "/beranda");
        exit;
    }

    public function getComment(&$data, $id_user)
    {
        foreach ($data['userPost'] as &$post) {
            $id_posting = $post['id_posting'];
            $comments = $this->model('comments_model')->getCommentsByPostingId($id_posting);
            $hasLiked = $this->model('Likes_models')->hasUserLikedPost($_SESSION['id'], $id_posting);
            $totalLikes = $this->model('Likes_models')->getTotalLikesForPost($id_posting);
            $likeBtn = $this->createLikeButton($hasLiked, $id_posting, $id_user);

            $post['comments'] = $comments;
            $post['hasLiked'] = $hasLiked;
            $post['totalLikes'] = $totalLikes;
            $post['likeBtn'] = $likeBtn;
        }
    }

    public function createLikeButton($val, $id, $id_user)
    {
        $icon = "<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAgRJREFUSEvl1kuozVEUx/HPxUApAwNh4JWUx0CSmHiMjJTynKHIQJmYeOWRXEYmJEWmhJEMlJQZRRkokUiSiedM8vyvWv/b/x7n3PM/995z7sCenM7e+7++67f22mvtPmM0+saIayTgHZidjr/HTXyuK2S44J240gB5hyX4VAc+HPAq3MOEJoC9uNAN8Bw8xhR8w8r8fZGw3bg82uDJeIT5aXgLbuAoTuTcLLwdTfB43MXaNHoygfH3JebhCZbWgcaeumd8CbvS6C1swJ8ikxfjac4fRv9ogiNhzqfBZ1iW5xpTofxIp2FupngPDlTuZ1XAhwxlXJtyhCMLaqh8k04OXMFqqFfj/hBGIoMfNqzHnY0MrzuWZ4IOOuNDOJUWyixdg3CoVT4sxCaMa0M+lusHcabR2PEiYcoNZSSazdVVV90XiRgjBIXNQYq7BY6r+HMswOtwJ8EDla2aXN1SfBXb8KOo41PxtRehnoSPRUJNzLa5uTz4biuOunAxYeuL4nO7V+AHxfmuQBSfaUV9/90LcLTQ1wk6i/3V+9XNUJ/O8hu8KKvPewEOQVHTZ7Rql1XF1YZe9t140G1PT8u5OpVrUaWj7cO5xo+q4K24VsdqB3u+Yzq+DAWOQn+9aOwbOzDcbmtTta06ztzi6TqzncU267/wCvHebjrqPn1G6Me/n/9/4L/NLWMf7q05RAAAAABJRU5ErkJggg=='/>";
        if ($val) {
            $url = BASEURL . "/beranda/unlike/" . $id . "/" . $id_user;
            return "<a href='$url'><button class='btn btn-success'>" . $icon . "</button></a>";
        }
        $url = BASEURL . "/beranda/like/" . $id . "/" . $id_user;
        return "<a href='$url'><button class='btn btn-secondary'>" . $icon . "</button></a>";
    }

    public function like($id_posting, $id_user)
    {
        $this->model('Likes_models')->likePost($id_posting);
        if (intval($id_user) == $_SESSION['id']) {
            header("Location:" . BASEURL . "/beranda");
            exit;
        }
        header("Location:" . BASEURL . "/beranda/otherProfile/" . $id_user);
        exit;
    }

    public function unlike($id_posting, $id_user)
    {
        $this->model('Likes_models')->unlikePost($id_posting);
        if (intval($id_user) == $_SESSION['id']) {
            header("Location:" . BASEURL . "/beranda");
            exit;
        }
        header("Location:" . BASEURL . "/beranda/otherProfile/" . $id_user);
        exit;
    }

    public function follow($id)
    {
        $this->model('Followers_model')->followUser($id);
        header("Location:" . BASEURL . "/beranda/otherProfile/" . $id);
    }

    public function unfollow($id)
    {
        $this->model('Followers_model')->unfollowUser($id);
        header("Location:" . BASEURL . "/beranda/otherProfile/" . $id);
    }

    public function createFollowBtn($val, $id)
    {
        if ($val == "Follow") {
            $url = BASEURL . "/beranda/follow/" . $id;
            return "<a href='$url'><button class='btn btn-primary'>" . $val . "</button></a>";
        }
        $url = BASEURL . "/beranda/unfollow/" . $id;
        return "<a href='$url'><button class='btn btn-success'>" . $val . "</button></a>";
    }

    public function parseIsFollowed($data)
    {
        $numericValues = [];
        foreach ($data['isFollowed'] as $subArray) {
            if (isset($subArray['following_id'])) {
                $numericValues[] = $subArray['following_id'];
            }
        }
        return $numericValues;
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

    public function getImg($id)
    {
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/sosmed/public/img/' . $id . '.jpg';
        $src = file_exists($imagePath) ? BASEURL . '/img/' . $id . '.jpg' : BASEURL . '/img/profile.jpg';
        return $src;
    }
}
