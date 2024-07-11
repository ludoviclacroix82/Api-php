<?php

namespace Api\Controller;

use Api\config\Database;

class ProfileController{

    private Database $database;
    protected string $user;

    public function __construct(string $user , Database $database)
    {
        $this->database = $database;
        $this->user = $user;
    }

    public function index()
    {
        require_once 'src/View/public/Profile/dashboard.php';
    }
}