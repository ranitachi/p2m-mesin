<?php

use Illuminate\Database\Seeder;
// use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTabel::class);
        // $this->call(Datadirektur::class);
       Eloquent::unguard();

        $path = public_path('files/db_p2m_all.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('Master Perusahaan table seeded!');
    }
}
