<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Comment.php';

class CommentRepository extends Repository
{
    public function getComments(int $beer_id) {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM beers_comments JOIN users ON beers_comments.id_user = users.id WHERE id_beer = :id;
        ');
        $stmt->bindParam(':id', $beer_id, PDO::PARAM_INT);
        $stmt->execute();

        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($comments as $comment) {
            $result[] = new Comment(
                $comment['content'],
                $comment['created_at'],
                $comment['id_beer'],
                $comment['login'],
                $comment['rate']
            );
        }

        return $result;
    }

    public function addComment() {

    }
}