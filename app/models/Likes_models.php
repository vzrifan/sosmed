<?php

class Likes_models extends Controller
{
    private $table = 'likes';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function hasUserLikedPost($id_user, $id_posting)
    {
        $query = "SELECT COUNT(*) as count
              FROM likes
              WHERE id_user = :id_user AND id_posting = :id_posting";

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_posting', $id_posting);

        $result = $this->db->single();
        return $result['count'] > 0;
    }

    public function getTotalLikesForPost($id_posting)
    {
        $query = "SELECT COUNT(*) as count
              FROM likes
              WHERE id_posting = :id_posting";

        $this->db->query($query);
        $this->db->bind('id_posting', $id_posting);

        $result = $this->db->single();
        return $result['count'];
    }

    public function likePost($id_posting)
    {
        $query = "INSERT INTO likes VALUES ('', :id_user, :id_posting, CURRENT_TIMESTAMP)";

        $this->db->query($query);
        $this->db->bind('id_user', $_SESSION['id']);
        $this->db->bind('id_posting', $id_posting);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function unlikePost($id_posting)
    {
        $query = "DELETE FROM likes WHERE id_user=:id_user AND id_posting=:id_posting";

        $this->db->query($query);
        $this->db->bind('id_user', $_SESSION['id']);
        $this->db->bind('id_posting', $id_posting);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
