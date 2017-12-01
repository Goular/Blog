<?php

namespace App\Api\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;

class ApiController extends CommonController
{
    public function goods()
    {
        $data = file_get_contents(__DIR__ . "/mock/data.json");
        $data = json_decode($data);
        return $this->toJson($data->goods);
    }

    public function sellers()
    {
        $data = file_get_contents(__DIR__ . "/mock/data.json");
        $data = json_decode($data);
        return $this->toJson($data->seller);
    }

    public function ratings()
    {
        $data = file_get_contents(__DIR__ . "/mock/data.json");
        $data = json_decode($data);
        return $this->toJson($data->ratings);
    }
}
