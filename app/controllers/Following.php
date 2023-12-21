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
            $follower['follower'] = $this->model('Followers_model')->getUsernameById($follower['follower_id'])['username'];
            $data['follower'][] = $follower;
        }

        $data['following'] = [];
        foreach ($followingResults as $following) {
            $following['following'] = $this->model('Followers_model')->getUsernameById($following['following_id'])['username'];
            $data['following'][] = $following;
        }
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('following/index', $data);
        $this->view('templates/footer');
    }
}
