<?php

namespace App\Admin\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(){
        return "backend";
    }
}
