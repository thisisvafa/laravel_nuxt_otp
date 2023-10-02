<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::create([
            'name'                  => 'vafa',
            'email'                 => 'vafa@gmail.com',
            'mobile'                => '09112079641',
            'mobile_verified_at'    => null,
            'mobile_verify_code'    => 123456,
            'password'              => Hash::make('123456789'),
        ]);
        echo("\n");
        echo("\033[38;5;52m"."Finished..."."\033[38;5;55m");
    }
}
