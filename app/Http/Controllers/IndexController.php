<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends CommonController
{

    public function index(){
        return "frontend";
    }
}
