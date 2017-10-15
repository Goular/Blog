<?php

namespace App\Admin\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;

class RegisterController extends CommonController
{

    public function index(){
        return "backend--register";
    }
}
