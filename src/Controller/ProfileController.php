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
            $userKeys = (new ApiKeys('',$this->database))->userKeys($dataUser[0]['id']);

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
}
