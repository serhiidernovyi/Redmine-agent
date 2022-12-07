<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="App",
 *     description="System App",
 *     @OA\Contact(
 *         name="some_name",
 *         email="admin@email.pl",
 *         url="https://server.com/"
 *     )
 * )
 *
 * @OA\Tag(
 *     name="tasks",
 *     description="Tasks part of application.",
 * )
 *
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
