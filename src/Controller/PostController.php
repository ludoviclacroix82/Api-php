<?php

namespace Api\Controller;

use Api\config\Database;
use Api\Models\Posts;
use Api\Models\Status;
use Api\Models\ApiKeys;

class Postcontroller
{
    private Database $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getPosts($key)
    {
        $datas = [];

        try {
            $apiKeyExist = (new ApiKeys($key, $this->database))->isExist($key);

            if ($apiKeyExist) {
                $postsData = $this->database->query('SELECT * FROM posts');
                $datas = Posts::loadData($postsData);
                //demande a Pierre si pas d'autre solution qu'une method static
                // probleme :: (new Posts( "demande les 6 params ???))->loadData($postsData);

                if ($datas) {
                    return (new Status(200, Status::OK_202, $datas))->status();
                } else {
                    return (new Status(404, Status::NOFOUNDPOST_404, null))->status();
                }
            } else {
                return (new Status(400, Status::BADAPIKEYS_400))->status();
            }
        } catch (\Throwable $th) {
            return (new Status(404, Status::NOFOUND_404))->status();


            print_r($th);
        }
    }

    public function getPost($id, $key)
    {
        $params = [];
        try {

            $apiKeyExist = (new ApiKeys($key, $this->database))->isExist($key);

            if ($apiKeyExist) {

                $params = [
                    ':id' => securityInput($id),
                ];

                $postsData = $this->database->query('SELECT * FROM posts WHERE id = :id', $params);
                $datas = Posts::loadData($postsData); //demande a Pierre si pas d'autre solution que static

                if ($datas) {
                    return (new Status(200, Status::OK_202, $datas))->status();
                } else {
                    return (new Status(404, Status::NOFOUNDPOST_404, null))->status();
                }
            } else {
                return (new Status(400, Status::BADAPIKEYS_400))->status();
            }
        } catch (\Throwable $th) {
            return (new Status(404, Status::NOFOUNDPOST_404, null))->status();
        }
    }

    public function postPost($key)
    {
        try {
            $apiKeyExist = (new ApiKeys($key, $this->database))->isExist($key);

            if ($apiKeyExist) {
                $params = Posts::dataBodyInsert();
                $postInsert = $this->database->query(
                    'INSERT INTO posts(
                        title, 
                        body, 
                        author, 
                        created_at, 
                        updated_at) 
                    VALUES (
                        :title, 
                        :body, 
                        :author, 
                        :created_at, 
                        :updated_at)',
                    $params
                );

                return (new Status(201, Status::CREATED_201, $params))->status(2);
            } else {
                return (new Status(400, Status::BADAPIKEYS_400))->status();
            }
        } catch (\Throwable $th) {
            return (new Status(400, Status::BADREQUEST_400))->status();
        }
    }

    public function putPost($id, $key)
    {

        try {

            $apiKeyExist = (new ApiKeys($key, $this->database))->isExist($key);

            if ($apiKeyExist) {

                $id = securityInput($id);

                $postExist = $this->postExist($id);

                $params = Posts::dataBodyUpdate($id);

                if ($postExist) {

                    try {

                        $postUpdate = $this->database->query(
                            'UPDATE posts 
                            SET ' .  $params['updateParams'] . '
                            WHERE id = :id',
                            $params['params']
                        );
                        return (new Status(201, Status::UPDATE_201, $params['params']))->status();
                    } catch (\Throwable $th) {
                        return (new Status(400, Status::BADREQUEST_400))->status();
                    }
                } else {
                    return (new Status(404, Status::NOFOUNDPOST_404, null))->status();
                }
            } else {
                return (new Status(400, Status::BADAPIKEYS_400))->status();
            }
        } catch (\Throwable $th) {
            return (new Status(400, Status::BADREQUEST_400))->status();
        }
    }

    public function deletePost($id, $key)
    {
        try {

            $apiKeyExist = (new ApiKeys($key, $this->database))->isExist($key);

            if ($apiKeyExist) {
                $postExist = $this->postExist($id);
                if ($postExist) {

                    $params = [
                        ':id' => securityInput($id),
                    ];

                    $postDelete  = $this->database->query(
                        'DELETE 
                        FROM posts
                        WHERE id=:id',
                        $params
                    );
                    return (new Status(201, Status::DELETE_201, $params))->status();
                } else {
                    return (new Status(404, Status::NOFOUNDPOST_404, null))->status();
                }
            } else {
                return (new Status(400, Status::BADAPIKEYS_400))->status();
            }
        } catch (\Throwable $th) {
            return (new Status(400, Status::BADREQUEST_400))->status();
        }
    }

    public function postExist($id)
    {
        //Check si le post exist
        $paramsCheck = [
            ':id' => securityInput($id),
        ];
        $postExist =  $postsData = $this->database->query('SELECT * FROM posts WHERE id = :id', $paramsCheck);

        return $postExist;
    }
}
