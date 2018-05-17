<?php

use Illuminate\Database\Seeder;
use App\Model\Direktur;
class Datadirektur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Direktur::insert([
            'nip' => '19790805 200812 1 001',
            'nama' => 'Ardiyansyah',
            'gelar_s1' => 'ST',
            'gelar_s2' => 'M.Eng',
            'gelar_s3' => 'Dr',
            'flag' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
