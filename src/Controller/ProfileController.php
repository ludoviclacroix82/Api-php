<?php

namespace Api\Controller;

use Api\config\Database;
use Api\Trait\ProtectPage;
use Api\Models\User;
use Api\Models\ApiKeys;


class ProfileController
{

    use ProtectPage;

    private Database $database;
    protected string $user;

    public function __construct(string $user, Database $database)
    {
        $this->database = $database;
        $this->user = $user;
    }

    public function index()
    {
        $userLogin = isset($_SESSION['username']) ? $_SESSION['username'] : '';
        $datas = [];

        if ($this->isLogin()) {

            $dataUser = (new User('', $userLogin, '', $this->database))->getUser();
            $userKeys = (new ApiKeys('', $this->database))->userKeys($dataUser[0]['id']);

            $datas = [
                'userDatas' => $dataUser,
                'userKeys' => $userKeys
            ];

            require_once 'src/View/public/Profile/dashboard.php';

            return $datas;
        } else {
            header('Location:/login');
        }
    }

    public function postApiKey()
    {
        $userLogin = isset($_SESSION['username']) ? $_SESSION['username'] : '';

        if ($this->isLogin()) {
            $dataUser = (new User('', $userLogin, '', $this->database))->getUser();
            $apiKey = (new ApiKeys('', $this->database))->createKeyApi($dataUser[0]['id']);

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header('Location:/login');
        }
    }

    public function putApiKey($idKey,$active)
    {

        if ($this->isLogin()) {

            $updatekey = (new ApiKeys('', $this->database))->activeApiKey($idKey,$active);

        } else {
            header('Location:/login');
        }
    }
    public function deleteApiKey($idKey){
        if ($this->isLogin()) {

            $dletekey = (new ApiKeys('', $this->database))->deleteApiKey($idKey);

        } else {
            header('Location:/login');
        }
    }
}
