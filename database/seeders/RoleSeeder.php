<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::query()->firstOrCreate(
            ['slug' => Role::SLUG_MODERATOR],
            ['name' => 'Модератор']
        );

        Role::query()->firstOrCreate(
            ['slug' => Role::SLUG_READER],
            ['name' => 'Читатель']
        );

        $readerId = Role::query()->where('slug', Role::SLUG_READER)->value('id');

        User::query()->whereNull('role_id')->update(['role_id' => $readerId]);
    }
}
