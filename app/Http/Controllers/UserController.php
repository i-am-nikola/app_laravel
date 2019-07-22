<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRquest;
use App\User;
use Illuminate\Support\Facades\Auth;

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

  public function delete(Request $request)
  {
    $user_current = Auth::user()->id;
    $user = User::findOrFail($request->userid);

    if($request->userid == 1 || ($user_current !=1 && $user['level'] == 0) || $request->userid == $user_current){
      return redirect()->route('admin.user.list')->with(['flash_level' =>'alert-danger', 'flash_message' => 'Bạn không được quyền xóa thành viên này!']);
    }else{
      $user->delete();
      return redirect()->route('admin.user.list')->with(['flash_level' =>'alert-success', 'flash_message' => 'Xóa thành viên thành công!']);
    }
  }

  public function getEdit($id){
    $user = User::find($id);
    $user_current = Auth::user()->id;
    if(($user_current != 1) && ($id == 1 || ($user['level'] == 0 && $user_current != $id))){
      return redirect()->route('admin.user.list')->with(['flash_level' =>'alert-danger', 'flash_message' => 'Bạn không được quyền chỉnh sửa tài khoản này!']);
    }
    
    return view('admin.user.edit', compact('user', 'id'));
  }

  public function postEdit($id, UserRquest $request){
    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    if($request->password) $user->password = bcrypt($request->password);
    $user->level = $request->level;
    $user->remember_token = $request->_token;
    $user->save();
    return redirect()->route('admin.user.list')->with(['flash_level' =>'alert-success', 'flash_message' => 'Cập nhật thành viên thành công!']);
  }

}
