<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NewUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = $this->command->getOutput()->ask("Enter user's name:");
        if ($name === null)
        {
            $this->command->getOutput()->error("User name is required!");
            exit(1);
        }

        $email = $this->command->getOutput()->ask("Enter user's email address:");

        $all_users = User::all();

        foreach($all_users as $user)
        {
            if($email === $user->email)
            {
                $this->command->getOutput()->error("That username is already taken!");
                exit(1);
            }
        }
        if ($email === null)
        {
            $this->command->getOutput()->error("User name is required!");
            exit(1);
        }

        $username = $this->command->getOutput()->ask("Enter username:");



        foreach($all_users as $user)
        {
            if($email === $user->username)
            {
                $this->command->getOutput()->error("That username is already taken!");
                exit(1);
            }
        }

        if ($username === null)
        {
            $this->command->getOutput()->error("User name is required!");
            exit(1);
        }

        $password = $this->command->getOutput()->ask("Enter user's password:");
        if ($password === null)
        {
            $this->command->getOutput()->error("Password is required!");
            exit(1);
        }

        User::create([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

    }
}
