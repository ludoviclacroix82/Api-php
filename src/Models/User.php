<?php

namespace Api\Models;

use Api\config\Database;
use Api\Models\Status;

class User
{
    private Database $database;

    protected ?string $userName;
    protected string $user;
    protected string $password;

    public function __construct(?string $userName, string $user, string $password, Database $database)
    {
        $this->userName = $userName;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    public function addUser()
    {
        try {
            $params = [
                ':userName' => $this->userName,
                ':user' => $this->user,
                ':password' => password_hash($this->password, PASSWORD_DEFAULT)
            ];

            $userData = $this->database->query(
                'INSERT INTO user(
                    name, 
                    user, 
                    password) 
                VALUES (
                    :userName,
                    :user,
                    :password)',
                $params
            );

            return true;
        } catch (\Throwable $th) {
            return (new Status(400, Status::BADREQUEST_400))->status();
            echo $th;
        }
    }

    public function checkUser()
    {
        try {

            $params = [
                ':user' => $this->user,
            ];
            $userData = $this->database->query('SELECT * FROM user WHERE BINARY user = :user', $params);

            if (password_verify($this->password, $userData[0]['password'])) {

                $_SESSION['username'] = $userData[0]['user'];
                return true;

            }else{
                return false;
            }
        } catch (\Throwable $th) {
            return (new Status(400, Status::BADREQUEST_400))->status();
        }
    }
}
