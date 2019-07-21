<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      array('name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('123123'), 'level' => 0),
      array('name' => 'Nguyễn Hồng Dững', 'email' => 'hongdung669@gmail.com', 'password' => bcrypt('123123'), 'level' => 0),
      array('name' => 'Nguyen Kim Anh', 'email' => 'kimanh@gmail.com', 'password' => bcrypt('123123'), 'level' => 0),
      array('name' => 'Tran Tuong Linh ', 'email' => 'tuonglinh992@gmail.com', 'password' => bcrypt('123123'), 'level' => 1),
      array('name' => 'Nguyen Quang Hai', 'email' => 'quanhai@gmail.com', 'password' => bcrypt('123123'), 'level' => 1)
    ]);
  }
}
