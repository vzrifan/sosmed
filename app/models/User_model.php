<?php

class User_model
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public  function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataUser($data)
    {
        $checkQuery = "SELECT * FROM users WHERE username = :username";
        $this->db->query($checkQuery);
        $this->db->bind('username', $data['username']);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return -1;
        }

        $insertQuery = "INSERT INTO users VALUES ('', :username, :password)";
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->db->query($insertQuery);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function loginUser($data)
    {
        $query = "SELECT * FROM users WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);

        $this->db->execute();

        $user = $this->db->single();

        return ($user && password_verify($data['password'], $user['password']));
    }


    public function cariDataUser()
    {
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : "";
        $query = "SELECT * FROM users WHERE username LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return  $this->db->resultSet();
    }

    public function getUserIdByUsername($username)
    {
        $query = "SELECT id FROM " . $this->table . " WHERE username = :username";

        $this->db->query($query);
        $this->db->bind('username', $username);

        $this->db->execute();

        $user = $this->db->single();

        return $user ? $user['id'] : null;
    }

    public function hapusDataUser($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusUserGoogle()
    {
        $query = "DELETE FROM users2 WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $_SESSION['google_data']['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataUser($data)
    {
        $insertQuery = "UPDATE users SET username = :username, password = :password WHERE id = :id";
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->db->query($insertQuery);
        $this->db->bind('id', $data['id']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
