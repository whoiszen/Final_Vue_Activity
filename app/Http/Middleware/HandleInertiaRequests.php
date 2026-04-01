<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'error'   => fn () => $request->session()->get('error'),
            ],
            'nav' => [
                'adminLinks' => [
                    ['label' => 'Dashboard',   'route' => 'dashboard',               'icon' => 'home'],
                    ['label' => 'Suppliers',   'route' => 'admin.suppliers.index',   'icon' => 'truck'],
                    ['label' => 'Products',    'route' => 'admin.products.index',    'icon' => 'box'],
                    ['label' => 'Inventories', 'route' => 'admin.inventories.index', 'icon' => 'archive'],
                ],
            ],
        ]);
    }
}
