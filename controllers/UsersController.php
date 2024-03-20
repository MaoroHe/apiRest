<?php

    class UsersController
    {
        public function index()
        {
            require 'config/config.php';

            $query = $bdd->prepare('SELECT * FROM posts');
            $query->execute();
            $users = $query->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($users);
        }
    }