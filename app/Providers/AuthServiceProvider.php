<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Grado;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('alumno', function($user) {
            return $user->persona->tipo == 'alumno';
        });

        Gate::define('tutor_academico', function($user) {
            return $user->persona->tipo == 'tutor_academico';
        });

        Gate::define('tutor_empresa', function($user) {
            return $user->persona->tipo == 'tutor_empresa';
        });

        Gate::define('coordinador', function($user) {
            $id = auth()->user()->id;
            $existe = Grado::where('id_coordinador', $id)->first();
             return $existe != null;
        });

        Gate::define('tutores', function($user) {
            $id = auth()->user()->id;
            $existe = Grado::where('id_coordinador', $id)->first();

            return $user->persona->tipo == 'tutor_academico' || $existe != null;
        });
    }
}
