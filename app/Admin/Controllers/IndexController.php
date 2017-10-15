<?php

namespace App\Admin\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;

class IndexController extends CommonController
{

    public function index(){
        return view("backend.index.index");
    }
}
