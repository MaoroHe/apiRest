<?php

    function storePost($postInput)
    {
        require 'config/config.php';

        $title = $postInput['title'];
        $body = $postInput['body'];
        $author = $postInput['author'];

        $query = $bdd->prepare("INSERT INTO posts (title, body, author) VALUES (?, ?, ?)");
        $query->bindParam(1, $title);
        $query->bindParam(2, $body);
        $query->bindParam(3, $author);
        $val = $query->execute();

        if($title === '' or $body === '' or $author === ''){
            $data = [
                'statuss' => 500,
                'message' => 'Internal Server Error',
            ];

            header("HTTP/1.0 500 Internal Error");
            echo json_encode($data);
        } else if ($val) {
            $data = [
                'status' => 201,
                'message' => 'Post created',
            ];

            header("HTTP/1.0 201 Created");
            echo json_encode($data);
        } else {
            $data = [
                'statuss' => 500,
                'message' => 'Internal Server Error',
            ];

            header("HTTP/1.0 500 Internal Error");
            echo json_encode($data);
        }
    }

    function deletePost($id)
    {
        require 'config/config.php';

        if (!empty($id)) {
            $query = $bdd->prepare("DELETE FROM posts WHERE id = ?");
            $query->bindParam(1, $id);
            $query->execute();
        } else {
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];

            header("HTTP/1.0 500 Internal Error");
            echo json_encode($data);
        }

    }

    function updatePost($data, $id) {
        require 'config/config.php';

        $title = $data['title'];
        $body = $data['body'];
        $author = $data['author'];

        if(!empty($id) && !empty($title)) {
            $query = $bdd->prepare("UPDATE posts SET title=?, body=?, author=? WHERE id=?");
            $query->bindParam(1, $title);
            $query->bindParam(2, $body);
            $query->bindParam(3, $author);
            $query->bindParam(4, $id);
            $val = $query->execute();
        }
    }