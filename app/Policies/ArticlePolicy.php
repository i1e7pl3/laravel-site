<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->role !== null;
    }

    public function view(User $user, Article $article): bool
    {
        return $user->role !== null;
    }

    public function create(User $user): Response
    {
        return $user->role?->slug === Role::SLUG_MODERATOR
            ? Response::allow()
            : Response::deny('Создавать новости могут только модераторы.');
    }

    public function update(User $user, Article $article): Response
    {
        return $user->role?->slug === Role::SLUG_MODERATOR
            ? Response::allow()
            : Response::deny('Редактировать новости может только модератор.');
    }

    public function delete(User $user, Article $article): Response
    {
        return $user->role?->slug === Role::SLUG_MODERATOR
            ? Response::allow()
            : Response::deny('Удалять новости может только модератор.');
    }
}
