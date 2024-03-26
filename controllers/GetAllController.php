<?php

    class GetAllController
    {
        public function getAll()
        {
            header('Access-Control-Allow-Origin: *');
            header('Acces-Control-Allow-Methods: GET, POST, PUT, DELETE');

            require 'models/GetAllModel.php';
            require 'config/config.php';

            $data = $bdd->prepare('SELECT * FROM posts');
            $data->execute();
            $data = $data->fetchAll();

            $posts = [];

            foreach ($data as $post) {
                $posts[] = new GetAllModel($post['id'], $post['title'], $post['body'], $post['author'], $post['created_at'], $post['updated_at']);
            }

            return $posts;
        }

        public function getOne($url) {
            require 'models/GetAllModel.php';
            require 'config/config.php';

            $data = $bdd->prepare("SELECT * FROM posts WHERE id = $url");
            $data->execute();
            $data = $data->fetchAll();

            if (empty($data)) {
                return ['error' => '404'];
            } else {
                
            $posts = [];

            foreach ($data as $post) {
                $posts[] = new GetAllModel($post['id'], $post['title'], $post['body'], $post['author'], $post['created_at'], $post['updated_at']);
            }

            return $posts;
        }
    }
}