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
        $moderatorRoleId = Role::query()->where('slug', Role::SLUG_MODERATOR)->value('id');
        $readerRoleId = Role::query()->where('slug', Role::SLUG_READER)->value('id');

        if ($moderatorRoleId === null || $readerRoleId === null) {
            return;
        }

        User::query()->updateOrCreate(
            ['email' => 'moderator@example.com'],
            [
                'name' => 'Модератор',
                'password' => Hash::make('password'),
                'role_id' => $readerRoleId,
            ]
        );

        User::query()
            ->where('email', 'boichenkoolga200@gmail.com')
            ->update(['role_id' => $moderatorRoleId]);
    }
}
