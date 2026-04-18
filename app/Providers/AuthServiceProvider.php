<?php

namespace App\Providers;

<<<<<<< HEAD
// use Illuminate\Support\Facades\Gate;
=======
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use App\Policies\ArticlePolicy;
use App\Policies\CommentPolicy;
use Illuminate\Support\Facades\Gate;
>>>>>>> d2046f5 (7 practice)
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
<<<<<<< HEAD
        //
=======
        Article::class => ArticlePolicy::class,
        Comment::class => CommentPolicy::class,
>>>>>>> d2046f5 (7 practice)
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
<<<<<<< HEAD
        //
=======
        Gate::before(function (?User $user, string $_ability) {
            if ($user?->isModerator()) {
                return true;
            }

            return null;
        });
>>>>>>> d2046f5 (7 practice)
    }
}
