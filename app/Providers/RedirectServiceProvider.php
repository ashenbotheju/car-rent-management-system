<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RedirectServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->configureRedirects();
    }

    protected function configureRedirects()
    {
        // For Fortify
        $this->app->singleton(\Laravel\Fortify\Contracts\LoginResponse::class, function () {
            return new class implements \Laravel\Fortify\Contracts\LoginResponse {
                public function toResponse($request)
                {
                    /** @var User|null $user */
                    $user = Auth::user();

                    if ($user && method_exists($user, 'isAdmin') && $user->isAdmin()) {
                        return redirect('/admin');
                    }

                    return redirect('/');
                }
            };
        });
    }
}
