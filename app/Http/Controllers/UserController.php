<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserControllers;
use App\Models\User;

class UserController extends Controller
{
  public function UserDetails()
  {
    $data = [];
    $data['name'] = 'rahul';
    // $data['number'] = '8025415694';
    $data['email'] = 'rahul@gmail.com';
    $data['password'] = 'rahul@1234';

    //  $data['age'] = '27';
    // dd($data);
    $user  = User::create($data);
  }
  public function updateUser()
  {

    // $affect = User::where('id', 1)->update(['name' => 'darshan']);
    //dd($affect);
    $affect = User::where('id', '1')->first();
    tap($affect)->update(
      ['email' => 'dharshan@gmail.com']
    );
    dd($affect->toSql());
  }
}
