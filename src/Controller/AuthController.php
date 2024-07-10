<?php

namespace Api\Controller;

use Api\config\Database;
use Api\Models\User;
use Api\Models\Status;

class AuthController
{
    private Database $database;
    protected ?string $user;
    protected ?string $password;

    public function __construct(?string $user, ?string $password, Database $database)
    {
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }
    /**
     * Page login
     */
    public function index()
    {
        require_once 'src/View/public/login.php';
    }

    public function login()
    {
        if ($_POST) {

            $email = securityInput($_POST['email']);
            $pwd = securityInput($_POST['password']);

            $addUser = (new User('', $email, $pwd, $this->database))->checkUser();

            if ($addUser)
                $_SESSION['Auth'] = true;
            else
                $_SESSION['Auth'] = false;

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function register()
    {

        require_once 'src/View/public/register.php';
    }

    public function checkRegister()
    {

        if ($_POST) {

            $_SESSION['registerFaill'] = [];
            $_SESSION['registerValue'] = [];

            $user = securityInput($_POST['username']);
            $email = securityInput($_POST['email']);
            $pwd = securityInput($_POST['password']);
            $pwdConfirm = securityInput($_POST['confirm_password']);
            $honeyPot = securityInput($_POST['honeypot']);
            $emailIsValid = (filter_var($email, FILTER_VALIDATE_EMAIL));
            $passwordConfirm = (!empty($pwd) && !empty($pwdConfirm) && $pwd === $pwdConfirm) ? true : false;

            if (!$honeyPot && $emailIsValid  && $passwordConfirm && !empty($user)) {

                $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
                $addUser = (new User($user, $email, $pwd, $this->database))->addUser();

                if ($addUser) {
                    $_SESSION['user'] = $email;

                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    unset($_SESSION['registerFaill']);
                } else {
                    return (new Status(500, Status::INTSERVERROR_500));
                }
            } else {
                $_SESSION['registerFaill']['user'] = (!empty($user)) ? '' : 'username required';
                $_SESSION['registerFaill']['email'] = (!empty($emailIsValid)) ? '' : 'email required or invalid email address. ';
                $_SESSION['registerFaill']['pwd'] = ($passwordConfirm) ? '' : 'password & password Confirm required or The passwords do not match.';

                $_SESSION['registerValue']['user'] = $user;
                $_SESSION['registerValue']['email'] = $email;

                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}
