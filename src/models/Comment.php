<?php


class Comment
{
    private $content;
    private $created_at;
    private $id_beer;
    private $author;
    private $rate;

    public function __construct($content, $created_at, $id_beer, $author, $rate)
    {
        $this->content = $content;
        $this->created_at = $created_at;
        $this->author = $author;
        $this->id_beer = $id_beer;
        $this->rate = $rate;
    }

    /* Getters and setters */

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function getIdBeer()
    {
        return $this->id_beer;
    }

    public function setIdBeer($id_beer): void
    {
        $this->id_beer = $id_beer;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function setRate($rate): void
    {
        $this->rate = $rate;
    }

}