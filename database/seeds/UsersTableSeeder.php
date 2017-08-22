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
        foreach (config('accounts') as $account_data) {
            $this->createAccount($account_data);
        }

        factory(App\User::class, config('database.seeding_count.users'))
            ->create()->each(function (App\User $u) {
                $u->assignRole('user');
            });
    }

    private function createAccount($data)
    {
        $exists = DB::table('users')
            ->where('email', '=', $data['email'])
            ->count() != 0;

        if ($exists === false) {
            App\User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ])->assignRole($data['role']);
        }
    }
}
