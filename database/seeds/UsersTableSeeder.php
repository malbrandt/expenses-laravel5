<?php

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
        $password = bcrypt(config('admin.password'));
        $admin_exists = DB::table('users')
                ->where('email', '==', config('admin.email'))
                ->count() != 0;

        if ($admin_exists == false) {
            App\User::create([
//                'id' => DB::table('users')->max('id') + 1,
//                'created_at' => Carbon::now(),
                'name' => config('admin.name'),
                'email' => config('admin.email'),
                'password' => $password
            ]);
        }

        factory(App\User::class, config('database.seeding_count.users'))->create();
    }
}
