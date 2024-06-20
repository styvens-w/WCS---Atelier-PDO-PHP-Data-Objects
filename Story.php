<?php

class Story
{
    // PROPERTIES
    private int $id;
    private string $author;
    private string $content;
    private string $title;


    // METHODS

    // getters
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    // setters
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}