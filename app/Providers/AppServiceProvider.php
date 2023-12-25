<?php

namespace App\Providers;

use App\Repository\DefaultNoteDatabaseRepository;
use App\Repository\NoteRepositoryInterface;
use App\Repository\TodoNoteDatabaseRepository;
use App\Repository\User\UserDatabaseRepository;
use App\Repository\User\UserRepositoryInterface;
use App\Services\Auth\AuthServiceInterface;
use App\Services\Auth\AuthSessionService;
use App\Services\Notes\DefaultNoteService;
use App\Services\Notes\TodoNoteService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(DefaultNoteService::class)
            ->needs(NoteRepositoryInterface::class)
            ->give(DefaultNoteDatabaseRepository::class);

        $this->app->when(TodoNoteService::class)
            ->needs(NoteRepositoryInterface::class)
            ->give(TodoNoteDatabaseRepository::class);

        $this->app->bind(AuthServiceInterface::class, AuthSessionService::class);
        $this->app->bind(UserRepositoryInterface::class, UserDatabaseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
