<?php

namespace Database\Seeders;

use App\Models\role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('110515art'),
            'role_id' => Role::ADMIN_ID,
            'verified_code' => 1,
        ]);
    }
}
