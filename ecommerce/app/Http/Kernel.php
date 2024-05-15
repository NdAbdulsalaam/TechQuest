<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

use App\Http\Middleware\Role; // Import the Role middleware class

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Other middleware mappings
        'role' => Role::class, // Use the Role middleware class directly
    ];

    // Other kernel configurations...
}
