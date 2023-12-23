<?php

class Comments_model extends Controller
{
    private $table = 'comments';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCommentsByPostingId($postingId)
    {
        $query = "SELECT c.comment_text, c.comment_date, u.username
              FROM comments c
              JOIN users u ON c.id_user = u.id
              WHERE c.id_posting = :id_posting
              ORDER BY c.comment_date ASC";

        $this->db->query($query);
        $this->db->bind('id_posting', $postingId);

        return $this->db->resultSet();
    }

    public function insertComment($id_posting, $user_id, $comment_text)
    {
        $query = "INSERT INTO comments (id_posting, id_user, comment_text, comment_date) VALUES (:id_posting, :id_user, :comment_text, NOW())";

        $this->db->query($query);
        $this->db->bind('id_posting', $id_posting);
        $this->db->bind('id_user', $user_id);
        $this->db->bind('comment_text', $comment_text);

        return $this->db->execute();
    }
}
