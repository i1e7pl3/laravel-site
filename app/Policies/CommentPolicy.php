<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->role !== null;
    }

    public function view(User $user, Comment $comment): bool
    {
        return $user->role !== null;
    }

    public function create(User $user): bool
    {
        return in_array($user->role?->slug, [Role::SLUG_MODERATOR, Role::SLUG_READER], true);
    }

    public function update(User $user, Comment $comment): Response
    {
        return $user->role?->slug === Role::SLUG_MODERATOR
            ? Response::allow()
            : Response::deny('Изменять комментарии может только модератор.');
    }

    public function delete(User $user, Comment $comment): Response
    {
        return $user->role?->slug === Role::SLUG_MODERATOR
            ? Response::allow()
            : Response::deny('Удалять комментарии может только модератор.');
    }
}
