<?php

class Following extends controller
{

    public function index()
    {
        if (!isset($_SESSION['id'])) {
            header('Location:' . BASEURL . '/loginUser');
        }
        $data['judul'] = "Follow";
        $followerResults = $this->model('Followers_model')->getFollowerById($_SESSION['id']);
        $followingResults = $this->model('Followers_model')->getFollowingById($_SESSION['id']);

        $data['follower'] = [];
        foreach ($followerResults as $follower) {
            $userDetails = $this->model('Followers_model')->getUsernameById($follower['follower_id']);

            if (is_array($userDetails)) {
                $follower['follower'] = $userDetails['username'];
                $data['follower'][] = $follower;
            } else {
                echo "";
            }
        }

        $data['following'] = [];
        foreach ($followingResults as $following) {
            $userDetails = $this->model('Followers_model')->getUsernameById($following['following_id']);

            if (is_array($userDetails)) {
                $following['following'] = $userDetails['username'];
                $data['following'][] = $following;
            } else {
                echo "";
            }
        }

        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('following/index', $data);
        $this->view('templates/footer');
    }
}
