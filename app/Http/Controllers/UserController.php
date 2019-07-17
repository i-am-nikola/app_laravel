<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function getAdd()
    {
        return view('admin.user.add');
    }
}
