<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'user' => [
                'id' => 1,
                'username' => 'gus',
                'first_name' => 'Gustavo',
                'last_name' => 'Fring',
                'full_name' => 'Gustavo Fring',
                'email' => 'gus.fring@los-pollos-hermanos.test',
                'image' =>
                    'https://cdn.dribbble.com/users/456953/screenshots/6207215/media/6e729ca46a8af1d07b90053f3a857548.jpg',
            ],
            'config' => [
                'main_pattern' => asset('images/main-pattern.png'),
            ],
        ]);
    }
}
