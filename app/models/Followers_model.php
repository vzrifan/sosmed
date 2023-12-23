<?php

class Followers_model
{
    private $table = 'followers';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllFollow()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getFollowerById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE following_id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getFollowingById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE follower_id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getUsernameById($id)
    {
        $this->db->query('SELECT username FROM users WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getTotalFollowers($id)
    {
        $query = "SELECT COUNT(*) FROM followers WHERE following_id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->single();
    }

    public function getTotalFollowing($id)
    {
        $query = "SELECT COUNT(*) FROM followers WHERE follower_id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->single();
    }

    public function isFollowed()
    {
        $query = "SELECT following_id FROM followers WHERE follower_id=:id";

        $this->db->query($query);
        $this->db->bind('id', $_SESSION['id']);

        $this->db->execute();

        return $this->db->resultSet();
    }

    public function followUser($id)
    {
        $query = "INSERT INTO followers VALUES ('', :following_id, :follower_id)";

        $this->db->query($query);
        $this->db->bind('following_id', $id);
        $this->db->bind('follower_id', $_SESSION['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function unfollowUser($id)
    {
        $query = "DELETE from followers where following_id=:following_id AND follower_id=:follower_id";

        $this->db->query($query);
        $this->db->bind('following_id', $id);
        $this->db->bind('follower_id', $_SESSION['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
