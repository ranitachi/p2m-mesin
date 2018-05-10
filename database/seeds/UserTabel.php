<?php

use Illuminate\Database\Seeder;
use App\Model\Users;
class UserTabel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::insert([
            'name' => 'Administrator',
            'email' => 'admin',
            'password' => bcrypt('111111'),
            'level' => 0,
            'flag' => 1,
            'hakakses' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
