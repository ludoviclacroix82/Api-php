<?php

namespace Api\Models;

use Api\config\Database;
use Api\Models\Status;

class ApiKeys
{

    private Database $database;

    public ?string $key;

    public function __construct(?string $key,Database $database)
    {
        $this->key = $key;
        $this->database = $database;
    }

    public function isExist()
    {

        try {

            $params = [
                ':apikey' => securityInput($this->key),
            ];
           $apiKey = $this->database->query('SELECT * FROM api_keys WHERE api_key = :apikey',$params);
           return $apiKey;

        } catch (\Throwable $th) {
            return (new Status(400,Status::BADAPIKEYS_400))->status();
        }
    }

    public function userKeys($iduser)
    {

        try {

            $params = [
                ':idUser' => securityInput($iduser),
            ];
           $apiKey = $this->database->query('SELECT * FROM api_keys WHERE id_user = :idUser',$params);
            return $apiKey;

        } catch (\Throwable $th) {
            return (new Status(400,Status::BADAPIKEYS_400))->status();
        }
    }

    public function createKeyApi($iduser){

        try {
            $params = [
                ':apikey'=> generateApiKey(),
                ':iduser' => securityInput(intval($iduser))
            ];

            $postKey = $this->database->query(
                'INSERT INTO api_keys(
                    api_key, 
                    id_user) 
                VALUES (
                    :apikey,
                    :iduser)',
                $params
            );

        } catch (\Throwable $th) {
            return (new Status(400,Status::BADAPIKEYS_400))->status();
        }
    }

    public function activeApiKey($idKey,$active){
        try {
            $params = [
                ':idkey'=> intval($idKey),
                ':active' => intval($active)
            ];

            $keyUpdate = $this->database->query(
                'UPDATE api_keys 
                SET active = :active
                WHERE id = :idkey',
                $params
            );

        } catch (\Throwable $th) {
            return (new Status(400,Status::BADAPIKEYS_400))->status();
        }

    }

    public function deleteApiKey($idKey){

        try {
            $params = [
                ':idkey'=> intval($idKey),
            ];

            $keyDelete = $this->database->query(
                'DELETE 
                FROM api_keys 
                WHERE id = :idkey',
                $params
            );

        } catch (\Throwable $th) {
            return (new Status(400,Status::BADAPIKEYS_400))->status();        }
    }
}
