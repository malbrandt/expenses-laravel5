<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = \Hash::make(config('admin.password'));
        $admin_exists = DB::table('users')
                ->where('email', '==', config('admin.email'))
                ->count() == 0;

        if ($admin_exists == false) {
            DB::table('users')
                ->insert([
                    'id' => DB::table('users')->max('id') + 1,
                    'created_at' => Carbon::now(),
                    'name' => config('admin.name'),
                    'email' => config('admin.email'),
                    'password' => $password
                ]);
        }

        factory(App\User::class, config('database.seeding_count.users'))->create();
    }
}
