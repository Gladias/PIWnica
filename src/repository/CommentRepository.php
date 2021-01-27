<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Comment.php';

class CommentRepository extends Repository
{
    public function getComments(int $beer_id) {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT beers_comments.id AS comment_id, content, created_at, login, id_beer, rate
            FROM beers_comments JOIN users ON beers_comments.id_user = users.id 
            WHERE id_beer = :id ORDER BY beers_comments.id DESC;
        ');
        $stmt->bindParam(':id', $beer_id, PDO::PARAM_INT);
        $stmt->execute();

        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($comments as $comment) {
            $result[] = new Comment(
                $comment['content'],
                $comment['login'],
                $comment['rate'],
                $comment['id_beer'],
                $comment['created_at'],
                $comment['comment_id'],
            );
        }

        return $result;
    }

    public function addComment(Comment $comment, $user_id) {
        $date = new DateTime();

        $stmt = $this->database->connect()->prepare('
            INSERT INTO beers_comments (content, created_at, id_user, id_beer, rate)
            VALUES (?, ?, ?, ?, ?)
        ');
        $stmt->execute([
            $comment->getContent(),
            $date->format('Y-m-d'),
            $user_id,
            $comment->getIdBeer(),
            $comment->getRate()
        ]);
    }

    public function deleteComment($comment_id) {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM beers_comments WHERE id = :comment_id
        ');

        $stmt->bindParam(':comment_id', $comment_id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function userAlreadyRated($user_id) {
        $stmt = $this->database->connect()->prepare('
            SELECT 1 FROM beers_comments WHERE id_user = :id
        ');

        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}