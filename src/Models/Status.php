<?php

namespace Api\Models;

class Status
{

    //constantes
    const OK_202 = 'OK';
    const NOFOUNDPOST_404 = 'no post found';
    const BADAPIKEYS_400 = 'Bad APi Keys';
    const APIKEYNOACTIVE_400 = 'APi Keys no actived';
    const NOFOUND_404 = 'no found';
    const CREATED_201 = 'Created';
    const BADREQUEST_400 = 'Bad Request';
    const UPDATE_201 = 'Update';
    const DELETE_201 = 'Delete';
    const INTSERVERROR_500 =  'Internal Server Error';


    private int $status;
    private string $message;
    private ?array $params;


    public function __construct(int $status, string $message, ?array $params = null)
    {
        $this->status = $status;
        $this->message = $message;
        $this->params = $params;
    }

    public function status(){

        if($this->params != null){
            $response = [
                'status' => $this->status,
                'message' => $this->message,
                'params' => $this->params
            ];
        }else{
            $response = [
                'status' => $this->status,
                'message' => $this->message,
            ];
        }

        $jsonType = createJson($response);
        return $jsonType;
    }
}
