<?php

namespace CozyFex\BreezeUsername\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cozyfex:breeze:username:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Login and register with username';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        # Replace Controllers
        copy(__DIR__.'/../Controllers/Auth/ConfirmablePasswordController.php',
            app_path('Http/Controllers/Auth/ConfirmablePasswordController.php'));
        copy(__DIR__.'/../Controllers/Auth/NewPasswordController.php',
            app_path('Http/Controllers/Auth/NewPasswordController.php'));
        copy(__DIR__.'/../Controllers/Auth/PasswordResetLinkController.php',
            app_path('Http/Controllers/Auth/PasswordResetLinkController.php'));
        copy(__DIR__.'/../Controllers/Auth/RegisteredUserController.php',
            app_path('Http/Controllers/Auth/RegisteredUserController.php'));

        # Replace User Model
        copy(__DIR__.'/../Models/User.php', app_path('Models/User.php'));

        # Replace Request
        copy(__DIR__.'/../Requests/Auth/LoginRequest.php', app_path('Http/Requests/Auth/LoginRequest.php'));

        # Replace Views
        copy(__DIR__.'/../views/auth/login.blade.php', resource_path('views/auth/login.blade.php'));
        copy(__DIR__.'/../views/auth/register.blade.php', resource_path('views/auth/register.blade.php'));

        $this->call('migrate');

        $this->info('[CozyFex Breeze Username] was installed successfully!');

        return 0;
    }
}
