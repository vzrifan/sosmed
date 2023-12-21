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

    public  function getUsernameById($id)
    {
        $this->db->query('SELECT username FROM users WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}
