<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRquest;
use App\User;

class UserController extends Controller
{

  public function getAdd()
  {
    return view('admin.user.add');
  }

  public function postAdd(UserRquest $request)
  {
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->level = $request->level;
    $user->remember_token = $request->_token;
    $user->save();
    return redirect()->route('admin.user.list')->with(['flash_level' =>'alert-success', 'flash_message' => 'Thêm thành viên thành công!']);
  }

  public function list(){
    $users = User::select('id', 'name', 'email', 'level')->orderBy('id', 'DESC')->get();
    return view('admin.user.list', compact('users'));
  }

}
