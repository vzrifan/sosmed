<?php

class Posting_model extends Controller
{
    private $table = 'posting';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPosting()
    {
        $this->db->query('SELECT posting.*, users.username 
                          FROM ' . $this->table . ' 
                          JOIN users ON posting.id = users.id');
        return $this->db->resultSet();
    }


    public  function getPostingById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataposting($data)
    {
        $query = "INSERT INTO posting VALUES ('', :id, :content)";

        $this->db->query($query);
        $this->db->bind('id', $_SESSION['id']);
        $this->db->bind('content', $data['content']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getTotalUserPost()
    {
        $query = "SELECT COUNT(*) FROM posting WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $_SESSION['id']);

        $this->db->execute();

        return $this->db->single();
    }

    public function getUserPost()
    {
        $query = "SELECT posting.*, users.username FROM `" . $this->table . "` JOIN users ON posting.id = users.id WHERE posting.id = :id";

        $this->db->query($query);
        $this->db->bind('id', $_SESSION['id']);

        $this->db->execute();

        return $this->db->resultSet();
    }
}
