<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectPath = 'login';
  protected $redirectTo = 'admin/home';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function getLogin()
  {
    return view('admin.user.login');
  }

  public function postLogin(LoginRequest $request)
  {
    $input = $request->only(array_keys($request->rules()));
    $login = [
      'email' => $input['email'],
      'password' => $input['password']
    ];
    $is_remember = (!empty($input['remember_me'])) ? true : false;
    
    if(Auth::attempt($login, $is_remember)){
      return redirect()->route('admin.home.index');
    }else{
      return redirect()->back()->with(['flash_level' => 'alert-danger', 'flash_message' => 'Email hoặc mật khẩu không đúng!']);
    }
  }

  public function logout()
  {
    auth('admin')->logout();
    return redirect()->route('login.getLogin');
  }


}
