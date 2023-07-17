<?php

class Concept
{
    private $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    private function getSecretKey (string $getFrom) {

        switch ($getFrom){
            case 'file':{
                return new getFromFile();
            }
            case 'db':{
                return new getFromDb();
            }
            case 'server':{
                return new getFromServer();
            }
            case 'cloud':{
                return new getFromCloud();
            }
            default:{
                echo 'неверный код продукта'.$getFrom;
            }

        }


    }

    public function getUserData(string $getFrom)
    {
        $params = [
            'auth'  => ['user', 'pass'],
            'token' => $this->getSecretKey($getFrom)->get()
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response
        ) {
            $result = $response->getBody();
        });

        $promise->wait();
    }
}

interface GetFrom {
    public function get();
}

class getFromFile implements GetFrom{

    public function get (){
        return 'getFromFile';
    }
}

class getFromDb implements GetFrom{

    public function get (){
        return 'getFromDb';
    }
}

class getFromServer implements GetFrom{

    public function get (){
        return 'getFromServer';
    }
}

class getFromCloud implements GetFrom{

    public function get (){
        return 'getFromCloud';
    }
}

