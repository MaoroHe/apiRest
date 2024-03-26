<?php

    class GetAllModel
    {
        public string $id;
        public string $title;
        public string $body;
        public string $author;
        public string $created_at;
        public $updated_at;

        public function __construct(string $id, string $title, string $body, string $author, string $created_at, $updated_at)
        {
            $this->id = $id;
            $this->title = $title;
            $this->body = $body;
            $this->author = $author;
            $this->created_at = $created_at;
            $this->updated_at = $updated_at;
        }
    }