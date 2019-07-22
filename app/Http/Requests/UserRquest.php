<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRquest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    if(!isset($_POST['_method'])){
      return [
        'name' => 'required',
        'email' => 'required|unique:users|email',
        'password' => 'required|min:6|same:re_password',
        're_password' => 'same:password',
        'level' => 'required'
      ];
    }else{
      return [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'same:re_password',
        're_password' => 'same:password',
        'level' => 'required'
      ];
    }
  }

  public function attributes()
  {
    return [
      'name' => 'Họ và tên',
      'email' => 'Emai',
      'password' => 'Mật khẩu',
      're_password' => 'Mật khẩu',
      'level' => 'Phân quyền'
    ];
  }

  public function messages()
  {
    return [
      'level.required' => 'Thành viên chưa được phân quyền',
      '*.required' => ':attribute không được để trống',
      'email.unique' => ':attribute đã tồn tại',
      'password.same' => ':attribute không khớp',
      're_password.same' => ':attribute không khớp',
      'password.min' => ':attribute phải ít nhất 6 ký tự',
      'email.email' => ':attribute không hợp lệ'
    ];
  }
}
