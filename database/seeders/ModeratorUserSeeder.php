<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ModeratorUserSeeder extends Seeder
{
    public function run(): void
    {
        $roleId = Role::query()->where('slug', Role::SLUG_MODERATOR)->value('id');

        if ($roleId === null) {
            return;
        }

        User::query()->updateOrCreate(
            ['email' => 'moderator@example.com'],
            [
                'name' => 'Модератор',
                'password' => Hash::make('password'),
                'role_id' => $roleId,
            ]
        );
    }
}
